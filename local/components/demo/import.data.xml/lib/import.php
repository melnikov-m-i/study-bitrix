<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');
define("STATUS_MESSAGE_JSON", array("SUCCESS" => "success", "ERROR" => "error"));

function clearSelectedIBlock($IBLOCK_ID)
{
    $arFilter = array("IBLOCK_ID" => $IBLOCK_ID, "SECTION_ID" => false);
    $rsSections = CIBlockSection::GetList(array(), $arFilter, false, array('ID'), false);
    $arErrorsDeleting = array();

    while ($arSection = $rsSections->GetNext()) {
        $delSect = CIBlockSection::Delete($arSection["ID"]);

        if ($delSect === false) {
            $arErrorsDeleting[] = "Произошла ошибка при удалении раздела с ID = " . $arSection["ID"];
        }
    }

    $rsElements = CIBlockElement::GetList(array(), $arFilter, false, false, array('ID'));

    while ($arElement = $rsElements->GetNext()) {
        $delEl = CIBlockElement::Delete($arElement["ID"]);

        if ($delEl === false) {
            $arErrorsDeleting[] = "Произошла ошибка при удалении элемента с ID = " . $arElement["ID"];
        }
    }

    if (!empty($arErrorsDeleting)) {
        sendMessageToJson(STATUS_MESSAGE_JSON["ERROR"], implode("<br>", $arErrorsDeleting));
    }
}

function importXml($IBLOCK_ID, $tempFile)
{
    $xmlFile = $tempFile;
    $xmlStr = file_get_contents($xmlFile);

    if ($xmlStr === false) {
        sendMessageToJson(STATUS_MESSAGE_JSON["ERROR"], "Произошла ошибка при открытии xml файла");
    }

    libxml_use_internal_errors(true);
    $root = new SimpleXMLElement($xmlStr);

    if (!$root) {
        $arXmlErrors = array();
        foreach (libxml_get_errors() as $error) {
            $arXmlErrors[] = (string)$error->message;
        }

        sendMessageToJson(STATUS_MESSAGE_JSON["ERROR"], implode("<br>", $arXmlErrors));
    }

    $cntSections = 0;
    $cntElements = 0;
    $arSections = array();
    $arFields = array();

    foreach ($root->sections->section as $section) {
        $arFields = array(
            "IBLOCK_ID" => $IBLOCK_ID,
            "CODE" => convertsField($section->code),
            "NAME" => convertsField($section->name),
            "ACTIVE" => convertsField($section->active)
        );

        $ibs = new CIBlockSection;
        $idSection = $ibs->Add($arFields);

        if ($idSection === false) {
            sendMessageToJson(STATUS_MESSAGE_JSON["ERROR"],
                "Произошла ошибка при создании раздела CODE = " .
                $arFields["CODE"] . ", NAME = " . $arFields["NAME"] .
                ", ошибка: " . $ibs->LAST_ERROR);
        } else {
            $arSections[$arFields["CODE"]] = (int)$idSection;
            $cntSections++;
        }
    }

    foreach ($root->articles->article as $article) {
        $arFields = array(
            "IBLOCK_ID" => $IBLOCK_ID,
            "NAME" => convertsField($article->name),
            "ACTIVE" => convertsField($article->active),
            "PREVIEW_TEXT" => convertsField($article->text)
        );

        $codeSection = convertsField($article->section);
        $arFields["IBLOCK_SECTION_ID"] = array_key_exists($codeSection, $arSections) ? $arSections[$codeSection] : false;
        $ibe = new CIBlockElement;
        $idElement = $ibe->Add($arFields);

        if ($idElement === false) {
            sendMessageToJson(STATUS_MESSAGE_JSON["ERROR"],
                "Произошла ошибка при создании элемента NAME = " . $arFields["NAME"] .
                ", ошибка: " . $ibe->LAST_ERROR);
        } else {
            $cntElements++;
        }
    }

    $message = "Импорт завершен:<br> Добавлено разделов: " . $cntSections .
        "<br> Добавлено элементов: " . $cntElements . "<br>";

    sendMessageToJson(STATUS_MESSAGE_JSON["SUCCESS"], $message);
}

function sendMessageToJson($status, $message)
{
    echo json_encode(["status" => $status, "message" => $message]);
    die();
}

function convertsField($field)
{
    return htmlentities(stripslashes(trim((string)$field)));
}
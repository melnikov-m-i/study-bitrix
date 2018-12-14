<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!\Bitrix\Main\Loader::includeModule('iblock')) {
    return;
}

class ImportDataXml extends CBitrixComponent
{
    const STATUS_MESSAGE_JSON = array("SUCCESS" => "success", "ERROR" => "error");

    public function clearSelectedIBlock()
    {
        if (!isset($this->arParams["IBLOCK_ID"]) || !is_numeric($this->arParams["IBLOCK_ID"])) {
            return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["ERROR"], "Не передан ID инфоблока");
        }

        $arFilter = array(
            "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
            "SECTION_ID" => false
        );
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
            return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["ERROR"], implode("<br>", $arErrorsDeleting));
        }
    }

    public function importXml($tempFile)
    {
        if (!isset($this->arParams["IBLOCK_ID"]) || !is_numeric($this->arParams["IBLOCK_ID"])) {
            return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["ERROR"], "Не передан ID инфоблока");
        }

        $xmlFile = $tempFile;
        $xmlStr = file_get_contents($xmlFile);

        if ($xmlStr === false) {
            return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["ERROR"], "Произошла ошибка при открытии xml файла");
        }

        libxml_use_internal_errors(true);
        $root = new SimpleXMLElement($xmlStr);

        if (!$root) {
            $arXmlErrors = array();
            foreach (libxml_get_errors() as $error) {
                $arXmlErrors[] = (string)$error->message;
            }

            return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["ERROR"], implode("<br>", $arXmlErrors));
        }

        $cntSections = 0;
        $cntElements = 0;
        $arSections = array();
        $arFields = array();

        foreach ($root->sections->section as $section) {
            $arFields = array(
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "CODE" => $this->convertsField($section->code),
                "NAME" => $this->convertsField($section->name),
                "ACTIVE" => $this->convertsField($section->active)
            );

            $ibs = new CIBlockSection;
            $idSection = $ibs->Add($arFields);

            if ($idSection === false) {
                return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["ERROR"],
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
                "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
                "NAME" => $this->convertsField($article->name),
                "ACTIVE" => $this->convertsField($article->active),
                "PREVIEW_TEXT" => $this->convertsField($article->text)
            );

            $codeSection = $this->convertsField($article->section);
            $arFields["IBLOCK_SECTION_ID"] = array_key_exists($codeSection, $arSections) ? $arSections[$codeSection] : false;
            $ibe = new CIBlockElement;
            $idElement = $ibe->Add($arFields);

            if ($idElement === false) {
                return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["ERROR"],
                    "Произошла ошибка при создании элемента NAME = " . $arFields["NAME"] .
                    ", ошибка: " . $ibe->LAST_ERROR);
            } else {
                $cntElements++;
            }
        }

        $message = "Импорт завершен:<br> Добавлено разделов: " . $cntSections .
            "<br> Добавлено элементов: " . $cntElements . "<br>";

        return $this->sendMessageToJson(self::STATUS_MESSAGE_JSON["SUCCESS"], $message);
    }

    protected function convertsField($field)
    {
        return htmlentities(stripslashes(trim((string)$field)));
    }

    public function sendMessageToJson($status, $message)
    {
        return json_encode(["status" => $status, "message" => $message]);
    }
}
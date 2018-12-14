<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock")) {
    return;
}

$iBlocks = [];
$arFilter = Array();
$arFilter['SITE_ID'] = SITE_ID;

if ($arParams['IBLOCK_TYPE_ID'] !== IMPORT_INFOBLOCK_DEFAULT_TYPE_ALL) {
    $arFilter['TYPE'] = $arParams['IBLOCK_TYPE_ID'];
}

$dbIblock = CIBlock::GetList(Array(), $arFilter, true);

while ($res = $dbIblock->Fetch()) {
    $iBlocks[] = $res;
}

$arResult['IBLOCKS'] = $iBlocks;
$arResult['MESSAGE'] = "";

if (isset($arParams['IBLOCK_ID'])) {
    $arParams['IBLOCK_ID'] = trim($arParams['IBLOCK_ID']);
    $msg = $this->clearSelectedIBlock();

    if (empty($msg)) {
        try {
            switch ($_FILES['fileXml']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('Файл не был загружен.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Размер принятого файла превысил максимально допустимый размер');
                default:
                    throw new RuntimeException('Неизвестная ошибка');
            }

            if ($_FILES['fileXml']['size'] > 1000000) {
                throw new RuntimeException('Размер принятого файла превысил максимально допустимый размер');
            }

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = in_array(
                    $finfo->file($_FILES['fileXml']['tmp_name']),
                    array('text/xml', 'application/xml')
                )
            ) {
                throw new RuntimeException('Неправильный формат файла');
            }

            $uploadsDir = $_SERVER['DOCUMENT_ROOT'] . '/upload/xml/';
            $fileName = $_FILES['fileXml']['name'];
            $isMoved = move_uploaded_file($_FILES['fileXml']['tmp_name'], $uploadsDir . $fileName);

            if ($isMoved) {
                $msg = $this->importXml($uploadsDir . $fileName);
                $msg = json_decode($msg, true);
                unlink($uploadsDir . $fileName);
            } else {
                throw new RuntimeException('Не удалось переместить загруженный файл.');
            }
        } catch (RuntimeException $e) {
            $msg = $this->sendMessageToJson(constant(get_class($this) . "::STATUS_MESSAGE_JSON")["ERROR"], $e->getMessage());
            $msg = json_decode($msg, true);
        }
    } else {
        $msg = json_decode($msg, true);
    }

    $arResult['MESSAGE'] = '<p>' . $msg['message'] . '</p>';
} else {
    $arParams['IBLOCK_ID'] = null;
}

$this->IncludeComponentTemplate();
return $arResult;
?>

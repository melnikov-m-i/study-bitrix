<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
header("Content-Type: application/json");

require_once($_SERVER['DOCUMENT_ROOT'] . "/local/components/demo/import.data.xml/lib/import.php");

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
    if (false === $ext = array_key_exists(
            $finfo->file($_FILES['fileXml']['tmp_name']),
            array('text/xml', 'application/xml'),
            true
        )
    ) {
        throw new RuntimeException('Неправильный формат файла');
    }

    $uploadsDir = $_SERVER['DOCUMENT_ROOT'] . '/upload/xml/';
    $fileName = $_FILES['fileXml']['name'];
    $isMoved = move_uploaded_file($_FILES['fileXml']['tmp_name'], $uploadsDir . $fileName);

    if ($isMoved) {
        if (empty($_POST["iblockID"])) {
            throw new RuntimeException('Не передан ID инфоблока');
        } else {
            $IBLOCK_ID = $_POST['iblockID'];
        }

        clearSelectedIBlock($IBLOCK_ID);
        importXml($IBLOCK_ID, $uploadsDir . $fileName);
        unlink($uploadsDir . $fileName);
    } else {
        throw new RuntimeException('Не удалось переместить загруженный файл.');
    }
} catch (RuntimeException $e) {
    sendMessageToJson(STATUS_MESSAGE_JSON["ERROR"], $e->getMessage());
}
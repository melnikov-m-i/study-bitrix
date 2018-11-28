<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    $arComponentDescription = array(
        "NAME" => GetMessage("IMPORT_DATA_NAME"),
        "DESCRIPTION" => GetMessage("IMPORT_DATA_DESC"),
        "PATH" => array(
            "ID" => "demo",
            "CHILD" => array(
                "ID" => "importdataxml",
                "NAME" => GetMessage('IMPORT_DATA_SERVICE')
            )
        ),
    );
?>

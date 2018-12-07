<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die;

$arComponentParameters = array(
    "PARAMETERS" => array(
        "WIDTH_MAP" => array(
            "PARENT" => "VISUAL",
            "NAME" => GetMessage("MXM_SPGL_MAP_WIDTH"),
            "TYPE" => "STRING",
            "DEFAULT" => "600"
        ),
        "HEIGHT_MAP" => array(
            "PARENT" => "VISUAL",
            "NAME" => GetMessage("MXM_SPGL_MAP_HEIGHT"),
            "TYPE" => "STRING",
            "DEFAULT" => "200"
        )
    )
);
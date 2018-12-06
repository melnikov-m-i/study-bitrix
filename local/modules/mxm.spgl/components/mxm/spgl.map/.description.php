<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die;

$arComponentDescription = array(
    "NAME" => GetMessage("MXM_SPGL_MAP_NAME"),
    "DESCRIPTION" => GetMessage("MXM_DESC"),
    "PATH" => array(
        "ID" => "mxm",
        "NAME" => GetMessage("MXM_NAME"),
        "CHILD" => array(
            "ID" => "spgl",
            "NAME" => GetMessage("MXM_SPGL_NAME")
        )
    )
);

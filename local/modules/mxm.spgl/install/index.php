<?php
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;

Loc::loadMessages(__FILE__);

class mxm_spgl extends CModule
{
    protected $errors = false;

    public function __construct()
    {
        if (file_exists(__DIR__ . "/version.php")) {
            $arModuleVersion = array();

            include_once(__DIR__ . "/version.php");

            $this->MODULE_ID = str_replace("_", ".", strtolower(get_class($this)));
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
            $this->MODULE_NAME = Loc::getMessage("MXM_SPGL_NAME");
            $this->MODULE_DESCRIPTION = Loc::getMessage("MXM_SPGL_DESCRIPTION");
        }

        return true;
    }

    public function DoInstall()
    {
        global $APPLICATION;

        if (CheckVersion(ModuleManager::getVersion("main"), "14.00.00")) {
            $this->InstallFiles();
            $this->InstallDB();
            ModuleManager::registerModule($this->MODULE_ID);
            $this->InstallEvents();
        } else {
            $APPLICATION->ThrowException(
                Loc::getMessage("MXM_SPGL_INSTALL_ERROR_VERSION")
            );
        }

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage("MXM_SPGL_INSTALL_TITLE") . " \"" . Loc::getMessage("MXM_SPGL_NAME") . "\"",
            __DIR__ . "/step.php"
        );

        return true;
    }

    public function InstallFiles()
    {
        CopyDirFiles(
            __DIR__ . "/components/mxm",
            Application::getDocumentRoot() . "/bitrix/components/mxm",
            true,
            true
        );

        return true;
    }

    public function InstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/install.sql");
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    public function InstallEvents()
    {
        return true;
    }

    public function DoUninstall()
    {
        global $APPLICATION;

        $this->UnInstallFiles();
        $this->UnInstallDB();
        $this->UnInstallEvents();
        ModuleManager::unRegisterModule($this->MODULE_ID);
        $APPLICATION->IncludeAdminFile(
            Loc::getMessage("MXM_SPGL_UNINSTALL_TITLE") . " \"" . Loc::getMessage("MXM_SPGL_NAME") . "\"",
            __DIR__ . "/unstep.php"
        );

        return true;
    }

    public function UnInstallFiles()
    {
        Directory::deleteDirectory(
            Application::getDocumentRoot() . "/bitrix/components/mxm"
        );

        return true;
    }

    public function UnInstallDB()
    {
        global $DB;
        $this->errors = false;
        $this->errors = $DB->RunSQLBatch(__DIR__ . "/db/uninstall.sql");
        if (!$this->errors) {
            return true;
        } else
            return $this->errors;
    }

    public function UnInstallEvents()
    {
        return true;
    }
}
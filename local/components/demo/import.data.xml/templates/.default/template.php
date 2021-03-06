<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="import-content">
    <div class="import-form">
        <form method="post" name="importDataForm" enctype="multipart/form-data">
            <select name="iblockID">
                <? foreach ($arResult['IBLOCKS'] as $iBlock): ?>
                    <option value="<?= $iBlock['ID']; ?>"
                        <?= $iBlock == $arParams["IBLOCK_ID"] ? "selected" : ""?>
                    >
                        <?= $iBlock['NAME']; ?>
                    </option>
                <? endforeach; ?>
            </select>
            <div class="file-upload">
                <input type="text" class="js-file-name" placeholder="data.xml" readonly>
                <label for="xmlUpload"><?= GetMessage("IMPORT_DATA_FILE_UPLOAD"); ?></label>
                <input type="file" id="xmlUpload" name="fileXml" accept=".xml">
            </div>
            <input type="submit" class="js-btn-submit" value="<?= GetMessage('IMPORT_DATA_SUBMIT'); ?>">
        </form>
    </div>
    <div class="import-area-message"><?= $arResult["MESSAGE"]; ?></div>
</div>

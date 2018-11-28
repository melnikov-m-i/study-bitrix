<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="import-content">
    <div class="import-form">
        <form method="post" enctype="multipart/form-data">
            <select>
                <? foreach ($arResult['IBLOCKS'] as $iBlock): ?>
                <option value="<?= $iBlock['ID']; ?>"><?= $iBlock['NAME']; ?></option>
                <? endforeach; ?>
            </select>
            <div class="file-upload">
                <input type="text" name="pathToFile" placeholder="data.xml">
                <label for="xmlUpload"><?= GetMessage("IMPORT_DATA_FILE_UPLOAD"); ?></label>
                <input type="file" id="xmlUpload" name="fileXml" accept=".xml">
            </div>
            <input type="submit" value="<?= GetMessage('IMPORT_DATA_SUBMIT'); ?>">
        </form>
    </div>
    <div class="import-area-message"></div>
</div>
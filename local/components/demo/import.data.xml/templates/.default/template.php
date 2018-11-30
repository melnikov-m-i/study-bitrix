<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="import-content">
    <div class="import-form">
        <form method="post" name="importDataForm">
            <select name="iblockID">
                <? foreach ($arResult['IBLOCKS'] as $iBlock): ?>
                <option value="<?= $iBlock['ID']; ?>"><?= $iBlock['NAME']; ?></option>
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
    <div class="import-area-message"></div>
</div>

<script>
    (function() {
            var inputXmlUpload = document.querySelector('#xmlUpload');
            var inputFileName = document.querySelector('.js-file-name');
            var btnSubmit = document.querySelector('.js-btn-submit')
            var areaMessage = document.querySelector('.import-area-message');

            inputXmlUpload.addEventListener('change', uploadFile);

            function uploadFile() {
                while (areaMessage.firstChild) {
                    areaMessage.removeChild(areaMessage.firstChild);
                }

                var curFiles = inputXmlUpload.files;

                if (curFiles.length === 0) {
                    var message = document.createElement('p');
                    message.textContent = "Вы не загрузили файл";
                    areaMessage.appendChild(message);
                } else {
                    if (validFileType(curFiles[0])) {
                        var mas = inputXmlUpload.value.split('\\');
                        inputFileName.value = mas[mas.length - 1];
                        btnSubmit.disabled = false;
                    } else {
                        inputFileName.value = "";
                        btnSubmit.disabled = true;
                        var message = document.createElement('p');
                        message.textContent = "Вы загрузили файл в неправильном формате, нужен формат XML";
                        areaMessage.appendChild(message);
                    }
                }
            }

            var fileTypes = [
                'text/xml',
                'application/xml'
            ]

            function validFileType(file) {
                for (var i = 0; i < fileTypes.length; i++) {
                    if (file.type === fileTypes[i]) {
                        return true;
                    }
                }

                return false;
            }

            document.querySelector('form[name="importDataForm"]').addEventListener('submit', function(event) {
                event.preventDefault();

                fetch('<?=$_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER["SERVER_NAME"] . $componentPath?>/upload.php', {
                    body: new FormData(this),
                    method: "POST"
                }).then(function(response) {
                        var contentType = response.headers.get("content-type");
                    console.log(contentType);

                        if (contentType && contentType.includes("application/json")) {
                            return response.json();
                        }

                        throw new TypeError("Данные получены не формате JSON");
                    })
                    .then(function(data) {
                        console.log(data);
                        areaMessage.innerHTML = '<p>' + data['message'] + '</p>';
                    })
                    .catch(function(error) {
                        console.log(error);
                        areaMessage.innerHTML = '<p>' + error + '</p>';
                    });
            });
        }
    )();
</script>



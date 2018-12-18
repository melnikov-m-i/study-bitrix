(function () {
    var inputXmlUpload = document.querySelector('#xmlUpload');
    var inputFileName = document.querySelector('.js-file-name');
    var btnSubmit = document.querySelector('.js-btn-submit');
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
    ];

    function validFileType(file) {
        return fileTypes.indexOf(file.type) !== -1;
    }
    
})();
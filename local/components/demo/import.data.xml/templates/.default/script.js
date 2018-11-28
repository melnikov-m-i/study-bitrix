(function(){
		var inputXmlUpload = document.querySelector('#xmlUpload');
		var areaMessage = document.querySelector('.import-area-message');
		
		inputXmlUpload.addEventListener('change', uploadFile);

		function uploadFile() {
			while(areaMessage.firstChild) {
				areaMessage.removeChild(areaMessage.firstChild);
			}

			var curFiles = inputXmlUpload.files;
			if (curFiles.length === 0) {
				var message = document.createElement('p');
				message.textContent = "Вы не загрузили файл";
				areaMessage.appendChild(message);
			} else {
				if (validFileType(curFiles[0])) {
					console.log('work');
				} else {
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
			for(var i = 0; i < fileTypes.length; i++) {
				if(file.type === fileTypes[i]) {
					return true;
				}
			}

			return false;
		}
	}
)();
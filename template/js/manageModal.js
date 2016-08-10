
// вешаем обработчик на документ
document.addEventListener('click', manage);

function manage(event)
{
	var target = event.target;
	var modal =  document.getElementById('myManageModal');

	// клик по форме редактирования => ничего не делать
	if (target.closest('.modal-content')) {
		return;
	}

	// клик по управляемому элементу
	if(target.classList.contains('manage-button')) {
		// получаем необходимые элементы со страницы
		var save = modal.querySelector('#save');
		var cross = modal.querySelector('.close');
		var cancel = modal.querySelector('#cancel');

		var element = target.parentElement;

		// обработчик на cancel
		cross.onclick = cancel.onclick = function() {
			closeModal(modal);
		};

		// отправка содержимого на сервер
		save.onclick = function(event) {

			var formData = new FormData(document.forms.modalForm);
			formData.append('table', element.getAttribute('data-table'));
			formData.append('id', element.getAttribute('data-id'));

			// отослать
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "/make-change");

			xhr.onload = function(event) {
				if(this.responseText == "ok") {
					window.location = window.location;
				}
			};

			xhr.send(formData);
		}

		// добавление новой услуги
		if(element.classList.contains('new-service')) {
			var priceField = modal.querySelector('.modal-price');
			priceField.style.display = 'initial';
		}
		else {
			// устанавливаем текст для редактирования
			setModalText(modal, element);
		}

		// отображение модального окна
		showModal(modal);

		// прерываем переход по ссылке в случае меню
		event.preventDefault();
	}
	else {
		// клик где-то сбоку
		closeModal(modal);
	}
}

// Установать содержимое модального окна для редактирования
function setModalText(modal, element)
{
	var textBox = modal.querySelector('.modal-edit');

	// устанавливаем значение для большинства редактируемых элментов
	textBox.value = getTextContent(element, 0);

	// устанавливаем второе значение если редактируемый еэлемент строка таблицы
	if(element.classList.contains('service-row')) {
		var priceField = modal.querySelector('.modal-price');
		priceField.style.display = 'initial';
		priceField.value = getTextContent(element, 1);
	}
}

// получение текста из изменяемого элемента
function getTextContent(element, id)
{
	var text = "";
	var tagName = element.tagName;

	switch(tagName) {

		case "UL":
			var liList = element.querySelectorAll('li');
			for(var i = 0; i < liList.length; i++) {
				text += liList[i].innerText;
				if(i < liList.length - 1) {
					text += "\r\n"; 
				}
			}
			break;

		case "TD":
			var tr = element.parentElement;
			var tdList = tr.querySelectorAll('td');
			text = tdList[id].innerText;
			break;

		default:
			text = element.innerText;
	}

	return text;
}

function showBackgroundDiv()
{
	var div = document.createElement('div');
	div.id = "background-div";
	div.style.position = 'fixed';
	div.style.top = "0px";
	div.style.right = "0px";
	div.style.bottom = "0px";
	div.style.left = "0px";
	div.style.zIndex = "1040";
	div.style.backgroundColor = "#000";
	div.style.opacity = "0.5";

	document.body.appendChild(div);
}

function showModal(modal)
{
	modal.style.display = "initial";
	showBackgroundDiv();
}

function closeModal(modal)
{
	var div = document.getElementById('background-div');
	if(div) {
		div.remove();
	}

	var priceField = modal.querySelector('.modal-price');

	if(priceField) {
		priceField.value = "";
		priceField.style.display = 'none';
	}

	var textBox = modal.querySelector('.modal-edit');
	textBox.value = "";

	modal.style.display = "none";
}
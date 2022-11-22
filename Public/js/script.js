// Существуют разные способы получить DOM-узел; здесь мы определяем саму форму и
// поле ввода email и элемент span, в который поместим сообщение об ошибке
const form  = document.getElementById("_form");

const email = document.querySelector('._email');
const error = document.querySelector('._error');

const authorName = document.querySelector('._name');
const text = document.querySelector('._text');


email.addEventListener('input', function (event) {
    // Каждый раз, когда пользователь что-то вводит,
    // мы проверяем, являются ли поля формы валидными

    if (email.validity.valid || authorName.validity.valid) {
        // Если на момент валидации какое-то сообщение об ошибке уже отображается,
        // если поле валидно, удаляем сообщение
        error.textContent = ''; // Сбросить содержимое сообщения
        error.className = '_error'; // Сбросить визуальное состояние сообщения
    } else {
        // Если поле не валидно, показываем правильную ошибку
        showError();
    }
});

form.addEventListener('submit', function (event) {
    // Если поле email валдно, позволяем форме отправляться

    if(!authorName.validity.valid || !text.validity.valid || !email.validity.valid) {
        // Если поле email не валидно, отображаем соответствующее сообщение об ошибке
        showError();
        // Затем предотвращаем стандартное событие отправки формы
        event.preventDefault();
    }
});

function showError() {
    if(email.validity.valueMissing) {
        // Если поле пустое,
        // отображаем следующее сообщение об ошибке
        error.textContent = 'Введите Email.';
    } else if(email.validity.typeMismatch) {
        // Если поле содержит не email-адрес,
        // отображаем следующее сообщение об ошибке
        error.textContent = 'Введите Email.';
    }
    if(authorName.validity.valueMissing) {
        error.textContent = "Введите имя."
    }
    if(text.validity.valueMissing) {
        error.textContent = 'Введите текст отзыва.';
    }

    // Задаём соответствующую стилизацию
    error.className = 'error active';
}
let form = document.querySelector("#_form");
let inputs = document.querySelectorAll("._req");
let email = document.querySelector("._email");
let name1 = document.querySelector("._name");
let text = document.querySelector("._text");

function validateEmail(email) {
    let re = /\S+@\S+\.\S+/;
    return re.test(String(email).toLowerCase());
}

function validateName(name) {
    return String(name) !== "";
}

function validateText(text) {
    return text.length  >= 5;
}

form.onsubmit = function () {
    let emailValue = email.value;
    let nameValue = name1.value;
    let textlValue = text.value;
    let isCorrect = false;

    inputs.forEach(function (input) {
        if (input.value === '') {
            input.classList.add("_error");
            console.log("Пустое поле");
        } else {
            input.classList.remove("_error");
        }
    });
    if (!validateName(nameValue)) {
        console.log("Некорректное имя");
        return false
    }
    if (!validateEmail(emailValue)) {
        console.log("Некорректный Email");
        return false
    }
    if (!validateText(textlValue)) {
        console.log("Некорректный текст");
        return false
    }

    return true;
}

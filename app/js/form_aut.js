//Появление формы авторизации
let aut = document.getElementById("auth");

aut.addEventListener("click", function (event) {
    let div = event.target.closest('#auth');
    if (!div) return;
    let form = document.getElementById("aut");
    form.classList.toggle('show');
});

//Закрытие формы авторизации
let autClosed = document.getElementById("aut-close");

autClosed.addEventListener("click", function (event) {
    let div = event.target.closest('#aut');
    if (!div) return;
    let form = document.getElementById("aut");
    form.classList.toggle('show');
});

//Появление формы регистрации
let reg = document.getElementById("reg");

reg.addEventListener("click", function (event) {
    let div = event.target.closest('#reg');
    if (!div) return;
    let form = document.getElementById("form-reg");
    form.classList.toggle('show');
});

//Закрытие формы регистрации
let regClosed = document.getElementById("reg-close");

regClosed.addEventListener("click", function (event) {
    let div = event.target.closest('#form-reg');
    if (!div) return;
    let form = document.getElementById("form-reg");
    form.classList.toggle('show');
});
let ent = document.getElementById("entrance");

ent.addEventListener("click", function (event) {
    let div = event.target.closest('#entrance');
    if (!div) return;
    let form = document.getElementById("aut");
    form.classList.toggle('show');
});

let closed = document.getElementById("close");

closed.addEventListener("click", function (event) {
    let div = event.target.closest('#aut');
    if (!div) return;
    let form = document.getElementById("aut");
    form.classList.toggle('show');
});
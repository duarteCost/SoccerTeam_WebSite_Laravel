
// Quando incia seleciona a primeira imagem
window.onload = function() {

    currentDiv('1');
}

// Função para mostrar iamgem seguinte
function plusDivs(n) {
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

// Função para mostrar uma iamgem
function showDivs(n) {

    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    x[slideIndex-1].style.display = "block";

}

// função para mudar a opacity onmouseover
function styleonmouseover(n) {
    var element = document.getElementById(n)
    element.style.opacity = 0.5;

}
// função para mudar a opacity onmouseout
function styleOnmouseout(n) {
    var element = document.getElementById(n);
    element.style.opacity = 1;
}
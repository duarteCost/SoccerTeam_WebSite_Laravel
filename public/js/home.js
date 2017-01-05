
var myIndex = 0;
window.onload = function() {

    setImage();
}

var slideIndex = 1;
showDivs(slideIndex);

// Função para mostrar iamgem seguinte
function plusDivs(n) {
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

// Função para mostrar a iamgem
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


// Função gerir o tempo para mudar de imagem
function setImage() {
    setTimeout(setImage, 7000); // muda a cada 7 segundos
    slideIndex +=  1;
    showDivs(slideIndex);
}


// função de adicionado ao carrinho
function clicked() {
    alert("Ticket adicionado ao carrinho!\n")


}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//   Função responsável por os botões quantidade, zona, confirmar, seguinte. 
//    Esta função permite as efetuar verificações de stock de respetivo bilhete, e também é responsável pelo bloqueio dos botões
// // /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function toggleMe(id_view, quantityZonaA, quantityZonaB, quantityZonaC, quantityZonaD ){


    var r=document.getElementById("quantityDiv");
    var viewZone=document.getElementById("stadiumZoneDiv");
    var t=document.getElementById("confirmDiv");
    var g=document.getElementById('mekan');
    var view =document.getElementById(id_view);



    var quantity = document.getElementById("quantity").value;
    var aux_zone = document.getElementById("stadiumZone");
    var zoneStadium = aux_zone.options[aux_zone.selectedIndex].value;




    if(view == r){
        document.getElementById("next1").style.display="block";
        document.getElementById("next2").style.display="none";
        viewZone.style.display="none";
        t.style.display="none";
        r.style.display="block";
        g.style.display="none";
    }

    if(view == viewZone  && (isNaN(quantity) ||   quantity > 0)){ // Se clikcou no botão zona e a quantidade é valida
        document.getElementById("next1").style.display="none";
        select("zone_null");

        /*Verifica de existe disponibilidade para a respectiva quantidade*/
        if(quantityZonaA < quantity) // Se não existe opção fica indisponível
        {
            document.getElementById("zone_a").disabled = true;

        }else {document.getElementById("zone_a").disabled = false;}

        if(quantityZonaB < quantity)// Se não existe opção fica indisponível
        {
            document.getElementById("zone_b").disabled = true;
        }else {document.getElementById("zone_b").disabled = false;}

        if(quantityZonaC < quantity)// Se não existe opção fica indisponível
        {
            document.getElementById("zone_c").disabled = true;
        }else {document.getElementById("zone_c").disabled = false;}

        if(quantityZonaD < quantity)// Se não existe opção fica indisponível
        {
            document.getElementById("zone_d").disabled = true;
        }else {document.getElementById("zone_d").disabled = false;}

        document.getElementById("next2").style.display="block";
        document.getElementById("buttonZone").style.opacity = 1;
        viewZone.style.opacity = 1;
        r.style.display="none";
        t.style.display="none";
        viewZone.style.display="block";
        g.style.display="block";
    }
    else if (view == viewZone  && (!isNaN(quantity) || quantity < 0)) // caso contrario emite um alerta
    {alert("Quantidade inválida! Insira um número de bilhetes válido.");}

    if(view == t && (isNaN(quantity) ||   quantity > 0) && (zoneStadium !='')){ // Se todos os campos preenchidos corretamente são apresentadas as informações do bilhete
        document.getElementById("next1").style.display="none";
        document.getElementById("next2").style.display="none";
        document.getElementById("quantityConfirm").innerHTML="Quantidade:"+quantity;

        switch(zoneStadium) {
            case "zone_a":
                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona A";
                break;
            case "zone_b":
                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona B";
                break;
            case "zone_c":
                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona C";
                break;
            case "zone_d":
                document.getElementById("zoneConfirm").innerHTML = "Zona: Zona D";
                break;
        }
        r.style.display="none";
        viewZone.style.display="none";
        t.style.display="block";
        g.style.display="none";

        // Caso não seja valido é apresentado um alerta com respetivo erro
    }else if(view == t && (zoneStadium =='')){alert("Zona inválida! Selecione uma zona válida.");}
    else if(view == t && (!isNaN(quantity) || quantity < 0)){alert("Quantidade inválida! Insira um número de bilhetes válido.");}



    return true;
}



////////////////////////////////////////////////////////////
//          Função ger se foi clicado no map
////////////////////////////////////////////////////////////
function toSvg(ad,  quantityZonaA, quantityZonaB, quantityZonaC, quantityZonaD ){
    var m, a, t,s,b, c, cc;
    m = document.getElementById(ad);
    a = m.getElementsByTagName('area');
    t='<svg class="uzay">';



    for(var i=0; i<a.length; i++) {
        s = a[i].getAttribute('shape');
        c = a[i].getAttribute('coords');
        b= s+i;


        if(s == 'poly') {
            t+=  '<polyline points="'+c+'" opacity = "0" id="'+b+'" onmouseover="renkli(this.id)" onmouseout="styleOnmouseout(this.id)" onclick="selectZone('+quantityZonaA+', '+quantityZonaB+', '+quantityZonaC+','+quantityZonaD+',this.id)" />';
        }


    }
    t+='</svg>';
    var el= document.getElementById('mekan');
    el.innerHTML = t ;

}


////////////////////////////////////////////////////////////
//          Função selcionar a opçao da selectbox
////////////////////////////////////////////////////////////
function select(zone) {
    document.getElementById(zone).selected = "true";
}




var i=0;
function renkli(ad){

    var myElement= document.getElementById(ad);
    myElement.style.opacity = 0.5;
    myElement.style.fill = "green";


}

function styleOnmouseout(ad){
    var aux_zone = document.getElementById("stadiumZone");
    var zoneStadium = aux_zone.options[aux_zone.selectedIndex].value;

    report(zoneStadium);


}


//////////////////////////////////////////////////////////////////////////////////////////////
//          Função para alterar o valor da slectbox quado clicado numa zona do estadio
//////////////////////////////////////////////////////////////////////////////////////////////
function selectZone( quantityZonaA, quantityZonaB, quantityZonaC, quantityZonaD, ad){

    var quantity = document.getElementById("quantity").value;


    if(ad == "poly0" && quantityZonaB >= quantity) // Se selecionado zoneB e a quantidade é valida
    {
        select('zone_b');

    }
    else if(ad == "poly1" && quantityZonaA >= quantity) // Se selecionado zoneA e a quantidade é valida
    {
        select('zone_a');
    }

    else if(ad == "poly2" && quantityZonaC >= quantity) // Se selecionado zoneC e a quantidade é valida
    {
        select('zone_c');
    }

    else if(ad == "poly3" && quantityZonaD >= quantity) // Se selecionado zoneD e a quantidade é valida
    {
        select('zone_d');
    }
    else {alert("Zona sem lugares disponíveis para a quantidade inserida ");} // Alerta de zona indisponivel

}


/////////////////////////////////////////////////////////////////////////////////////////
//          Função para alterar o zona da imagem selecionada
/////////////////////////////////////////////////////////////////////////////////////////
function report(ad) {

    var myPoly0= document.getElementById('poly0');
    var myPoly1= document.getElementById('poly1');
    var myPoly2= document.getElementById('poly2');
    var myPoly3= document.getElementById('poly3');

    myPoly0.style.opacity = 0;
    myPoly1.style.opacity = 0;
    myPoly2.style.opacity = 0;
    myPoly3.style.opacity = 0;

    if(ad == "zone_a")
    {
        myPoly1.style.opacity = 0.5;
        myPoly1.style.fill = "green";

    }

    if(ad == "zone_b")
    {
        myPoly0.style.opacity = 0.5;
        myPoly0.style.fill = "green";


    }
    if(ad == "zone_c")
    {
        myPoly2.style.opacity = 0.5;
        myPoly2.style.fill = "green";

    }
    if(ad == "zone_d") {
        myPoly3.style.opacity = 0.5;
        myPoly3.style.fill = "green";
    }

}


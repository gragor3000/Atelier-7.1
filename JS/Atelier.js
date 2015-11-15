/**
 * Created by 1253250 on 03/11/2015.
 */

function MainRender(classe)//affiche le menu principale
{
    var div = document.getElementById("Menu")
    var div2 = document.getElementById("Combat")
    div2.style.display = "none"
    div.style.display = "inline"
}

function CombatRender(P_Att, P_Def, P_Vie, M_Att, M_Def, M_Vie)//affiche le menu de combat
{
    var div = document.getElementById("Menu")
    var div2 = document.getElementById("Combat")
    var TxtP_Attack = document.getElementById("P_Att")
    var TxtP_Defense = document.getElementById("P_Def")
    var TxtP_Vie = document.getElementById("P_Vie")
    var TxtM_Attack = document.getElementById("M_Att")
    var TxtM_Defense = document.getElementById("M_Def")
    var TxtM_Vie = document.getElementById("M_Vie")
    TxtP_Attack.value = P_Att
    TxtP_Defense.value = P_Def
    TxtP_Vie.value = P_Vie
    TxtM_Attack.value = M_Att
    TxtM_Defense.value = M_Def
    TxtM_Vie.value = M_Vie
    div2.style.display = "inline"
    div.style.display = "none"
}

function btn_SpecialDisable() {
    var btn = document.getElementById("special")
    btn.setAttribute("disabled", "")
}
function btn_SpecialEnable() {
    var btn = document.getElementById("special")
    btn.setAttribute("Enable", "")
}

function AjaxAttack() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=Attack");
}

function AjaxDefense() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp = new XMLHttpRequest();
    }
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action = Defense");
}

function AjaxFlee() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp = new XMLHttpRequest();
    }
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action = Flee");
}

function AjaxSpecial() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp = new XMLHttpRequest();
    }
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action = Special");
}

function AjaxClass()
{
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp = new XMLHttpRequest();
    }
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var classe
    var x = document.getElementsByName("class");
    var i;
    for (i = 0; i < x.length; i++) {
        if (x[i].checked == true) {
            classe = x[i].value
        }
    }
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var test = return_data.replace(/<script>/g,"")
            test = test.replace("<script>"," ")

            document.getElementById("Main").innerHTML = return_data;
        }
    }

    xmlhttp.open("POST", "Action.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("AddClass=" + classe);
}
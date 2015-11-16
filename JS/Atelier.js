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

function CombatRender(P_Att, P_Def, P_Vie, M_Att, M_Def, M_Vie,P_Gold)//affiche le menu de combat
{
    var div = document.getElementById("Menu")
    var div2 = document.getElementById("Combat")
    var TxtP_Attack = document.getElementById("P_Att")
    var TxtP_Defense = document.getElementById("P_Def")
    var TxtP_Vie = document.getElementById("P_Vie")
    var TxtM_Attack = document.getElementById("M_Att")
    var TxtM_Defense = document.getElementById("M_Def")
    var TxtM_Vie = document.getElementById("M_Vie")
    var TxtP_Gold = document.getElementById("P_Gold")

    TxtP_Attack.value = P_Att
    TxtP_Defense.value = P_Def
    TxtP_Vie.value = P_Vie
    TxtM_Attack.value = M_Att
    TxtM_Defense.value = M_Def
    TxtM_Vie.value = M_Vie
    TxtP_Gold.value = P_Gold
    div2.style.display = "inline"
    div.style.display = "none"
}
function btn_CombatMarketDisable()
{
    var btn_Market = document.getElementById("btn_Market")
    var btn_Combat = document.getElementById("btn_Combat")
    var btn_Att = document.getElementById("Attack")
    var btn_Def = document.getElementById("Defense")
    var btn_Flee = document.getElementById("Flee")

    btn_Att.removeAttribute("disabled")
    btn_Def.removeAttribute("disabled")
    btn_Flee.removeAttribute("disabled")
    btn_Combat.setAttribute("Enable","")
    btn_Market.setAttribute("Enable","")
    btn_Combat.setAttribute("Enable","")


    btn_Combat.removeAttribute("Enable")
    btn_Market.removeAttribute("Enable")
    btn_Combat.setAttribute("disabled","")
    btn_Market.setAttribute("disabled","")

}

function btn_CombatMarketEnable()
{
    var btn_Market = document.getElementById("btn_Market")
    var btn_Combat = document.getElementById("btn_Combat")
    var btn_Att = document.getElementById("Attack")
    var btn_Def = document.getElementById("Defense")
    var btn_Flee = document.getElementById("Flee")

    btn_Att.removeAttribute("Enable")
    btn_Def.removeAttribute("Enable")
    btn_Flee.removeAttribute("Enable")
    btn_Combat.setAttribute("disabled","")
    btn_Market.setAttribute("disabled","")
    btn_Combat.setAttribute("disabled","")

    btn_Combat.removeAttribute("disabled")
    btn_Market.removeAttribute("disabled")
    btn_Combat.setAttribute("Enable","")
    btn_Market.setAttribute("Enable","")
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

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var str = return_data.split(",")
            alert(str[0])
            alert(str[1])
            if (str[2] == "perdu" || str[2] == "Gagné") {
                alert("Vous avez " + str[2])
                CombatRender(str[3], str[4], str[5], str[6], str[7], str[8],str[9])
                btn_CombatMarketEnable()
                if (str[10] == "Enable")
                    btn_SpecialEnable()
                else
                    btn_SpecialDisable()
            }
            else {
                CombatRender(str[2], str[3], str[4], str[5], str[6], str[7],str[8])
                if (str[9] == "Enable")
                    btn_SpecialEnable()
                else
                    btn_SpecialDisable()
            }
        }
    }
}

function AjaxDefense() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=Defense");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var str = return_data.split(",")
            alert(str[0])
            if (str[1] == "perdu") {
                alert("Vous avez " + str[1])
                CombatRender(str[2], str[3], str[4], str[5], str[6], str[7],str[8])
                btn_CombatMarketEnable()
                if (str[9] == "Enable")
                    btn_SpecialEnable()
                else
                    btn_SpecialDisable()
            }
            else {
                CombatRender(str[1], str[2], str[3], str[4], str[5], str[6],str[7])
                if (str[8] == "Enable")
                    btn_SpecialEnable()
                else
                    btn_SpecialDisable()
            }
        }
    }
}

function AjaxFlee() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=Flee");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var str = return_data.split(",")
            alert(str[0])
            if (str[1] == "perdu")
                alert("Vous avez " + str[1])
            else
                alert(str[1])

            CombatRender(str[2], str[3], str[4], str[5], str[6], str[7],str[8])
            btn_CombatMarketEnable()
            if (str[9] == "Enable")
                btn_SpecialEnable()
            else
                btn_SpecialDisable()
        }
    }
}

function AjaxSpecial() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=Special");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var str = return_data.split(",")

            if (str[0] == "perdu" || str[0] == "Gagné") {
                alert("Vous avez " + str[0])
                CombatRender(str[1], str[2], str[3], str[4], str[5], str[6],str[7])
                btn_CombatMarketEnable()
                if (str[8] == "Enable")
                    btn_SpecialEnable()
                else
                    btn_SpecialDisable()
            }
            else
                CombatRender(str[0], str[1], str[2], str[3], str[4], str[5],str[6])
            if (str[7] == "Enable")
                btn_SpecialEnable()
            else
                btn_SpecialDisable()


        }
    }
}

function AjaxClass() {
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
        if (x[i].checked) {
            classe = x[i].value
        }
    }

    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("AddClass=" + classe);

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var str = return_data.split(",")
            CombatRender(str[0], str[1], str[2], str[3], str[4], str[5],str[6])
            btn_CombatMarketDisable();
            if (str[7] == "Disable")
                btn_SpecialDisable()
            else
                btn_SpecialEnable()
        }
    }
}
function AjaxMarket()
{
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=Gold");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var str = return_data.split(",")
            CombatRender(str[0], str[1], str[2], str[3], str[4], str[5],str[6])
            btn_CombatMarketDisable();
            btn_SpecialEnable()
        }
    }
}

function AjaxCombat()
{
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "../PHP/Action.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("Action=Combat");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var return_data = xmlhttp.responseText;
            var str = return_data.split(",")
            CombatRender(str[0], str[1], str[2], str[3], str[4], str[5],str[6])
            btn_CombatMarketDisable();
            btn_SpecialEnable()

        }
    }
}
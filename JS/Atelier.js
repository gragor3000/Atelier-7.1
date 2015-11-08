/**
 * Created by 1253250 on 03/11/2015.
 */

function MainRender(classe)//affiche le menu principale
{
    var div = document.getElementById("Menu")
    var div2= document.getElementById("Combat")
    div2.style.display = "none"
    div.style.display = "inline"
}

function CombatRender(P_Att,P_Def,P_Vie,M_Att,M_Def,M_Vie)//affiche le menu de combat
{
    var div = document.getElementById("Menu")
    var div2= document.getElementById("Combat")
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

function btn_SpecialDisable()
{
    var btn = document.getElementById("special")
    btn.setAttribute("disabled","")
}
function btn_SpecialEnable()
{
    var btn = document.getElementById("special")
    btn.setAttribute("Enable","")
}
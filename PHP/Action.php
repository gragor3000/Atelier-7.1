<?php
/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 2015-11-07
 * Time: 12:47
 */
include("Mage.php");
include("Warrior.php");
include("Clerk.php");
include("Monster.php");
session_start();
define("PLAYER", 0);
define("MONSTER", 1);

if (isset($_POST['SubmitClass'])) {//le joueur choisi sa classe
    CreationClass($_POST['class']);
    CreationMonstre();
    Info();
}

/*if(isset($_POST['AddClass']))
{
    CreationClass($_POST['AddClass']);
    CreationMonstre();
    Info();
}*/

if (isset($_SESSION['Class'])) {

   /* if (isset($_POST['btn_Att']))//joueur veut attaquer
        Attack(MONSTER);

    elseif (isset($_POST['btn_Def']))//le joueur veut défendre
        Defendre();

    elseif (isset($_POST['btn_Flee']))//le joueur veut fuir
        Fuir(PLAYER);

    elseif (isset($_POST['btn_Spec']))//attaque special
        Special($_SESSION['Class']);*/

    if (isset($_POST['Action'])) {
        switch ($_POST['Action']) {
            case "Attack":
            Attack(MONSTER);
        }
    }
    Info();
} //else
   // header("location: index.php");

function Info()//refresh les info sur les stats
{
    $P_Attack = json_encode($_SESSION['Class']->__get("Attack"), JSON_HEX_TAG | JSON_HEX_AMP);
    $P_Defense = json_encode($_SESSION['Class']->__get("Defense"), JSON_HEX_TAG | JSON_HEX_AMP);
    $P_Vie = json_encode($_SESSION['Class']->__get("Hp"), JSON_HEX_TAG | JSON_HEX_AMP);
    $M_Attack = json_encode($_SESSION['Monstre']->__get("Attack"), JSON_HEX_TAG | JSON_HEX_AMP);
    $M_Defense = json_encode($_SESSION['Monstre']->__get("Defense"), JSON_HEX_TAG | JSON_HEX_AMP);
    $M_Vie = json_encode($_SESSION['Monstre']->__get("Hp"), JSON_HEX_TAG | JSON_HEX_AMP);
    echo "<script> CombatRender('$P_Attack','$P_Defense','$P_Vie','$M_Attack','$M_Defense','$M_Vie') </script>";
    if ($_SESSION['Class']->__get("Special") == true)
        echo "<script> btn_SpecialDisable() </script>";
    else
        echo "<script> btn_SpecialEnable() </script>";

}

function CreationClass($Class)//instancie la classe du joueur
{
    if ($Class == "Mage")
        $_SESSION['Class'] = new \Atelier\Mage();
    elseif ($Class == "Warrior")
        $_SESSION['Class'] = new \Atelier\Warrior();
    else
        $_SESSION['Class'] = new \Atelier\Clerk();

}

function CreationMonstre()//créer le premier monstre a affronter
{
    $_SESSION['Monstre'] = new \Atelier\Monster();
}

function Attack($cible)//le joueur veut attaquer
{
    if ($cible == MONSTER) {//joueur attaque monstre
        $roll = rand(1, 10);
        $P_Att = $_SESSION['Class']->__get("Attack");
        $M_Def = $_SESSION['Monstre']->__get("Defense");
        if ($roll < ($P_Att - $M_Def) || $roll == 1) {
            $degat = rand(1, $P_Att - $M_Def);
            $M_Vie = $_SESSION['Monstre']->__get("Hp");
            $_SESSION['Monstre']->__set("Hp", ($M_Vie - $degat));
            echo "<script>alert('Attaque réussi : $degat de dégat') </script>";
        } else
            echo "<script>alert('Attaque raté') </script>";
        $M_Vie = $_SESSION['Monstre']->__get("Hp");
        if ($M_Vie <= 2) {
            Fuir(MONSTER);
        } else
            Attack(PLAYER);
    } else {//monstre attaque joueur
        $roll = rand(1, 10);
        $M_Att = $_SESSION['Monstre']->__get("Attack");
        $P_Def = $_SESSION['Class']->__get("Defense");
        if ($roll < ($M_Att - $P_Def) || $roll == 1) {
            $degat = rand(1, $M_Att - $P_Def);
            $P_Vie = $_SESSION['Class']->__get("Hp");
            $_SESSION['Class']->__set("Hp", ($P_Vie - $degat));
            echo "<script>alert('Monstre réussi son attaque : $degat de dégat') </script>";
        } else
            echo "<script>alert('Monstre rate son attaque') </script>";
    }
    if ($_SESSION['Class']->__get("Hp") <= 0) {
        $_SESSION['Class']->Reset();
        CreationMonstre();
        echo "<script>alert('Combat perdu') </script>";
    } elseif ($_SESSION['Monstre']->__get("Hp") <= 0) {
        $_SESSION['Class']->Reset();
        CreationMonstre();
        echo "<script>alert('Combat Gagné !') </script>";
    }
}

function Defendre()//le joueur veut se défendre
{
    $roll = rand(1, 10);
    $M_Att = $_SESSION['Monstre']->__get("Attack");
    $P_Def = $_SESSION['Class']->__get("Defense");
    if ($roll < ($M_Att - $P_Def) || $roll == 1) {
        $degat = floor(rand(1, $M_Att - $P_Def) / 2);
        $P_Vie = $_SESSION['Class']->__get("Hp");
        $_SESSION['Class']->__set("Hp", ($P_Vie - $degat));
        echo "<script>alert('Monstre réussi son attaque : $degat de dégat(réduit de moitié)') </script>";
    } else
        echo "<script>alert('Monstre rate son attaque') </script>";

    if ($_SESSION['Class']->__get("Hp") <= 0) {
        $_SESSION['Class']->Reset();
        CreationMonstre();
        echo "<script>alert('Combat perdu') </script>";
    }

}

function Fuir($cible)// la cible veut fuir
{
    if ($cible == PLAYER) {
        Attack(PLAYER);
        $P_Vie = $_SESSION['Class']->__get("Hp");
        if ($P_Vie > 0) {
            $_SESSION['Class']->Reset();
            CreationMonstre();
            echo "<script>alert('fuite réussi') </script>";
        }
    } else {
        $M_Vie = $_SESSION['Monstre']->__get("Hp");
        if ($M_Vie > 0) {
            $_SESSION['Class']->Reset();
            CreationMonstre();
            echo "<script>alert('le monstre a fui') </script>";
        }
    }
}

function Special($class)//le jouer veut faire une attaque spécial
{
    if ($class instanceof \Atelier\Mage) {
        $_SESSION['Class']->__set("Hp", ($_SESSION['Class']->__get("Hp") - 1));
        $_SESSION['Monstre']->__set("Hp", ($_SESSION['Monstre']->__get("Hp") - 5));
        $_SESSION['Class']->__set("Special", true);
    } elseif ($class instanceof \Atelier\Clerk) {
        $roll = rand(1, 5);
        $_SESSION['Class']->__set("Hp", $roll);
        if (($_SESSION['Class']->__get("Defense") - 1) >= 1)
            $_SESSION['Class']->__set("Defense", ($_SESSION['Class']->__get("Defense") - 1));
    }
    if ($_SESSION['Class']->__get("Hp") <= 0) {
        $_SESSION['Class']->Reset();
        CreationMonstre();
        echo "<script>alert('Combat perdu') </script>";
    } elseif ($_SESSION['Monstre']->__get("Hp") <= 0) {
        $_SESSION['Class']->Reset();
        CreationMonstre();
        echo "<script>alert('Combat Gagné !') </script>";
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Mic
 * Date: 2015-11-07
 * Time: 12:47
 */
session_start();
include("Mage.php");
include("Warrior.php");
include("Clerk.php");
include("Monster.php");

if(isset($_POST['SubmitClass'])) {
    CreationClass($_POST['class']);
    CreationMonstre();
}



function CreationClass($Class)//instancie la classe du joueur
{
    if($Class == "Mage")
        $_SESSION['Class'] = new \Atelier\Mage();
    elseif($Class == "Warrior")
        $_SESSION['Class'] = new \Atelier\Warrior();
    else
        $_SESSION['Class'] = new \Atelier\Clerk();
}

function CreationMonstre()//créer le premier monstre a affronter
{
    $_SESSION['Monstre'] = new \Atelier\Monster();
}
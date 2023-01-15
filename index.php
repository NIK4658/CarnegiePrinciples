<?php
//Database Conection
require_once './database/bootstrap.php';
$PrincipleID = $dbh->getWeeklyPrincipleID();
if($PrincipleID[0]==null){
    $dbh->generateWeeklyPrinciple();
    $PrincipleID = $dbh->getWeeklyPrincipleID();
}
$Principle = $dbh->getPrincipleFromID($PrincipleID[0]['PrincipleID']);
$Notions = $dbh->getNotionsFromPrincipleID($Principle[0]['ID']);
require './Template/base.php';
?>
<?php
session_start();

$ID = $_SESSION['user_logID'];

echo $ID;


/*
   $sha1 = sha1("000000");
   echo "$sha1";
?>*/
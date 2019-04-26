<?php
session_start();
include 'dbconnection.php';
include 'header.php';

$search = $_POST['search'];
$_SESSION['search'] = $search;

$sql = "SELECT * FROM voorwerp WHERE titel like (?)";
$query = $dbh->prepare($sql);
$query->execute(array($_SESSION['search']));

$results = $query->fetch(PDO::FETCH_ASSOC);

var_dump($results);
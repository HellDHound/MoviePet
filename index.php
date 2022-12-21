<?
session_start();
$_SESSION['TEST'] = '!';
ini_set('display_errors', 1);
require_once 'application/bootstrap.php';

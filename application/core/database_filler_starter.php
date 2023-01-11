<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/route.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/models/database_filler_model.php';

$fill = new databaseFillerModel();
$fill->genreFilmsUpdater();
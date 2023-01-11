<?php
use core\View;
include $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_model.php';
include $_SERVER['DOCUMENT_ROOT'] . '/application/models/films_data_model.php';

class Controller_User extends Controller
{
    function __construct()
    {
        $this->model = new userModel();
        $this->films = new FilmsDataModel();
        $this->view = new View();
    }

    function action_favorites()
    {
        if ($_SESSION['USER']){
            $data['genres']  = $this->films->genresListGetFromDatabaseByFilms();
            $data['filmList'] = $this->films->getFilmsByUserId('*',$_GET['page']);
            $data['posters'] = [];
            foreach ($data['filmList'] as &$film){
                $film['favorite'] = true;
            }
            unset($film);
            $data['pagesCount'] = ceil($this->films->countUserFavorites()/25);
            foreach ($data['filmList'] as $film){
                if (count($data['posters']) < 4){
                    $data['posters'][] = $film['posterUrl'];
                } else {
                    break;
                }
            }
            $this->view->generate('favorites_list_view.php', 'base_template_view.php', $data);
        }else{
            header('Location: /');
        }
    }

    function action_addToFavorites()
    {
        if ($_SESSION['USER']) {
            $this->films->addFilmToFavorites($_POST['filmId']);
        }
        else{
            $this->json = array(
                "errors" => array ("notUser" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
        }
    }

    function action_removeFromFavorites()
    {
        $this->films->removeFilmFromFavorites($_POST['filmId']);
    }
}
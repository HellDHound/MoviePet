<?
//session_start();

use core\View;
include 'C:\OSPanel\domains\Pet-Test\application\models\films_data_model.php';
class Controller_Genres extends Controller
{
    function __construct()
    {
        $this->model = new FilmsDataModel();
        $this->view = new View();
    }
    function action_genrepage()
    {
        $data['genres']  = $this->model->genresListGetFromDatabase();
        if ($_GET['genreName'] != 'для взрослых')
        {
            $data['filmsByGenre'] = $this->model->getFilmsByGenre($_GET['genreName'],$_GET['page']);
            $data['pagesCount'] = round($this->model->countFilmsByGenre($_GET['genreName'])[0]/25,0);
        } else{
            $data['18Marker'] = true;
        }

        $this->view->generate('genres_view.php', 'base_template_view.php', $data);
    }

    function action_detailpage()
    {
        $data['genres']  = $this->model->genresListGetFromDatabase();
        $data['filmData'] = $this->model->getFilmById($_GET['filmId']);

        $this->view->generate('detail_view.php', 'base_template_view.php', $data);
    }
}
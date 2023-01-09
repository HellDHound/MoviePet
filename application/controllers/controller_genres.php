<?

use core\View;
include $_SERVER['DOCUMENT_ROOT'] . '/application/models/films_data_model.php';
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
            $data['userFavoriteFilmsList'] = $this->model->getFilmsByUserId(['userId','filmId']);
            $data['filmsByGenre'] = $this->model->checkUserFilms($data['userFavoriteFilmsList'], $data['filmsByGenre']);
            $data['pagesCount'] = ceil($this->model->countFilmsByGenre($_GET['genreName'])['COUNT(*)']/25);
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
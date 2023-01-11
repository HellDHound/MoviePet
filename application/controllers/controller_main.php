<?
use core\View;
include $_SERVER['DOCUMENT_ROOT'] . '/application\models\films_data_model.php';

class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new FilmsDataModel();
        $this->view = new View();
    }
    function action_index()
    {
        $data['posters'] = [];
        if ($_SESSION['USER'])
        {
            $userFavoriteList = $this->model->getFilmsByUserId(['userId','filmId']);
            $data['genres']  = $this->model->genresListGetFromDatabaseByFilms();
            $data['filmsByRatingKp'] = $this->model->getFilmsByRatingKp(100, 'desc');
            $data['filmsByRatingKp'] = $this->model->checkUserFilms($userFavoriteList, $data['filmsByRatingKp']);
            $data['filmsByRatingImdb'] = $this->model->getFilmsByRatingImdb(100, 'desc');
            $data['filmsByRatingImdb'] = $this->model->checkUserFilms($userFavoriteList, $data['filmsByRatingImdb']);
            $data['filmsByYear'] = $this->model->getFilmsByYear(100, 'desc');
            $data['filmsByYear'] = $this->model->checkUserFilms($userFavoriteList, $data['filmsByYear']);
        } else{
            $data['genres']  = $this->model->genresListGetFromDatabaseByFilms();
            $data['filmsByRatingKp'] = $this->model->getFilmsByRatingKp(100, 'desc');
            $data['filmsByRatingImdb'] = $this->model->getFilmsByRatingImdb(100, 'desc');
            $data['filmsByYear'] = $this->model->getFilmsByYear(100, 'desc');
        }
        foreach ($data['filmsByYear'] as $film){
            if (count($data['posters']) < 4){
                $data['posters'][] = $film['posterUrl'];
            } else {
                break;
            }
        }

        $this->view->generate('main_page_view.php', 'base_template_view.php', $data);

    }
}
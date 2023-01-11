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
        $data['genres']  = $this->model->genresListGetFromDatabaseByFilms();
        $data['posters'] = [];
        if ($_GET['genreName'] != 'для взрослых')
        {
            $genreId = array_search($_GET['genreName'],array_column($data['genres'],'genre'));
            $data['filmsByGenre'] = $this->model->getFilmsByGenre($_GET['genreName'],$_GET['page']);
            $data['userFavoriteFilmsList'] = $this->model->getFilmsByUserId(['userId','filmId']);
            $data['filmsByGenre'] = $this->model->checkUserFilms($data['userFavoriteFilmsList'], $data['filmsByGenre']);
            $data['pagesCount'] = ceil( $data['genres'][$genreId]['genreFilms']/25);
            foreach ($data['filmsByGenre'] as $film){
                if (count($data['posters']) < 4){
                    $data['posters'][] = $film['posterUrl'];
                } else {
                    break;
                }
            }
            if (empty($data['filmsByGenre'])){
                header('Location: /');
            }
        } else{
            $data['18Marker'] = true;
        }

        $this->view->generate('genres_view.php', 'base_template_view.php', $data);
    }

    function action_detailpage()
    {
        $data['genres']  = $this->model->genresListGetFromDatabaseByFilms();
        $data['filmData'] = $this->model->getFilmById($_GET['filmId']);
        $data['posters'][] = $data['filmData']['posterUrl'];

        $this->view->generate('detail_view.php', 'base_template_view.php', $data);
    }
}
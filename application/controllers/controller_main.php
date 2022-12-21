<?

use core\View;
include 'C:\OSPanel\domains\Pet-Test\application\models\films_data_model.php';

class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new FilmsDataModel();
        $this->view = new View();
    }
    function action_index()
    {
        $data['genres']  = $this->model->genresListGetFromDatabase();
        $data['filmsByRatingKp'] = $this->model->getFilmsByRatingKp(100, 'desc');
        $data['filmsByRatingImdb'] = $this->model->getFilmsByRatingImdb(100, 'desc');
        $data['filmsByYear'] = $this->model->getFilmsByYear(100, 'desc');

        $this->view->generate('main_page_view.php', 'base_template_view.php', $data);

    }
}
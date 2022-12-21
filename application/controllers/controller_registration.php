<?
//session_start();
use core\View;
include 'C:\OSPanel\domains\Pet-Test\application\models\user_model.php';
include 'C:\OSPanel\domains\Pet-Test\application\models\films_data_model.php';


class Controller_Registration extends Controller
{
    function __construct()
    {
        $this->model = new userModel();
        $this->films = new FilmsDataModel();
        $this->view = new View();
    }
    function action_register()
    {
        $data['genres']  = $this->films->genresListGetFromDatabase();
        if ($_POST['register']) {
            $data['register'] = $this->model->createUser($_POST['register']);
        }

        $this->view->generate('registration_page_view.php', 'base_template_view.php', $data);

    }
    function action_authorize()
    {
        $data['genres']  = $this->films->genresListGetFromDatabase();
        if ($_POST['authorize']){
            $data['authorize'] = $this->model->authorizeUser($_POST['authorize']);
        }
        $this->view->generate('authorization_page_view.php', 'base_template_view.php', $data);

    }
    function action_account()
    {
        //session_start();
        $data['genres']  = $this->films->genresListGetFromDatabase();
        $data['user'] = $_SESSION['user'];
        $this->view->generate('account_page_view.php', 'base_template_view.php', $data);

    }
    function action_change_password()
    {
        //session_start();
        $data['genres']  = $this->films->genresListGetFromDatabase();
        if ($_POST['change']){
            $this->model->changeUserPassword($_POST['change']);
        }
        $data['user'] = $_SESSION['user'];
        $this->view->generate('account_page_view.php', 'base_template_view.php', $data);

    }
}
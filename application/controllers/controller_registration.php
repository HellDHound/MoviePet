<?
//session_start();
use core\View;
include 'C:\OSPanel\domains\Pet-Test\application\models\user_model.php';
include 'C:\OSPanel\domains\Pet-Test\application\models\films_data_model.php';
include 'C:\OSPanel\domains\Pet-Test\application\helpers\captcha_helper.php';


class Controller_Registration extends Controller
{
    function __construct()
    {
        $this->model = new userModel();
        $this->films = new FilmsDataModel();
        $this->view = new View();
        $this->captcha = new Captcha_Helper();
    }
    function action_register()
    {
        if ($this->captcha->checkCaptcha($_POST)){
            $this->json = array(
                "errors" => array ("captchaError" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
            //echo ('"errors": ["captchaError": true]');
        } else{
            //$data['genres']  = $this->films->genresListGetFromDatabase();
            if ($_POST['register']){
                $this->model->createUser($_POST['register']);
            }
        }
        //$data['genres']  = $this->films->genresListGetFromDatabase();
        /*if ($_POST['register']) {
            $data['register'] = $this->model->createUser($_POST['register']);
        }*/

        //$this->view->generate('registration_page_view.php', 'base_template_view.php', $data);

    }
    function action_authorize()
    {
        if ($this->captcha->checkCaptcha($_POST)){
            $this->json = array(
                "errors" => array ("captchaError" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
            //echo ('"errors": ["captchaError": true]');
        } else{
            //$data['genres']  = $this->films->genresListGetFromDatabase();
            if ($_POST['authorize']){
                $this->model->authorizeUser($_POST['authorize']);
            }
        }

        //$this->view->generate('authorization_page_view.php', 'base_template_view.php', $data);

    }
    function action_deauthorize()
    {
        $data['genres']  = $this->films->genresListGetFromDatabase();
        $this->model->deauthorizeUser();
        $this->view->generate('authorization_page_view.php', 'base_template_view.php', $data);
    }
    function action_account()
    {
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
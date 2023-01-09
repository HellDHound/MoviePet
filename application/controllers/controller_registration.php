<?
use core\View;
include $_SERVER['DOCUMENT_ROOT'] . '/application/models/user_model.php';
include $_SERVER['DOCUMENT_ROOT'] . '/application/models/films_data_model.php';
include $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/captcha_helper.php';


class Controller_Registration extends Controller
{
    function __construct()
    {
        $this->model = new userModel();
        $this->films = new FilmsDataModel();
        $this->view = new View();
        $this->captcha = new Captcha_Helper();
        if (($_SERVER['REQUEST_URI'] == '/registration/authorize' && empty($_POST['authorize']))
            || ($_SERVER['REQUEST_URI'] == '/registration/register' && empty($_POST['register']))){
            header('Location: /');
        }
    }

    function action_register()
    {
        if ($this->captcha->checkCaptcha($_POST)){
            $this->json = array(
                "errors" => array ("captchaError" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
        } else{
            if ($_POST['register']){
                $this->model->createUser($_POST['register']);
            }
        }
    }
    function action_authorize()
    {
        if ($this->captcha->checkCaptcha($_POST)){
            $this->json = array(
                "errors" => array ("captchaError" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
        } else{
            if ($_POST['authorize']){
                $this->model->authorizeUser($_POST['authorize']);
            }
        }
    }
    function action_deauthorize()
    {
        $data['genres']  = $this->films->genresListGetFromDatabase();
        $this->model->deauthorizeUser();
    }
    function action_account()
    {
        if ($_SESSION['USER']){
            $data['genres']  = $this->films->genresListGetFromDatabase();
            $data['user'] = $_SESSION['USER'];
            $this->view->generate('account_page_view.php', 'base_template_view.php', $data);
        } else{
            header('Location: /');
        }
    }
    function action_change_password()
    {
        $data['genres']  = $this->films->genresListGetFromDatabase();
        if ($_POST['change']){
            $this->model->changeUserPassword($_POST['change']);
        }
        $data['user'] = $_SESSION['user'];
        $this->view->generate('account_page_view.php', 'base_template_view.php', $data);
    }
}
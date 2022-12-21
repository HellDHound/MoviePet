<?
//include 'view.php';
class Controller {

    public $model;
    public $view;

    function __construct()
    {

        $this->view = new View();
    }

    function action_before_action()
    {
        if($_POST){

        }
    }
}

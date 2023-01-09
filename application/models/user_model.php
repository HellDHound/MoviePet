<?
include $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/database_data_helper.php';
class userModel extends Model
{
    private $mysqli;
    public function __construct()
    {
        $databaseData = new Database_Data_Helper();
        $databaseData = (array)$databaseData;
        $this->mysqli = new mysqli($databaseData['hostName'], $databaseData['userName'], $databaseData['password'], $databaseData['databaseName']);
    }
    public function createUser($post){
        $passwordHash = password_hash($post['password'], PASSWORD_DEFAULT);
        $checkUser = $this->getUserByEmail($post['email'], ['id','email','username']);
        if (empty($checkUser)){
            $insertQuery = "
                    INSERT INTO user_movie_table
                (username, email, password)
                VALUES 
                ('{$post['name']}','{$post['email']}','{$passwordHash}')";
            $resultQuery = $this->mysqli->query($insertQuery);
            $this->json = array(
                "errors" => array ("captchaError" => 'false',"logPassError" => 'false',"emailError" => 'false')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
        }else{
            $this->json = array(
                "errors" => array ("captchaError" => 'false',"logPassError" => 'false',"emailError" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);}
    }
    public function authorizeUser($post){
        $checkUser = $this->getUserByEmail($post['email'], ['id','email','username','password', 'usergroup']);
        if (!empty($checkUser) && password_verify($post['password'],$checkUser['password'])){
            $_SESSION['USER']['email'] = $checkUser['email'];
            $_SESSION['USER']['name'] = $checkUser['username'];
            $_SESSION['USER']['usergroup'] = $checkUser['usergroup'];
            $_SESSION['USER']['id'] = $checkUser['id'];
            $this->json = array(
                "errors" => array ("captchaError" => 'false',"logPassError" => 'false')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
        } else{
            $this->json = array(
                "errors" => array ("captchaError" => 'false',"logPassError" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
        }
    }
    public function deauthorizeUser(){
        unset($_SESSION['USER']);
        echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
    public function changeUserPassword($post){
        $checkUser = $this->getUserByEmail($_SESSION['USER']['email'], ['id','email','username','password', 'usergroup']);
        if (!empty($checkUser) && password_verify($post['password'],$checkUser['password'])){
            $passwordHash = password_hash($post['newPassword'], PASSWORD_DEFAULT);
            $insertQuery = "UPDATE user_movie_table SET password = '{$passwordHash}' WHERE email = '{$_SESSION['USER']['email']}'";
            $resultQuery = $this->mysqli->query($insertQuery);
            echo "<script>alert('Ваш пароль успешно изменен');
                    location.href='" . $_SERVER['HTTP_ORIGIN'] . "';</script>";
        } else{
            echo '<script>alert("Старый пароль указан неверно")</script>';
        }
    }
    public function getUserByEmail($email, $selectedFields = 'id'){
        if (is_array($selectedFields)){
            $fieldsArray = implode(',', $selectedFields);
        } else{
            $fieldsArray = $selectedFields;
        }
        $insertQuery = "SELECT $fieldsArray FROM user_movie_table WHERE email = '{$email}'";
        $resultQuery = $this->mysqli->query($insertQuery);
        $returnArray = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $returnArray = $row;
        }
        return $returnArray;
    }
}

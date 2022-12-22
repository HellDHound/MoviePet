<?
class userModel extends Model{
    public function createUser($post){
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        $passwordHash = password_hash($post['password'], PASSWORD_DEFAULT);
        $checkUser = $this->getUserByEmail($post['email'], ['id','email','username']);
        if (empty($checkUser)){
            $insertQuery = "
                    INSERT INTO user_movie_table
                (username, email, password)
                VALUES 
                ('{$post['name']}','{$post['email']}','{$passwordHash}')";
            $resultQuery = $mysqli->query($insertQuery);
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
            //echo ('{"errors": ["captchaError": false, "logPassError": false]}');
            $this->json = array(
                "errors" => array ("captchaError" => 'false',"logPassError" => 'false')
            );
            echo json_encode($this->json, ENT_NOQUOTES);
            /*echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
            echo "<script>alert('Вы успешно авторизованы');
                    location.href='" . $_SERVER['HTTP_ORIGIN'] . "';</script>";*/
        } else{
            $this->json = array(
                "errors" => array ("captchaError" => 'false',"logPassError" => 'true')
            );
            echo json_encode($this->json, ENT_NOQUOTES);/*            echo json_encode('<script>alert("Введен неверный логин или пароль")</script>');*/
/*            echo '<script>alert("Введен неверный логин или пароль")</script>';*/
        }
    }
    public function deauthorizeUser(){
        unset($_SESSION['USER']);
        echo "<script>location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
    public function changeUserPassword($post){
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        echo "<pre>";
        print_r($post);
        echo "</pre>";
        $checkUser = $this->getUserByEmail($_SESSION['USER']['email'], ['id','email','username','password', 'usergroup']);
        echo "<pre>";
        print_r($checkUser);
        echo "</pre>";
        if (!empty($checkUser) && password_verify($post['password'],$checkUser['password'])){
            $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
            $passwordHash = password_hash($post['newPassword'], PASSWORD_DEFAULT);
            $insertQuery = "UPDATE user_movie_table SET password = '{$passwordHash}' WHERE email = '{$_SESSION['USER']['email']}'";
            $resultQuery = $mysqli->query($insertQuery);
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
        $mysqli = new mysqli("yii2-advanced-2", "root", "", "mysql");
        $insertQuery = "SELECT $fieldsArray FROM user_movie_table WHERE email = '{$email}'";
        $resultQuery = $mysqli->query($insertQuery);
        $returnArray = [];
        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $returnArray = $row;
        }
        return $returnArray;
    }
}

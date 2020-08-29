<?php

class UserController
{

    public function actionRegister()
    {

        if(isset($_POST['first_name'])) {

            $name = htmlspecialchars(trim($_POST['first_name']));
            $lastName = htmlspecialchars(trim($_POST['last_name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));

            $errors = array();
            if(!User::checkName($name)) {
                $errors['name'] = 'Name must be longer than 3 letters';
            }
            if(!User::checkLastname($lastName)) {
                $errors['lastName'] = 'Last Name must be longer than 3 letters';
            }
            if(!User::checkEmail($email)) {
                $errors['email'] = 'Invalid email';
            }
            if(User::checkEmailExist($email)) {
                $errors['emailExist'] = 'This email is already exists';
            }
            if(!User::checkPassword($password)) {
                $errors['password'] = 'Password must be longer than 6 symbols';
            }

            if(empty($errors))  {
                User::register($name, $lastName, $email, $password);
                header("Location: /login");
            }
        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        if(isset($_POST['email']))  {
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));

            $errors = array();
            if(User::checkUserExist($email, $password)) {
                header("Location: /");
            }   else    {
                $errors['incorrect'] = 'Invalid email / password';
            }
        }

        require_once(ROOT.'/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {

        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['role']);

        header("Location: /");

        return true;
    }

    public function actionArticle()
    {
        if(isset($_POST['submit']))
        {
            $title = htmlspecialchars(trim($_POST['title']));
            $author = htmlspecialchars(trim($_POST['author']));
            $text = htmlspecialchars(trim($_POST['text']));
            $category = htmlspecialchars(trim($_POST['category']));

            $id = Articles::addArticle($title,$author, $text, $category, $_POST['status']);

            if($id) {
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/assets/images/article/{$id}.jpg");
                }
            }
            header("Location: /");
        }

        require_once(ROOT.'/views/user/article.php');

        return true;
    }

}

?>
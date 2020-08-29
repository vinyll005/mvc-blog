<?php

class User
{

    public static function register($name, $lastName, $email, $password)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("INSERT INTO users (name, lastname, email, password) VALUES (?, ?, ?, ?)");
        $request->bind_param('ssss', $name, $lastName, $email, $password);

        return $request->execute();
    }

    public static function checkName($name)
    {
        $name = htmlspecialchars(trim($name));

        if(strlen($name) >= 3)  {
            return true;
        }
        return false;
    }

    public static function checkLastname($lastName)
    {
        $lastName = htmlspecialchars(trim($lastName));

        if(strlen($lastName) >= 3)  {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        $email = htmlspecialchars(trim($email));

        if(filter_var($email, FILTER_VALIDATE_EMAIL))  {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        $password = htmlspecialchars(trim($password));

        if(strlen($password) >= 6)  {
            return true;
        }
        return false;
    }

    public static function checkEmailExist($email)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("SELECT * FROM users WHERE email = ?");
        $request->bind_param('s', $email);
        $request->execute();
        $result = $request->get_result();

        if($result->fetch_assoc()) {
            return true;
        }
        return false;
    }

    public static function checkUserExist($email, $password)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $request->bind_param('ss', $email, $password);
        $request->execute();

        $result = $request->get_result();
        $row = $result->fetch_assoc();
        if(!empty($row))  {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['last_name'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            return true;
        }
        return false;
    }

}
?>
<?php

require_once "Model.php";

class Users extends Model
{
    private $id, $full_name, $email, $phone, $role_name;


    public function login(
        $email,
        $password
    ) {
        $user = "SELECT users.id, full_name, email, phone, role_name FROM users JOIN user_role ON user_role.user_id=users.id JOIN roles ON user_role.role_id=roles.id WHERE users.email='$email'";

        $connect = $this->connect();
        $query = $connect->query($user);

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'Users');

        if (count($data) == 0) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['ERROR'] = "Register failed";
            header('Location: /auth');
            return;
        }

        echo count($data);
    }

    public function register(
        $full_name,
        $email,
        $phone,
        $password
    ) {
        try {
            $hashed_password = password_hash("$password", PASSWORD_DEFAULT);
            $query = $this->connect();
            $data = "INSERT INTO users (full_name, email, password, phone) 
            VALUES ('$full_name', '$email', '$hashed_password', '$phone')";

            $query->exec($data);

            session_start();
            $_SESSION['SUCCESS'] = "Register Success!";
            header('Location: /auth');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

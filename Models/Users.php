<?php

require_once "Model.php";

class Users extends Model
{
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
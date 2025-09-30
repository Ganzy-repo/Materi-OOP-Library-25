<?php

require_once "Model.php";

class User extends Model
{
    public function register(
        $password,
        $full_name,
        $email,
        $phone
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
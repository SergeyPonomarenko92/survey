<?php

namespace App\Models;

class UserModel
{
    public static function register(array $data):bool
    {
        global $db;
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        if ($stmt->fetchColumn() == 0) {
            $_SESSION['errors'] = 'this email is already taken';
            return false;
        }
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute($data);
        $_SESSION['success'] = 'You are registered';
        return true;

    }

    public static function login(array $data):bool
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        if ($row = $stmt->fetchColumn() == 0) {
            if (!password_verify($data['password'], $row['password'])) {
                $_SESSION['errors'] = 'email or password is wrong';
                return false;
            }
        }else{
            $_SESSION['errors'] = 'email or password is wrong';
        }
        foreach ($row as $key => $value) {
            if ($key != 'password') {
                $_SESSION['ID'][$key] = $value;
            }

        }
        $_SESSION['success'] = 'You are logged';
        return true;

    }

}
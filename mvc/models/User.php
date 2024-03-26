<?php
namespace App\Models;
use App\Models\CRUD;

class User extends CRUD{
    protected $table = "stampee_user";
    protected $primaryKey = "id";
    protected $fillable = ['user_name', 'email', 'password', 'id_privilege'];

    public function hashPassword($password, $cost = 10)
    {
        return  password_hash($password, PASSWORD_BCRYPT, ['cost' => $cost]);
    }

    public function checkUser($username, $password)
    {
        $user = $this->unique('email', $username);
        
        echo $user['password'];
        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['privilege_id'] = $user['privilege_id'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}


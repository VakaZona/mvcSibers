<?php

namespace App\Models;

use PDO;
use Core\Errors;

class User extends \Core\Model
{
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM users ORDER BY id');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function addUser( $username, $password, $aboutUser)
    {
        try {
            $db = static::getDB();
            $db->exec("INSERT INTO users (`username`, `password`, `about_user`) VALUES ('$username', '$password', '$aboutUser')");
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }
    public static function deleteUser($id)
    {
        try {
            $db = static::getDB();
            $db->exec("DELETE FROM users WHERE id='$id'");
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function updateUser($id, $username, $password, $about_user)
    {

        try {
            $db = static::getDB();
            $db->exec("UPDATE users SET username='$username', password='$password', about_user='$about_user' WHERE users.id='$id'");
            $stmt = $db->query("SELECT * FROM users WHERE id='$id'");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }
    public static function getOneUser($id)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM users WHERE id='$id'");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function checkLoginUser($username, $password)
    {
        $db = static::getDB();
        $sql = "SELECT * FROM users WHERE username=?";
        $query = $db->prepare($sql);
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])){
            return $user;
        } else {
            return 0;
        }
    }

}
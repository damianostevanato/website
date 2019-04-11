<?php

require_once './includes/control/Database.php';

class Query
{

    public static function selectProvince()
    {
        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT nome FROM province");
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
            return $result;
        } else {
            return $stmt->errorCode();
        }
    }

    public static function selectComuniByProvincia($provincia)
    {
        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT comune FROM comuni WHERE provincia=:provincia");
        $stmt->bindValue(":provincia", $provincia);
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
            return $result;
        } else {
            return $stmt->errorCode();
        }
    }

    public static function nomeInUso($username)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT user FROM users WHERE user LIKE :nome");
        $stmt->bindValue(':nome', $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function registraUtente($user)
    {
        //echo $user->getData();
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO users(id,user,password,provincia,comune,nome,cognome,data,sesso,email) VALUES (:id,:user,:password,:provincia,:comune,:nome,:cognome,:data,:sesso,:email)");
        $stmt->bindValue(':id', $user->getID());
        $stmt->bindValue(':user', $user->getNomeUtente());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':provincia', $user->getProvincia());
        $stmt->bindValue(':comune', $user->getComune());
        $stmt->bindValue(':nome', $user->getNome());
        $stmt->bindValue(':cognome', $user->getCognome());
        $stmt->bindValue(':data', $user->getData());
        $stmt->bindValue(':sesso', $user->getSesso());
        $stmt->bindValue(':email', $user->getEmail());

        if ($stmt->execute()) {
            return true;
        } else {
            return $stmt->errorCode();
        }
    }

    public static function loginUtente($user)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT id FROM users WHERE user LIKE :user AND password LIKE :password");
        $stmt->bindValue(':user', $user->getNomeUtente());
        $stmt->bindValue(':password', $user->getPassword());

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                return $row['id'];
            }
        } else {
            return $stmt->errorCode();
        }
    }

    public static function getLastID()
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT MAX(id) AS max_id FROM users");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {

                return $row['max_id'];
            }
        } else {
            return false;
        }
    }


}
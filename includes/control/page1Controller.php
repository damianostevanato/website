<?php

require_once './includes/model/Query.php';
require_once './includes/model/Utente.php';

class page1Controller
{
    public function make()
    {
        include './includes/view/page1.php';
    }

    public function getProvince()
    {
        $query = new Query();
        $result = $query::selectProvince();
        exit(json_encode($result));
    }

    public function getComuni()
    {
        $query = new Query();
        if (isset($_GET['provincia'])) {
            $result = $query::selectComuniByProvincia($_GET['provincia']);
            exit(json_encode($result));
        }

    }

    public function controlloNome()
    {
        $query = new Query();
        if (isset($_GET['nome'])) {
            $result = $query::nomeInUso($_GET['nome']);
            exit(json_encode($result));
        }
    }

    public function registraUtente()
    {

        if ($_POST['nomer'] != "" && $_POST['cognomer'] != "" && $_POST['nomeutenter'] != "" && $_POST['emailr'] != "" && $_POST['passwordr'] != "" && $_POST['datepicker'] != "" && $_POST['sesso'] != "") {

            $nome = urldecode($_POST['nomer']);
            $cognome = urldecode($_POST['cognomer']);
            $nomeutente = urldecode($_POST['nomeutenter']);
            $email = urldecode($_POST['emailr']);
            $provincia = urldecode($_POST['provincer']);
            $comune = urldecode($_POST['comunir']);
            $password = urldecode($_POST['passwordr']);
            $data = urldecode($_POST['datepicker']);
            $sesso = urldecode($_POST['sesso']);


            $user = new Utente($nome, $cognome, $nomeutente, $email, $provincia, $comune, $password, $data, $sesso);
            $query = new Query();
            if ($query->registraUtente($user)) {
                //$user = new Utente(null, null, $nomeutente, null, null, null, $password, null, null);
                $id_utente = $query->loginUtente($user);
                session_start();
                $_SESSION['id_utente'] = $id_utente;
                // header("location: index.php?controller=page1Controller&action=make");
            }
        }
    }


}
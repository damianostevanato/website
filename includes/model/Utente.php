<?php


require_once './includes/model/Query.php';

class Utente
{
    private $id = 0;
    private $ruolo;
    private $nome;
    private $cognome;
    private $nomeutente;
    private $email;
    private $provincia;
    private $comune;
    private $password;
    private $data;
    private $sesso;


    public function __construct($nome, $cognome, $nomeutente, $email, $provincia, $comune, $password, $data, $sesso)
    {
        $query = new Query();
        if ($query->getLastID() === null) {
            $this->id = 0;
        } else {
            $this->id = ($query->getLastID()) + 1;
        }
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->nomeutente = $nomeutente;
        $this->email = $email;
        $this->provincia = $provincia;
        $this->comune = $comune;
        $this->password = $password;
        $this->data = $data;
        $this->sesso = $sesso;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function getNomeUtente()
    {
        return $this->nomeutente;
    }

    public function setNomeUtente($nomeutente)
    {
        $this->nomeutente = $nomeutente;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    public function getComune()
    {
        return $this->comune;
    }

    public function setComune($comune)
    {
        $this->comune = $comune;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getSesso()
    {
        return $this->sesso;
    }

    public function setSesso($sesso)
    {
        $this->sesso = $sesso;
    }
}
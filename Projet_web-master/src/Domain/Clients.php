<?php

namespace Projet_web\Domain;

class Clients
{
    /**
     *  idClient
     *
     * @var integer
     */
    private $id;

    /**
     *  nomClient
     *
     * @var string
     */
    private $nom;

    /**
     *  prenomClient
     *
     * @var string
     */
    private $prenom;

    /**
     *  mailClient
     *
     * @var string
     */
    private $mail;

    /**
     *  telephoneClient
     *
     * @var string
     */
    private $telephone;

    /**
     *  adresseClient
     *
     * @var string
     */
    private $adresse;

    /**
     *  codePostalClient
     *
     * @var string
     */
    private $codePostal;

    /**
     *  villeClient
     *
     * @var string
     */
    private $ville;

    

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }
}
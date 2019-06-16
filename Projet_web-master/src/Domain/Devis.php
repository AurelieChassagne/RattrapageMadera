<?php

namespace Projet_web\Domain;

class Devis
{
    /**
     *  idDevis
     *
     * @var integer
     */
    private $id;

    /**
     *  nomDevis
     *
     * @var string
     */
    private $nomDevis;

    /**
     *  adresseDevis
     *
     * @var string
     */
    private $adresseDevis;

    /**
     *  codePostalDevis
     *
     * @var string
     */
    private $codePostalDevis;

    /**
     *  villeDevis
     *
     * @var string
     */
    private $villeDevis;

    /**
     *  mailDevis
     *
     * @var string
     */
    private $mailDevis;

    /**
     *  nomClient
     *
     * @var string
     */
    private $nomClient;

    /**
     *  prenomClient
     *
     * @var string
     */
    private $prenomClient;

    /**
     *  adresseClient
     *
     * @var string
     */
    private $adresseClient;

    /**
     *  codePostalClient
     *
     * @var string
     */
    private $codePostalClient;

    /**
     *  villeClient
     *
     * @var string
     */
    private $villeClient;

    /**
     *  nomMateriaux
     *
     * @var string
     */
    private $nomMateriaux;

    /**
     *  uniteMateriaux
     *
     * @var int
     */
    private $uniteMateriaux;

    /**
     *  prixMateriaux
     *
     * @var int
     */
    private $prixMateriaux;

    /**
     *  totalHTDevis
     *
     * @var int
     */
    private $totalHTDevis;

    /**
     *  TVADevis
     *
     * @var dooble
     */
    private $TVADevis;

    /**
     *  totalTTCDevis
     *
     * @var double
     */
    private $totalTTCDevis;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNomDevis() {
        return $this->nomDevis;
    }

    public function setNomDevis($nomDevis) {
        $this->nomDevis = $nomDevis;
    }

    public function getAdresseDevis() {
        return $this->adresseDevis;
    }

    public function setAdresseDevis($adresseDevis) {
        $this->adresseDevis = $adresseDevis;
    }

    public function getCodePostalDevis() {
        return $this->codePostalDevis;
    }

    public function setCodePostalDevis($codePostalDevis) {
        $this->codePostalDevis = $codePostalDevis;
    }

    public function getVilleDevis() {
        return $this->villeDevis;
    }

    public function setVilleDevis($villeDevis) {
        $this->villeDevis = $villeDevis;
    }

    public function getMailDevis() {
        return $this->mailDevis;
    }

    public function setMailDevis($mailDevis) {
        $this->mailDevis = $mailDevis;
    }

    public function getNomClient() {
        return $this->nomClient;
    }

    public function setNomClient($nomClient) {
        $this->nomClient = $nomClient;
    }

    public function getPrenomClient() {
        return $this->prenomClient;
    }

    public function setPrenomClient($prenomClient) {
        $this->prenomClient = $prenomClient;
    }

    public function getAdresseClient() {
        return $this->adresseClient;
    }

    public function setAdresseClient($adresseClient) {
        $this->adresseClient = $adresseClient;
    }

    public function getCodePostalClient() {
        return $this->codePostalClient;
    }

    public function setCodePostalClient($codePostalClient) {
        $this->codePostalClient = $codePostalClient;
    }

    public function getVilleClient() {
        return $this->villeClient;
    }

    public function setVilleClient($villeClient) {
        $this->villeClient = $villeClient;
    }

    public function getNomMateriaux() {
        return $this->nomMateriaux;
    }

    public function setNomMateriaux($nomMateriaux) {
        $this->nomMateriaux = $nomMateriaux;
    }

    public function getUniteMateriaux() {
        return $this->uniteMateriaux;
    }

    public function setUniteMateriaux($uniteMateriaux) {
        $this->uniteMateriaux = $uniteMateriaux;
    }

    public function getPrixMateriaux() {
        return $this->prixMateriaux;
    }

    public function setPrixMateriaux($prixMateriaux) {
        $this->prixMateriaux = $prixMateriaux;
    }

    public function getTotalHTDevis() {
        return $this->totalHTDevis;
    }

    public function setTotalHTDevis($totalHTDevis) {
        $this->totalHTDevis = $totalHTDevis;
    }

    public function getTVADevis() {
        return $this->TVADevis;
    }

    public function setTVADevis($TVADevis) {
        $this->TVADevis = $TVADevis;
    }

    public function getTotalTTCDevis() {
        return $this->totalTTCDevis;
    }

    public function setTotalTTCDevis($totalTTCDevis) {
        $this->totalTTCDevis = $totalTTCDevis;
    }
}
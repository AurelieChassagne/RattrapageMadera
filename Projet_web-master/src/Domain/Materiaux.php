<?php

namespace Projet_web\Domain;

class Materiaux 
{
    /**
     * Materiaux idMateriaux.
     *
     * @var integer
     */
    private $id;

    /**
     * Materiaux nomMateriaux.
     *
     * @var string
     */
    private $nom;

    /**
     * Materiaux typeMateriaux.
     *
     * @var string
     */
    private $type;

    /**
     * Materiaux uniteMateriaux.
     *
     * @var integer
     */
    private $unite;

    /**
     * Materiaux prixHTMateriaux.
     *
     * @var integer
     */
    private $prixHT;


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

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getUnite() {
        return $this->unite;
    }

    public function setUnite($unite) {
        $this->unite = $unite;
    }

    public function getPrixHT() {
        return $this->prixHT;
    }

    public function setPrixHT($prixHT) {
        $this->prixHT = $prixHT;
    }
}
<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Materiaux;

class MateriauxDAO extends DAO
{
    public function findAll() {
        $sql = "select * from materiaux order by idMateriaux desc";
        $result = $this->getDb()->fetchAll($sql);
        $materiaux = array();
        foreach ($result as $row) {
            $materiauxId = $row['idMateriaux'];
            $materiaux[$materiauxId] = $this->buildDomainObject($row);
        }
        return $materiaux;
    }
    
    public function find($id) {
        $sql = "select * from materiaux where idMateriaux=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)   
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de mat&riel pour cette référence " . $id);
    }
    
    public function save(Materiaux $materiel) {
        
        $materielData = array(
            'nomMateriaux'=> $materiel->getNom(),
            'typeMateriaux'=> $materiel->getType(),
            'uniteMateriaux'=> $materiel->getUnite(),
            'prixHTMateriaux'=> $materiel->getPrixHT()
            );
        
        if ($materiel->getId()) {
            $this->getDb()->update('materiaux', $materielData, array('idMateriaux' => $materiel->getId()));
        } else {
            $this->getDb()->insert('materiaux', $materielData);
            $id = $this->getDb()->lastInsertId();
            $materiel->setId($id);
        }
    }

    public function delete($id) {
        $this->getDb()->delete('materiaux', array('idMateriaux' => $id));;
    }
    
    protected function buildDomainObject($row) {
        $materiel = new Materiaux();
        $materiel->setId($row['idMateriaux']);
        $materiel->setNom($row['nomMateriaux']);
        $materiel->setType($row['typeMateriaux']);
        $materiel->setUnite($row['uniteMateriaux']);
        $materiel->setPrixHT($row['prixHTMateriaux']);
        return $materiel;
    }
}
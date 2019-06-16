<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Devis;

class DevisDAO extends DAO
{
    public function findAll() {
        $sql = "select * from devis order by idDevis desc";
        $result = $this->getDb()->fetchAll($sql);
        $devis = array();
        foreach ($result as $row) {
            $devisId = $row['idDevis'];
            $devis[$devisId] = $this->buildDomainObject($row);
        }
        return $devis;
    }
    
    public function find($id) {
        $sql = "select * from devis where idDevis=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)   
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de devis pour cette référence " . $id);
    }
    
    public function save(Devis $devis) {
        
        $deviData = array(
            'nomDevis'=> $devis->getNomDevis(),
            'adresseDevis'=> $devis->getAdresseDevis(),
            'codePostalDevis'=> $devis->getCodePostalDevis(),
            'villeDevis'=> $devis->getVilleDevis(),
            'mailDevis'=> $devis->getMailDevis(),
            'nomClient'=> $devis->getNomClient(),
            'prenomClient'=> $devis->getPrenomClient(),
            'adresseClient'=> $devis->getAdresseClient(),
            'codePostalClient'=> $devis->getCodePostalClient(),
            'villeClient'=>$devis->getVilleClient(),
            'nomMateriaux'=> $devis->getNomMateriaux(),
            'uniteMateriaux'=> $devis->getUniteMateriaux(),
            'prixMateriaux'=> $devis->getPrixMateriaux(),
            'totalHTDevis'=> $devis->getUniteMateriaux() * $devis->getPrixMateriaux(),
            'TVADevis'=> $devis->getTotalHTDevis() * 10 / 100,
            'totalTTCDevis'=> $devis->getTotalHTDevis() + $devis->getTVADevis()
            );

        print_r($deviData);
        
        if ($devis->getId()) {
            
            $this->getDb()->update('devis', $deviData, array('idDevis' => $devis->getId()));
        } else {
            
            $this->getDb()->insert('devis', $deviData);
            $id = $this->getDb()->lastInsertId();
            $devis->setId($id);
        }
    }

    public function delete($id) {
        $this->getDb()->delete('devis', array('idDevis' => $id));;
    }
    
    protected function buildDomainObject($row) {
        $devi = new Devis();
        $devi->setId($row['idDevis']);
        $devi->setNomDevis($row['nomDevis']);
        $devi->setAdresseDevis($row['adresseDevis']);
        $devi->setCodePostalDevis($row['codePostalDevis']);
        $devi->setVilleDevis($row['villeDevis']);
        $devi->setMailDevis($row['mailDevis']);
        $devi->setNomClient($row['nomClient']);        
        $devi->setPrenomClient($row['prenomClient']);
        $devi->setAdresseClient($row['adresseClient']);        
        $devi->setCodePostalClient($row['prenomClient']);        
        $devi->setVilleClient($row['villeClient']);        
        $devi->setNomMateriaux($row['nomMateriaux']);        
        $devi->setUniteMateriaux($row['uniteMateriaux']);        
        $devi->setPrixMateriaux($row['prixMateriaux']);              
        $devi->setTotalHTDevis($row['totalHTDevis']);              
        $devi->setTVADevis($row['TVADevis']);              
        $devi->setTotalTTCDevis($row['totalTTCDevis']);
        return $devi;
    }
}
<?php

namespace Projet_web\DAO;

use Projet_web\Domain\Clients;

class ClientsDAO extends DAO
{
    /**
     * Retourne une liste de l'ensemble des clients de la table clients
     * 
     * @return array une liste de tous les clients.
     */
    public function findAll(){
        $sql = "select * from clients order by idClient desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convertir les résultats query en un array d'objets
        $clients = array();
        foreach ($result as $row) {
            $clientId = $row['idClient'];
            $clients[$clientId] = $this->buildDomainObject($row);
        }
        return $clients;
    }

    /**
     * Retourne un client en fonction de l'id
     * 
     * @param integer $id la référence d'un client.
     * 
     * @return \Projet_web\Domain\client
     */
    public function find($id) {
        $sql = "select * from clients where idClient=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)   
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Pas de client pour cette reference " . $id);
    }

    /**
     *Enregistrer un client dans la base de données
     */
    public function save(Clients $client){
        $clientData = array(
            'nomClient'=> $client->getNom(),
            'prenomClient' => $client->getPrenom(),
            'mailClient' => $client->getMail(),
            'telephoneClient' => $client->getTelephone(),
            'adresseClient' => $client->getAdresse(),
            'codePostalClient' => $client->getCodePostal(),
            'villeClient' => $client->getVille()
        );
        if ($client->getId()){
            $this->getDb()->update('clients', $clientData, array('idClient' => $client->getId()));
        } else {
            $this->getDb()->insert('clients', $clientData);
            $idClient = $this->getDb()->lastInsertId();
            $client->setId($idClient);
        }
    }
    
    /**
     *Supprimer un client dans la base de données
     */
    public function delete($idClient){
        $this->getDb()->delete('clients', array('idClient' => $idClient));
    }

    protected function buildDomainObject($row){
        $client = new Clients();
        $client->setId($row['idClient']);
        $client->setNom($row['nomClient']);
        $client->setPrenom($row['prenomClient']);
        $client->setMail($row['mailClient']);
        $client->setTelephone($row['telephoneClient']);
        $client->setAdresse($row['adresseClient']);
        $client->setCodePostal($row['codePostalClient']);
        $client->setVille($row['villeClient']);
        return $client;
    }
}
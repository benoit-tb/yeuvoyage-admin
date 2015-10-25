<?php

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;

class AService {
    
    // Entity manager
    protected $entityManager;
    
    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager) {
        $this->entityManager = $entityManager;   
    }
    
   /**
    * 
    * @param unknown $allFields
    * @param unknown $fieldsToDisplay
    * @return string|unknown
    */
    public function buildSelect($allFields, $fieldsToDisplay = array()){
        $fields = array();
        if(count($fieldsToDisplay) > 0){
            $fields = array_intersect_key($allFields, $fieldsToDisplay);
        } else {
            $fields = $allFields;
        }
        $select = "SELECT " . implode(', ', array_map(function ($v, $k) { return $v . ' AS ' . $k; }, $fields, array_keys($fields)));
        return $select;
    }
    
    
     public function groupQuery($groupByFields, $fieldsToDisplay = array()){
        $groupedColumns = array();
        if(count($fieldsToDisplay) > 0){
            $groupedColumns = array_intersect_key($groupByFields, $fieldsToDisplay);
        } else {
            $groupedColumns = $groupByFields;
        }
        
        if (count($groupedColumns)) {
            $grouping = " GROUP BY " . implode(", ", $groupedColumns);
        }
        return $grouping;
    }
    
    /**
     * 
     * @param string $query la requete à exécuter
     * @param array $bindValues les valeurs à "binder"
     * @param string $limit la limite d'éxecution de la requete
     * @return array les résultats de la requete
     */
    public function executeQuery($query, $bindValues = array(), $limit = null){
        
        $connection = $this->entityManager->getConnection ();
        
        if (!is_null($limit)){
            $query .= " LIMIT $limit";
        }

        $statement = $connection->prepare ( $query );
        
        //Bind values
        if (count($bindValues)> 0){
            $dataType = \PDO::PARAM_STR;
            foreach ($bindValues as $key => $bindValue){
                if(is_array($bindValue)){
                    $dataType = $bindValue['data_type'];
                    $bindValue = $bindValue['value'];
                }
                $statement->bindValue($key, $bindValue, $dataType);
            }
        }
        
        $statement->execute ();
        $results = $statement->fetchAll ();
        
        return $results;
    }
    
    /**
     * Execute une requete de mise à jour.
     * 
     * @param string $query la requete SQL de MAJ
     * @param array $bindValues un tableau des valeurs à binder
     * @return int $count le nombre de lignes mises à jour
     */
    public function executeUpdate($query, $bindValues = array()){
        
        $connection = $this->entityManager->getConnection ();
        $count = $connection->executeUpdate ($query, $bindValues);

        return $count;
    }
    
    /**
     * Execute une requete d'insertion
     *
     * @param string $query la requete SQL d'insertion
     * @param array $bindValues un tableau des valeurs à binder
     * @return int $count le nombre de lignes insérées
     */
    public function executeInsert($query, $bindValues = array()){
        
        $connection = $this->entityManager->getConnection ();
        $count = $connection->executeUpdate ($query, $bindValues);

        return $count;
    }
    
    /**
     * 
     * @param unknown $query
     * @param unknown $bindValues
     * @return unknown
     */
    public function executeDelete($query, $bindValues = array()){
        
        $connection = $this->entityManager->getConnection ();
        $count = $connection->delete ($query, $bindValues);

        return $count;
    }
    
    /**
     * 
     * @param unknown $query
     * @param unknown $bindValues
     * @return Ambigous <NULL, unknown>
     */
    public function getOneResult($query, $bindValues = array()){
        $result = null;
        $results = $this->executeQuery($query, $bindValues);
        
        if(count($results) > 0){
            $result = $results[0];
        }
        
        return $result;
    }

    /**
     * @param $query
     * @param array $bindValues
     * @return mixed
     */
    public function getFetchColumn($query, $bindValues = array()){
        $connection = $this->entityManager->getConnection ();
        return $connection->fetchColumn($query, $bindValues);
    }

    /**
     * @param $query
     * @param array $bindValues
     * @return mixed
     */
    public function getFetchArray($query, $bindValues = array()){
        $connection = $this->entityManager->getConnection ();
        return $connection->fetchArray($query, $bindValues);
    }

    /**
     * @param $query
     * @param array $bindValues
     */
    public function query($query, $bindValues = array()){
        $connection = $this->entityManager->getConnection ();
        return $connection->query($query);
    }
}
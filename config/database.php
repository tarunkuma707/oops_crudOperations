<?php
class Database{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect(){
        $this->servername   =   "localhost";
        $this->username     =   "root";
        $this->password     =   "";
        $this->dbname       =   "php_opp";

        $conn   =   new \MySQLi(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );
        return $conn;
    }
}

# Class to run SQl Queries
Class Query extends Database{
    ### Function to get all Data ###
    public function getData($tablename,$fields){
        $sql    =   "SELECT $fields FROM $tablename";
        $result =   $this->connect()->query($sql);
        return $result;
    }

    public function insertData($tablename, $param){
        if(!empty($param)){
            $fields =   array();
            $value  =   array();
            foreach($param as $key=>$values){
                $fields[]   =   $key;
                $value[]    =   $values;     
            }
            $fields =   implode(",",$fields);
            $value  =   implode("','",$value);
            $value  =   "'".$value."'";
           
        }
        $sql    =   "INSERT INTO $tablename ($fields) VALUES ($value)";
        $result =   $this->connect()->query($sql);
        return $result;
    }

    public function deleteData($tablename,$fieldName,$id){
        
        $sql    =   "DELETE FROM $tablename WHERE $fieldName =$id";
        $result =   $this->connect()->query($sql);
        return $result;
    }

    #### Function to get specific data by id #####
    public function getDatabyId($tablename,$fields,$whereField,$id){
        echo $sql    =   "SELECT $fields FROM $tablename WHERE $whereField =$id";
        $result =   $this->connect()->query($sql);
        return $result;   
    }

    ##### Update Data #########
    public function UpdateData($tablename, $param,$fieldName,$id){
        if(!empty($param)){
            $sql    =   "UPDATE $tablename SET";
            $condition  =   "";
            foreach($param as $key=>$values){
                $condition .= " $key ='$values',";     
            }
            $newCondition = rtrim($condition,",");
            $sql .=" $newCondition WHERE $fieldName =$id"; 
           
        }
        $result =   $this->connect()->query($sql);
        return $result;
    }
}


?>
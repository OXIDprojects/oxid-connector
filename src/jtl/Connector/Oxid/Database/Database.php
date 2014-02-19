<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 */
/**
 * Description of Database
 *
 * @access public
 * @author Michele Berger <michele.berger@jtl-software.com>
 */

namespace jtl\Connector\Oxid\Database;

use \jtl\Connector\Oxid\Config\Loader As ConfigLoader;

require_once "/../Config/Loader/Config.php";

class Database {
        
    private $server;
    private $user;
    private $password;
    private $database;
    
    //Server
    public function setServer($server) {
        $this->server = $server;
    }

    public function getServer() {
        return $this->server;
    }

    //User
    public function setUser($user) {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

    //Password
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    //Database
    public function setDatabase($database) {
        $this->database = $database;
    }

    public function getDatabase() {
        return $this->database;
    }
    
    /**
     * SQL-Statement an die Oxid-Datenbank Senden
     * @param type $query (SQL-Statement)
     * @return type
     */
    public function oxidStatement($query) {
        $OxidConf = new ConfigLoader\Config;
        $OxidConf->getConfigs();
        
        //Variablen Deklaration
        $this->setServer($OxidConf->getDbHost());
        $this->setUser($OxidConf->getDbUser());
        $this->setPassword($OxidConf->getDbPwd());
        $this->setDatabase($OxidConf->getDbName());
       
        //Verbindung zur Datenbank aufbauen
        $mysqli = new \mysqli($this->server, $this->user, $this->password, $this->database);
        if ($mysqli->connect_error) {
            echo "Fehler bei der Verbindung: " . mysqli_connect_error();
            exit();
        }

        //Abfrage ausführen
        $rs = $mysqli->query($query);

        //Fehler ausgabe
        if (!$rs) {
            echo "Der folgende Fehler ist aufgetreten: <strong>" . $mysqli->error
            . ".</strong><br />\n Die Fehlernummer: " . $mysqli->error;
        }
        
        while ($zeile = $rs->fetch_array(MYSQLI_ASSOC)) {
            $Arr[] = $zeile;
        }

        //Schließen der Connection
        $rs->close();
        $mysqli->close();
        
        if (empty($Arr)){
            $Arr = false;   
        }
        
        return $Arr;
        
    }
    
    //Undefinierte Methoden aufrufe abfangen
    public function __call($name, $arguments) {
        if (!empty($arguments)){
            $ausgabe =  "Die Methode: " . $name .
                        " mit dem Parameter: " . $arguments .
                        " existiert nicht.";
        }else{
            $ausgabe =  "Die Methode: " . $name .
                        " existiert nicht.";
        }      
        echo $ausgabe;
    }
    
    //Undefinierte Eigenschaft aufrufe abfangen
    public function __get($name) {
        echo "Die Eigenschaft: " . $name . " existiert nicht.";
    }
}


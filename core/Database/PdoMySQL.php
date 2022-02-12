<?php      

namespace Database;

class PdoMySQL{


    /**
     * Retourne un objet PDO pour agir sur la BDD
     * 
     * @return  \PDO
     * 
     */
    public static function getPdo():\PDO{

        $pdo = new \PDO("mysql:host=localhost;dbname=bistrot;charset=utf8", "admin_bistrot","69Frederique69", [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
    ]);

    return $pdo;
    }


}







?>
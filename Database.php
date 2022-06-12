<?php 
namespace OTPAPP;

use PDO;

/**
 * Database class
 */
class Database 
{
    private $_host = "localhost";
    private $_database_name = "core_php_project_otp_tester";
    private $_database_username = "root";
    private $_database_password = "";

    private $_pdo_object;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $dsn = "mysql:host=$this->_host;dbname=$this->_database_name";
        $this->_pdo_object = new PDO($dsn, $this->_database_username, $this->_database_password);
    }

    /**
     * Check OTP exist or not
     */
    public function check_otp_exist_or_not($otp)
    {
        $sql = "SELECT otp WHERE otp='.$otp.'";
        $statement = $this->_pdo_object->query($sql);
        
        $otp_found = false;
        
        if ($statement->rowCount() > 0)
            $otp_found = true;
        
        return $otp_found;
    }
}

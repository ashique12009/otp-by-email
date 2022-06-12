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

    private $_pdo_connection_object;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $dsn = "mysql:host=$this->_host;dbname=$this->_database_name";
        $this->_pdo_connection_object = new PDO($dsn, $this->_database_username, $this->_database_password);
        $this->_pdo_connection_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_pdo_connection_object->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    /**
     * Check user email exist or not
     */
    public function check_email_exists_or_not($email)
    {
        try {
            $sql = "SELECT email FROM user WHERE email='$email'";
            $statement = $this->_pdo_connection_object->query($sql);
            
            $email_found = false;
            
            if ($statement->rowCount() > 0)
                $email_found = true;
            
            return $email_found;
        } 
        catch(Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }

    /**
     * Check OTP exists or not
     */
    public function check_otp_exists_or_not($otp)
    {
        try {
            $sql = "SELECT otp FROM otp WHERE otp=$otp";
            $statement = $this->_pdo_connection_object->query($sql);
            
            $otp_found = false;
            
            if ($statement->rowCount() > 0)
                $otp_found = true;
            
            return $otp_found;
        } 
        catch(Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }
    
    /**
     * Check OTP exist or not
     */
    public function is_otp_expired($otp)
    {
        try {
            $sql = "SELECT otp FROM otp WHERE otp=$otp AND is_expired=1";
            $statement = $this->_pdo_connection_object->query($sql);
            
            $otp_found = false;
            
            if ($statement->rowCount() > 0)
                $otp_found = true;
            
            return $otp_found;
        } 
        catch(Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }

    /**
     * Insert otp
     */
    public function insert_otp($otp)
    {
        try {
            $sql = "INSERT INTO otp (otp)
                VALUES (?)";

            return $this->_pdo_connection_object->prepare($sql)->execute([$otp]);
        } 
        catch(Exception $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }
}

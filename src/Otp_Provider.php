<?php 
namespace OTPAPP;

use OTPAPP\Database;

/**
 * OTP provider class
 */
class Otp_Provider
{
    /**
     * Get random OTP, also check generated random OTP is not in DB
     */
    public function get_otp()
    {
        $otp = rand(1, 1000000);

        $db = new Database();

        $db->insert_otp($otp);
        
        return $otp;
    }
}

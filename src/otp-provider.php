<?php 
namespace OTPAPP;

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
        return rand(1, 100000);
    }
}

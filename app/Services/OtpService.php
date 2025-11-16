<?php

namespace App\Services;

class OtpService
{
    public function generateOtp($length = 6)
    {
        return str_pad(random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }

    public function verifyOtp($inputOtp, $storedOtp)
    {
        return $inputOtp === $storedOtp;
    }

    public function isOtpExpired($expiresAt)
    {
        return now()->gt($expiresAt);
    }
}
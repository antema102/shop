<?php

function codeGenerate($length = 13){
    $length = (int)$length;
    if ($length <= 0)
        return false;

    $str = '0123456789';
    $bytes = getBytes($length);
    $position = 0;
    $result = '';
    for ($i = 0; $i < $length; $i++)
    {
        $position = ($position + ord($bytes[$i])) % strlen($str);
        $result .= $str[$position];
    }

    return $result;
}


/**
 * @param $length
 * @return bool|string
 */

function getBytes($length){
    $length = (int)$length;
    if ($length <= 0)
        return false;

    if (function_exists('openssl_random_pseudo_bytes'))
    {
        $bytes = openssl_random_pseudo_bytes($length, $crypto_strong);
        if ($crypto_strong === true)
            return $bytes;
    }

    if (function_exists('mcrypt_create_iv'))
    {
        $bytes = mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
        if ($bytes !== false && strlen($bytes) === $length)
            return $bytes;

    }

    // Else try to get $length bytes of entropy
    $result         = '';
    $entropy        = '';
    $msec_per_round = 400;
    $bits_per_round = 2;
    $total          = $length;
    $hash_length    = 20;

    while (strlen($result) < $length)
    {
        $bytes  = ($total > $hash_length) ? $hash_length : $total;
        $total -= $bytes;

        for ($i=1; $i < 3; $i++)
        {
            $t1 = microtime(true);
            $seed = mt_rand();
            for ($j=1; $j < 50; $j++)
                $seed = sha1($seed);

            $t2 = microtime(true);
            $entropy .= $t1 . $t2;
        }

        $div = (int) (($t2 - $t1) * 1000000);
        if ($div <= 0)
            $div = 400;

        $rounds = (int) ($msec_per_round * 50 / $div);
        $iter = $bytes * (int) (ceil(8 / $bits_per_round));

        for ($i = 0; $i < $iter; $i ++)
        {
            $t1 = microtime();
            $seed = sha1(mt_rand());

            for ($j = 0; $j < $rounds; $j++)
                $seed = sha1($seed);

            $t2 = microtime();
            $entropy .= $t1 . $t2;
        }

        $result .= sha1($entropy, true);
    }

    return substr($result, 0, $length);
}

?>
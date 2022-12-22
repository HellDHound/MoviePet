<?php


class Captcha_Helper
{
    function checkCaptcha($post){
        $error = true;
        $secret = '6LfN95sjAAAAAEAWF_4eYmtQD3RP5H3yfP3MSBBq';

        if (!empty($post['g-recaptcha-response'])) {
            $curl = curl_init('https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, 'secret=' . $secret . '&response=' . $post['g-recaptcha-response']);
            $out = curl_exec($curl);
            curl_close($curl);

            $out = json_decode($out);
            if ($out->success == true) {
                $error = false;
            }
        }

        return $error;
    }
}
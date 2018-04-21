<?php

class Curl
{
    public $curl;

    public function __construct($base_url = null)
    {
        $this->curl = curl_init();
    }

    public function post($url, $data = array())
    {
        $data = json_encode($data);
        $ch = curl_init($url);
# Setup request to send json via POST.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Get data from https url
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
# Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function get($url, $headers){
        $ch = curl_init($url);
# Setup request to send json via POST.
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
# Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Get data from https url
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
# Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
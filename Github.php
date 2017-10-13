<?php

class GitHub {


    const URL = "https://api.github.com/users/Cverine";
    const URL2 = "https://api.github.com/users/Cverine/repos";

    public $curl;
    public $data;
    public $json;


    /**
     * @param $statement
     * @return mixed
     */
    public function get_info_user($statement)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        curl_setopt($curl, CURLOPT_USERAGENT,  'Mozilla/5.0 (Windows; U; Windows NT 6.1; fr; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer 5edea236d4c0517fe09107651b8d86219aa7ac36" ));
        curl_setopt($curl, CURLOPT_URL, $statement);
        $data = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($data, true);
        return $json;
    }


}
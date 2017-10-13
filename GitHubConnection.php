<?php

namespace Wilder;


class GitHubConnection
{
    const URL = 'https://api.github.com/users/PiReux';
    const URLREPOS = "https://api.github.com/users/PiReux/repos";

    public function setUrl($statement)
    {
        $ch = curl_init();

// configuration des options
        curl_setopt($ch, CURLOPT_URL, $statement);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer 564e5288d7cd734ff80a98fb99fa191655c6e74e"));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Unknown");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// exécution de la session
        $result = curl_exec($ch);
// fermeture des ressources
        curl_close($ch);
        return $result;
    }

    /**
     * @return mixed
     */
    public function jsonToArray($resultat)
    {
        $toArray = json_decode($resultat, true);
        return $toArray;
    }
}
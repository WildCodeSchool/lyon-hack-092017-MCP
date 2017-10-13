<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 12/10/17
 * Time: 20:16
 */

namespace Wilder;

class gitConnect
{
	private $userDarin = "https://api.github.com/users/mateevd";
	private $reposDarin = "https://api.github.com/users/mateevd/repos";
	private $followDarin = "https://api.github.com/users/mateevd/followers";
	private $gistsDarin = "https://api.github.com/users/mateevd/gists";

	public function setUrl($statement, $token)
	{
		$ch = curl_init();

// configuration des options
		curl_setopt($ch, CURLOPT_URL, $statement);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $token"));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// exécution de la session
		$result = curl_exec($ch);

// fermeture des ressources
		curl_close($ch);
		return $result;
	}

	/**
	 * @return string
	 */
	public function getUserDarin(): string
	{
		return $this->userDarin;
	}

	/**
	 * @return string
	 */
	public function getReposDarin(): string
	{
		return $this->reposDarin;
	}

	/**
	 * @return string
	 */
	public function getGistsDarin(): string
	{
		return $this->gistsDarin;
	}

	/**
	 * @return string
	 */
	public function getFollowDarin(): string
	{
		return $this->followDarin;
	}

	/**
	 * @return string
	 */
	public function getTokenDarin(): string
	{
		return $this->tokenDarin;
	}

	/**
	 * @return mixed
	 */
	public function getArray($result){
		$json = json_decode($result, true);
		return $json;
	}

}
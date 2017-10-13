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
	private $gistsDarin = "https://api.github.com/users/mateevd/gists";
	private $tokenDarin = "f0d78dd4f954f66e362ba3dc8da62ba4f70b62a2";

	private $userPierrick = "https://api.github.com/users/PiReux";
	private $reposPierrick = "https://api.github.com/users/PiReux/repos";
	private $gistsPierrick = "https://api.github.com/users/PiReux/gists";
	private $tokenPierrick = "8e6148ed88c56e874187d7f48170b69a80c9631d";

	/**
	 * CurlInit constructor.
	 */
	public function setUrl($statement, $token)
	{
		$ch = curl_init();

// configuration des options
		curl_setopt($ch, CURLOPT_URL, $statement);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "b1b85c8b34b68ff2f8d5");
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
	public function getTokenDarin(): string
	{
		return $this->tokenDarin;
	}

	/**
	 * @return string
	 */
	public function getUserPierrick(): string
	{
		return $this->userPierrick;
	}

	/**
	 * @return string
	 */
	public function getReposPierrick(): string
	{
		return $this->reposPierrick;
	}

	/**
	 * @return string
	 */
	public function getGistsPierrick(): string
	{
		return $this->gistsPierrick;
	}

	/**
	 * @return string
	 */
	public function getTokenPierrick(): string
	{
		return $this->tokenPierrick;
	}

	/**
	 * @return mixed
	 */
	public function getArray($result){
		$json = json_decode($result, true);
		return $json;
	}
}
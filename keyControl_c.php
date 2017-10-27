<?php

/**
 * Class keyControl
 */
class keyControl {

    /**
     * @var null
     */
    public $lastResponse = null;

    /**
     * @param $url
     * @param $action
     * @param $name
     * @return mixed|string
     */
    private function makeRequest ($url, $action, $name) {
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url . '?action=' . $action . '&name=' . $name);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

		$response = curl_exec($curl);
		if (!$response) {
			return 'Error!';
		}
		curl_close($curl);
		$this->lastResponse = $response;
		return $response;
	}

    /**
     * @param $url
     * @param $name
     * @return mixed|string
     */
    function addKey ($url, $name) {
		return $this->makeRequest($url, 'add', $name);
	}

    /**
     * @param $url
     * @param $name
     * @return mixed|string
     */
    function removeKey ($url, $name) {
		return $this->makeRequest($url, 'delete', $name);
	}

    /**
     * @param $url
     * @param $name
     * @return mixed|string
     */
    function verifyKey ($url, $name) {
		return $this->makeRequest($url, 'verify', $name);
	}

}




?>
<?php

class curlSimple {

	private static $lastResponse;

	private function makeRequest ($curlopts, $url ,$returnCode = false) {
		if (!$curlopts) exit("CurlOptions is empty!");
		elseif (!is_array($curlopts)) exit("CurlOptions maybe only array!");

		$curl = curl_init($url);
		curl_setopt_array($curl, $curlopts);
		$response = curl_exec($curl);
		curl_close($curl);
		self::$lastResponse = $response;
		return $response;
	}
}




?>
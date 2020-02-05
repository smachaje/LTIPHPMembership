<?php
require_once 'HTTP/Request2.php';
require_once 'classes/Constants.class.php';

class Rest {

	public $constants = '';
	public $clientURL = '';

	function __construct($clientURL)
	{
		$this->clientURL=$clientURL;
	}
	
	public function authorize() {
		
		$constants = new Constants($this->clientURL);
		$token = new Token();
		
		$request = new HTTP_Request2($constants->HOSTNAME . $constants->AUTH_PATH, HTTP_Request2::METHOD_POST);
		$request->setAuth($constants->KEY, $constants->SECRET, HTTP_Request2::AUTH_BASIC);
		$request->setBody('grant_type=client_credentials');
		$request->setHeader('Content-Type', 'application/x-www-form-urlencoded');
                        $request->setConfig(array(
                                'ssl_verify_peer'   => $constants->ssl_verify_peer,
                                'ssl_verify_host'   => $constants->ssl_verify_host
                        ));

		
		
		try {
			$response = $request->send();
			if (200 == $response->getStatus()) {
				$token = json_decode($response->getBody());
			} else {
				$BbRestException = json_decode($response->getBody());
                                $GLOBALS['err'] .= $BbRestException->message.". ";
			}
		} catch (HTTP_Request2_Exception $e) {
			//$GLOBALS['err'] .= 'Error: ' . $e->getMessage();
		}
		
		return $token;
	}
	
		
		public function readUser($access_token, $user_id) {
			$constants = new Constants($this->clientURL);
		
			$request = new HTTP_Request2($constants->HOSTNAME . $constants->USER_PATH . '/' . $user_id, HTTP_Request2::METHOD_GET);
			$request->setHeader('Authorization', 'Bearer ' . $access_token);
                        $request->setConfig(array(
                                'ssl_verify_peer'   => $constants->ssl_verify_peer,
                                'ssl_verify_host'   => $constants->ssl_verify_host
                        ));

		
			try {
				$response = $request->send();
				if (200 == $response->getStatus()) {
					$user = json_decode($response->getBody());
				} else {
							$BbRestException = json_decode($response->getBody());
                                                        $GLOBALS['err'] .= $BbRestException->message.". ";
				}
			} catch (HTTP_Request2_Exception $e) {
				//$GLOBALS['err'] .= 'Error: ' . $e->getMessage();
			}
		
			return $user;
		}
		
		
		public function readMembership($access_token, $course_id, $user_id) {
			$constants = new Constants($this->clientURL);
		
			$request = new HTTP_Request2($constants->HOSTNAME . $constants->COURSE_PATH . '/' . $course_id . '/users/' . $user_id,  HTTP_Request2::METHOD_GET);
			$request->setHeader('Authorization', 'Bearer ' . $access_token);
                        $request->setConfig(array(
                                'ssl_verify_peer'   => $constants->ssl_verify_peer,
                                'ssl_verify_host'   => $constants->ssl_verify_host
                        ));

		
			try {
				$response = $request->send();
				if (200 == $response->getStatus()) {
					$membership = json_decode($response->getBody());
				} else {
							$BbRestException = json_decode($response->getBody());
                                                        $GLOBALS['err'] .= $BbRestException->message.". ";
				}
			} catch (HTTP_Request2_Exception $e) {
				//$GLOBALS['err'] .= 'Error: ' . $e->getMessage();
			}
		
			return $membership;
		}

		
}
?>

<?php
	class Constants {

		
	function __construct($clientURL)
        {
                $this->HOSTNAME=$clientURL;
        }
		
		public $HOSTNAME = "";

		//key and secret from developer.blackboard.com
                public $KEY = ''; // ex: 1bc13888-be04-431f-c981-6bf05860a80b
                public $SECRET = ''; // ex: nFtqLuHzcH3asdfglleE7eR9QoFsD

                //api paths
                public $AUTH_PATH = '/learn/api/public/v1/oauth2/token';
                public $DSK_PATH = '/learn/api/public/v1/dataSources';
                public $TERM_PATH = '/learn/api/public/v1/terms';
                public $COURSE_PATH = '/learn/api/public/v1/courses';
                public $USER_PATH = '/learn/api/public/v1/users';

                //allows self-signed certs on dev machines
                public $ssl_verify_peer = FALSE;
                public $ssl_verify_host =  FALSE;


	}
?>

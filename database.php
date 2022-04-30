<?php
    class Database {
        private static $dbName = 'dbstatusled' ;
        private static $dbHost = 'localhost' ;
        private static $dbUsername = 'root';
        private static $dbUserPassword = '';
        
        private static $cont  = null;

		public function __construct() {
			die('Init function is not allowed');
		}
		 
		public static function connect() {
		  // One connection through whole application
		
            if(!self::$cont = mysqli_connect(self::$dbHost,self::$dbUsername,self::$dbUserPassword,self::$dbName))
            {
            
                die("failed to connect!");
            }
            return self::$cont;
        }
        public static function disconnect() 
        {
			self::$cont = null;
            //session_destroy();

		}
    }
        

?>
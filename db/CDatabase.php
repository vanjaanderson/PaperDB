<?php

class CDatabase {
	// Static variables (static means they remain through the application)
	private static $db_type = DB_TYPE;
	private static $db_name = DB_NAME;
	private static $db_host = DB_HOST;
	private static $db_user = DB_USER;
	private static $db_pwd  = DB_PWD;
	private static $count 	= null;

	// Database class constructor does not work with static classes
	public function __construct() {
		die('Init function is not allowed');
	}
	// Connect function
	public static function connect() {
		// Check if there already is a connection
		if ( self::$count === null ) {
			try {
				self::$count = new PDO ( self::$db_type.':host='.self::$db_host.';dbname='.self::$db_name, self::$db_user, self::$db_pwd);
			}
			// Throw exception if connection fails
			catch(PDOException $e) {
				echo 'Connection failed: ' . $e->getMessage();
			}
		}
		return self::$count;
	}

	// Disconnect function (sets connection to null)
	public static function disconnect() {
		self::$count = null;
	}
}

?>
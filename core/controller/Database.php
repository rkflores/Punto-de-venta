<?php
class Database {
	public static $db;
	public static $con;
	function Database(){
		$this->user="masclicks";$this->pass="masclicks";$this->host="localhost";$this->ddbb="Cweb";
		//$this->user="evilnaps_admin";$this->pass="l00lapal00za";$this->host="localhost";$this->ddbb="evilnaps_pvm";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		$con->query("set sql_mode='';");
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>

<?php

	class Connection{

		private static $_db = null;

		public static function getConnection(){
			if(is_null(self::$_db)){
				try{
					self::$_db = new PDO('mysql:host=localhost;dbname=dbname;charset=utf8', 'user','password');
				}catch(Exception $e){
					echo ' <div style="background-color:red;color:white;position:fixed;bottom:0;left:0;width:100%;text-align:center;font-weight:bold;">! ******** Database connection error ******** ! </div>';
				}
			}
			return self::$_db;
		}
	}
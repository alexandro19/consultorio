<?php

namespace App;

class Connection {

	public static function getDb() {
		try {
            $opcoes = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);
			$conn   = new \PDO(
				"mysql:host=localhost;dbname=consultorio;charset=utf8",
				"root",
				"",
				$opcoes 
			);

			return $conn;

		} catch (\PDOException $e) {
			//.. tratar de alguma forma ..//
		}
	}
}

?>
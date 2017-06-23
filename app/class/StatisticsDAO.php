<?php

class StatisticsDao{


	public function find($p_date){
		$stat = array();
		$db = Connection::getConnection();
		if($db){
			$request = $db->prepare("SELECT * FROM statistics WHERE day=?");
			$request->execute(array($p_date));
			foreach($request as $data ){
				array_push($stat, $this->buildStatistics($data));
			}
			$request->closeCursor();
		}
		return $stat;
	}

	public function update($p_date, $p_origin){
		$db = Connection::getConnection();
		if($db){
			$request = $db->prepare("SELECT COUNT(*) AS exist FROM statistics WHERE day=? AND origin=?");
			$request->execute(array($p_date, $p_origin));
			$exist = $request->fetch();
			if($exist["exist"] == 0){
				$request->closeCursor();
				$request = $db->prepare("INSERT INTO statistics(visits, day, origin) VALUE(1, ?, ?)");
				$request->execute(array($p_date, $p_origin));
				$request->closeCursor();
			}
			else{
				$request = $db->prepare("UPDATE statistics SET visits = visits+1 WHERE day=? AND origin=?");
				$request->execute(array($p_date, $p_origin));
				$request->closeCursor();
			}
		}
	}

	public function findAll(){

	}

	private function buildStatistics($p_data){
		return new Statistics($p_data);
	} 

}
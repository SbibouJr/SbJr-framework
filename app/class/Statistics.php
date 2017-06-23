<?php

	class Statistics
	{
		private $_id;
		private $_visits;
		private $_day;
		private $_origin;

		public function __construct($p_data){
			$this->hydrate($p_data);
		}

		public function hydrate(array $p_data){

			foreach($p_data as $key => $value){
				$method = "set" . ucfirst($key);
				if(method_exists($this, $method)){
					$this->$method($value);
				}
			}
		}

		// ******************* ID *********************
		public function setId($p_id){
			if($p_id > 0){
				$this->_id = $p_id;
			}
		}
		public function getId(){
			return $this->_id;
		}

		// ******************* VISITS **************************
		public function setVisits($p_visits){
			if($p_visits > 0){
				$this->_visits = $p_visits;
			}
		}
		public function getVisits(){
			return (int)$this->_visits;
		}

		// ******************* DAY ***************************
		public function setDay($p_day){
			$this->_day = $p_day;
		}
		public function getDay(){
			return nl2br(strip_tags($this->_day));
		}

		// ******************* ORIGIN **************************
		public function setOrigin($p_origin){
			$this->_origin = $p_origin;
		}
		public function getOrigin(){
			return nl2br(strip_tags($this->_origin));
		}
	}
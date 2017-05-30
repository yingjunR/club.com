<?php
	class Request{
		
		public $url; //URL called by the user
		public $data = false;
		function __construct(){
			$this->url = $_SERVER['PATH_INFO'];			

			if(!empty($_POST)){
				$this->data = new stdClass();
				foreach ($_POST as $k => $v) {
					$this->data->$k=$v;
				}
			}
		}
	}
?>

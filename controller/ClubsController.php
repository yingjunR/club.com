<?php
class ClubsController extends Controller{

	function index(){
		$this->loadModel('Club');
		$clubs = $this->Club->find(array(
			));
		$this->set("clubs",$clubs);

	}

	function editClub($clubid){
		$this->loadModel('Club');

		$club = $this->Club->findFirst(array(
			"conditions" => array('clubid' => $clubid)));
		$this->set('club',$club);

		if($this->request->data){
			$this->Club->save($this->request->data);
			$id = $this->Club->id;
		}
		if(isset($id)){
			$this->request->data = $this->Club->findFirst(array(
				'conditions' => array('clubid'=>$clubid)
				));
		}



	}
}
?>
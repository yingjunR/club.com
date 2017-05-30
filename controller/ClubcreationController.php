<?php
class ClubcreationController extends Controller{

	function createClub($clubid = null){
		$this->loadModel('Club');

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
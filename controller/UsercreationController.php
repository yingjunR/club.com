<?php
class UsercreationController extends Controller{

	function createUser($userid = null){
		$this->loadModel('User');

		if($this->request->data){
			$this->User->save($this->request->data);
			$id = $this->User->id;
		}
		if(isset($id)){
			$this->request->data = $this->User->findFirst(array(
				'conditions' => array('userid'=>$userid)
				));
		}
	}
}
?>
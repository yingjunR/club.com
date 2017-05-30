<?php
class UsersController extends Controller{

	function index(){
		$this->loadModel('User');
		$users = $this->User->find(array(
			));
		$this->set("users",$users);

	}
}
?>
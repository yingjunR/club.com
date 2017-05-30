<?php
	class Dispatcher{
		
		var $request;
		
		function __construct(){
			$this->request = new Request();
			Router::parse($this->request->url,$this->request);
			$controller = $this->loadController();
			if(!in_array($this->request->action, array_diff(get_class_methods($controller),get_class_methods('Controller'))) ){
				$this->error('The controller '.$this->request->controller. 'doesn\'t have method '.$this->request->action);
			}
			call_user_func_array(array($controller,$this->request->action),$this->request->params);
			$controller->render($this->request->action);
		}
		
		function error($message){
			$controller = new Controller($this->request);
			$controller->e404($message);

		}
		
		function loadController(){
			$name = ucfirst($this->request->controller).'Controller';
			$file = ROOT.DS.'controller'.DS.$name.'.php';
			require $file;
			$controller = new $name ($this->request);

			$controller->Form = new Form($controller);

			return $controller;
		}
	}
?>

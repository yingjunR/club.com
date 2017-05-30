<?php
class Form{

	public $controller;

	public function __construct($controller){
		$this->controller = $controller;
	}

	public function input ($name,$label,$options = array()){
		if(!isset($this->controller->request->data->$name)){
			$value = '';
		}else{
			$data = $this->controller->request->data->$name;
		}
		if($label == 'hidden'){
			return '<input type="hidden" name="'.$name.'" value = "'.$value.'">';
		}
		$html = '<div class="form-group">
          			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="input'.$name.'">'.$label.' </label>
          			<div class="col-md-6 col-sm-6 col-xs-12">';
        if(!isset($options['type'])){
        	$html .= '<input type="text" id="input'.$name.'" name="'.$name.'" required="required" class="form-control col-md-7 col-xs-12" value="'.$value.'">';
        }elseif ($options['type'] == 'textarea') {
        	$html .= '<textarea id="input'.$name.'" name="'.$name.'" required="required" class="form-control col-md-7 col-xs-12 ">'.$value.'</textarea>';
        }
         
         $html .= '</div></div>';
         return $html;
	}
}
?>
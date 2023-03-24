<?php
class Form {
  private $title;
  private $class_Form;
  private $input_Type;
  private $input_Value;
  private $form_Boby;
  private $method;
  
  function __construct($title,$method,$classForm=null) {
    $this->title = $title;
    $this->class_Form = $classForm;
    $this->method = $method;
  }

  function addInput($type,$value){
    $this->input_Type = $type;
    $this->input_Value = $value;
  }

  function addBody($bodyForm){
    $this->form_Boby = $bodyForm;
  }

  function render() {
    if ($this->class_Form){
        $form = "<form method=\"{$this->method}\" class=\"{$this->class_Form}\">";
    }else{
        $form = "<form method=\"{$this->method}\">";
    }
    $form .= "<h2>{$this->title}</h2>"; 
    $form .= $this->form_Boby;
    $form .= "<input type=\"{$this->input_Type}\" value=\"{$this->input_Value}\">";
    $form .= "</form>";
    return $form;
  }
}
?>

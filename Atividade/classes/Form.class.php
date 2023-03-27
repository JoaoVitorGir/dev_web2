<?php
class Form {
  private $title;
  private $class_Form;
  private $input_Type;
  private $input_Value;
  private $form_Boby;
  private $method;
  private $input_placeholder;

  private $input = array();
  
  function __construct($title,$method,$classForm=null) {
    $this->title = $title;
    $this->class_Form = $classForm;
    $this->method = $method;
  }

  function addInput($type,$value,$placeholder=null,$style=null){
    $newInput = [$type,$value,$placeholder,$style];
    $this->input[] = $newInput;
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
    if ($this->title){
      $form .= "<h2>{$this->title}</h2>";
    }
     
    $form .= $this->form_Boby;

    foreach($this->input as $inputs){
      $form .= "<input type=\"{$inputs[0]}\"";

      if ($inputs[1]){
        $form .= "value=\"{$inputs[1]}\"";
      }

      if ($inputs[2]){
        $form .= "placeholder=\"{$inputs[2]}\"";
      }

      if ($inputs[3]){
        $form .= "class=\"{$inputs[3]}\">";
      }else{
        $form .= ">";
      }
    }

    $form .= "</form>";
    return $form;
  }
}
?>

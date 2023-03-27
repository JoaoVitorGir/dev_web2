<?php
class Img {
  private $url;
  private $width;
  private $height;
  private $image;
  
  public function __construct($url) {
    $this->url = $url;
  }

  public function Renderizar() {
    return "<img src=\"$this->url\" alt=\"Imagem\">";
  }
}
?>

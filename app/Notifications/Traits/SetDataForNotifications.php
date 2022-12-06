<?php 

namespace App\Notifications\Traits;

trait SetDataForNotifications{

	public $content;
    public $actionUrl;
    public $actionText;
    public $methods;
    public $image;
    public $subject;
    public $greeting;

	public function setGreeting($greeting){
    	$this->greeting = $greeting;
    	return $this;
    }
    public function setSubject($subject){
    	$this->subject = $subject;
    	return $this;
    }
    public function setContent($content=[]){
    	$this->content = implode("\n",$content);
    	return $this;
    }
    public function setActionUrl($url){
    	$this->actionUrl= $url;
    	return $this;
    }
    public function setActionText($text){
    	$this->actionText= $text;
    	return $this;
    }
    public function setMethods($methods=[]){
    	$this->methods= $methods;
    	return $this;
    }
    public function setImage($imageUrl){
    	$this->image = $imageUrl;
    	return $this;
    }

}
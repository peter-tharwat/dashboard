<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class GeneralNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $tries = 2;
    public $timeout = 10;
 
    public $inline_content;
    public $action_url;
    public $btn_text;
    public $methods;
    public $image;




    public function __construct($options=[]){

        $this->inline_content= implode("\n",$options['content']);
        $this->action_url=$options['url'];
        $this->btn_text=$options['btn_text'];
        $this->methods=$options['methods'];
        $this->image=$options['image'];
    }
 
    public function via($notifiable){

        return $this->methods;

    }

    public function toMail($notifiable){

        return (new MailMessage)
                 //->level($this->level)
                ->subject("لديك إشعار جديد")
                ->greeting("مرحباً") 
                ->line($this->inline_content) 
                ->action($this->btn_text, $this->action_url);
                    
    } 
    public function toDatabase($notifiable){

        $content=$this->inline_content;
        return [
            'message'=>'<a href="'.$this->action_url.'">'.$content.'</a>',
            'image'=>$this->image, 
        ];
    } 
}

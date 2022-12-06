<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use App\Notifications\Traits\SetDataForNotifications;

class GeneralNotification extends Notification /*implements ShouldQueue*/
{
    use SetDataForNotifications;
    use Queueable;

    public $tries = 2;
    public $timeout = 10;

    public function __construct(){
        $this->subject="اشعار جديد";
        $this->greeting="مرحباً";
        $this->actionUrl=env("APP_URL");
        $this->actionText=env("APP_NAME");
        $this->methods=['database'];
        $this->image=env("DEFAULT_IMAGE_AVATAR");
        $this->actionUrl=env("APP_URL");
    }

    public function via($notifiable){ 
        return $this->methods;
    }
    public function toMail($notifiable){
        return (new MailMessage) 
                ->subject($this->subject)
                ->greeting($this->greeting) 
                ->line($this->content) 
                ->action($this->actionText, $this->actionUrl);
                    
    } 
    public function toDatabase($notifiable){
        return [
            'message'=>'<a href="'.$this->actionUrl.'">'.$this->content.'</a>',
            'image'=>$this->image, 
        ];
    } 
}

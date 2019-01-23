<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Console\Commmands\Remind;

class RemindOrder extends Notification
{
    use Queueable;

    protected $countOrder;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($countOrder)
    {
        $this->countOrder = $countOrder;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = "http://127.0.0.1:8000/managing-order";
        
        return (new MailMessage)
                    ->bcc($notifiable->email)
                    ->greeting(trans('order.hello').$notifiable->name)
                    ->line(trans('order.youhave').$this->countOrder.trans('order.solve'))
                    ->action(trans('order.check'), $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

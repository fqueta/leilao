<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ganhadorPainelNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $config;
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $mens = isset($this->config['mensagem']) ? $this->config['mensagem'] : false;
        if($mens && isset($this->config['link_pagamento'])){
            $mens .= '<div class="text-center"><a href="'.$this->config['link_pagamento'].'" class="btn btn-success text-light d-block mb-1">Pagar agora</a></div>';
            $mens = str_replace('h1', 'h5', $mens);
        }
        return [
            'message' => $mens,
            'config' => @$this->config,
        ];
    }
}

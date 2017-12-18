<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserLoggedInNotification extends Notification
{
    use Queueable;

    public $userName;
    public $geoIpStateName;
    public $geoIpCountry;
    public $ip;
    public $browserName;
    public $userAgent;
    public $platformName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->userName = $user->name;
        $this->geoIpStateName = geoip()->getLocation()->state_name;
        $this->geoIpCountry = geoip()->getLocation()->country;
        $this->ip = request()->ip();
        $this->browserName = \Browser::browserName();
        $this->userAgent = \Browser::userAgent();
        $this->platformName = \Browser::platformName();
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
        return (new MailMessage)
                    ->subject(config('app.name', 'NanoCoins') . ' - User Login Notification')
                    ->greeting('Hello! ' . $this->userName . ',')
                    ->line('This is a notification that your login to ' . config('app.name', 'NanoCoins') . ' was successful. Login User Agent and Location is as follows:')
                    ->line('IP Address: ' . $this->ip)
                    ->line('Agent/App: ' . $this->browserName)
                    ->line('User Agent: ' . $this->userAgent)
                    ->line('Platform Name: ' . $this->platformName)
                    ->line('Location: ' . $this->geoIpStateName . " (" . $this->geoIpCountry . ")")
                    ->line('Date/Time: ' . now())
                    ->line('If it was not you that logged in, then your login details might have been compromised. Please reset your password immediately.');
                
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

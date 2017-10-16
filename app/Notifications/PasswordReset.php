<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

<<<<<<< HEAD:app/Notifications/PasswordReset.php
class PasswordReset extends Notification implements ShouldQueue
=======
class WalletToWalletTransfer extends Notification implements ShouldQueue
>>>>>>> 949ee20ea678766dec1c817078ac6b87e000f680:app/Notifications/WalletToWalletTransfer.php
{
    use Queueable;
    protected $transaction;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction, $user)
    {
        $this->transaction = $transaction;
        $this->user = $user;
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
<<<<<<< HEAD:app/Notifications/PasswordReset.php
                    ->subject('Password Reset')
                    ->line('Your password has been changed. You can now login with the new password')
=======
                    ->line('A total amount of '.$this->transaction->amount.' was transfered from 
                     '.$this->transaction->source->wallet_name.' wallet to '. $this->transaction->destination->wallet_name.' by
                      '. $this->user->username)
                      ->action('View Transaction', url("/wallet/".$this->transaction->source->id))
>>>>>>> 949ee20ea678766dec1c817078ac6b87e000f680:app/Notifications/WalletToWalletTransfer.php
                    ->line('Thank you for using '.config('app.name'));
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

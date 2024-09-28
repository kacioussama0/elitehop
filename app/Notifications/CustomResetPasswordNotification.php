<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends ResetPasswordNotification
{
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('إستعادة كلمة المرور')
            ->greeting('مرحبا!')
            ->line('تستطيع تغيير كلمة مرورك بالضغط على هذا الزر:')
            ->action('إستعادة كلمة المرور', url(route('password.reset', ['token' => $this->token], false)))
            ->line('منصة نخبة الأمل. Elite Hope');
    }
}

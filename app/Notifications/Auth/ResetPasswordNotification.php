<?php

namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends ResetPassword implements ShouldQueue
{
    use Queueable;

    /**
     * Build the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable, $email = null)
    {
        $email = $email ?? $notifiable->getEmailForPasswordReset();

        return (new MailMessage())
            ->subject(trans('backpack::base.password_reset.subject'))
            ->greeting(trans('backpack::base.password_reset.greeting'))
            ->line([
                trans('backpack::base.password_reset.line_1'),
                trans('backpack::base.password_reset.line_2'),
            ])
            ->action(trans('backpack::base.password_reset.button'), route('backpack.auth.password.reset.token', $this->token).'?email='.urlencode($email))
            ->line(trans('backpack::base.password_reset.notice'));
    }

    /**
     * Get the reset URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function resetUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        }

        return url(route('backpack.auth.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }
}

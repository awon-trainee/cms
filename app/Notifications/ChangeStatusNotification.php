<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeStatusNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public string $type;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $record, $type, public $name = null)
    {
        $this->queue = 'change-status-mails';

        $this->type = match ($type){
            'employment_request' => 'طلب التوظيف',
            'membership_request' => 'طلب العضوية',
            'volunteering_request' => 'طلب التطوع',
            'initiative_registration' => 'التسجيل في المبادرة',
        };
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('تغيير حالة '. $this->type)
                    ->greeting('مرحبا!')
                    ->line('تم تغيير حالة '. $this->type. ' الخاص بك')
                    ->when($this->name, function (MailMessage $mail) {
                        return $mail->line('اسم المبادرة: '. $this->name);
                    })
                    ->line('حالة الطلب أصبحت: '. $this->record->status->nameAr())
                    ->line('وشكرا لك!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PeminjamanAlatDisetujuiNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // Mengirim notifikasi melalui email dan database
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
            ->subject('Peminjaman Alat Disetujui')
            ->line('Peminjaman alat Anda telah disetujui oleh admin.')
            ->action('Lihat Status Peminjaman', url('/status-peminjaman')); // Ganti URL sesuai dengan halaman status peminjaman Anda
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
            'message' => 'Peminjaman alat Anda telah disetujui oleh admin.',
            'link' => url('/status-peminjaman'), // Ganti URL sesuai dengan halaman status peminjaman Anda
        ];
    }
}

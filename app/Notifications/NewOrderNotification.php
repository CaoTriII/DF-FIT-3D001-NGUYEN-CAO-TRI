<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $bookingDetail;

    public function __construct($bookingDetail)
    {
        $this->bookingDetail = $bookingDetail;
    }

    public function via($notifiable)
    {

    }

    public function toMail($notifiable)
    {
        // Không có nội dung
    }

    public function toArray($bookingDetail)
    {
        return [
            'booking_detail' => $this->bookingDetail,
        ];
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    public $bookingCode;
    public $fullname;
    public $hotelName;
    public $roomName;
    public $quantity;
    public $adultNumber;
    public $checkInDate;
    public $checkOutDate;
    public $cartTotal;

    public function __construct($data)
    {
        $this->bookingCode = $data['bookingCode'];
        $this->fullname = $data['fullname'];
        $this->hotelName = $data['hotelName'];
        $this->roomName = $data['roomName'];
        $this->quantity = $data['quantity'];
        $this->adultNumber = $data['adultNumber'];
        $this->checkInDate = $data['checkInDate'];
        $this->checkOutDate = $data['checkOutDate'];
        $this->cartTotal = $data['cartTotal'];
    }

    public function build()
    {
        return $this->view('client.pages.cart.order_confirmation')
                    ->subject('Xác nhận đặt hàng');
    }

}

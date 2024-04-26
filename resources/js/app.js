import './bootstrap';
import Echo from 'laravel-echo';

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel('new-order-notification')
    .listen('NewOrderNotificationEvent', (event) => {
        // Xử lý sự kiện khi có order mới
        showNewOrderNotification(event.bookingDetail);
    });

function showNewOrderNotification(bookingDetail) {
    // Hiển thị thông báo, ví dụ sử dụng toastr
    toastr.success(`New order received for Booking ID ${bookingDetail.booking_id}`);
}

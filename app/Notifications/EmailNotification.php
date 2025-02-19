<?php

namespace App\Notifications;

class EmailNotification implements NotificationInterface {
    public function send($message) {
        return "Email sent: " . $message;
    }
}

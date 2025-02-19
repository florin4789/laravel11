<?php

namespace App\Notifications;

class PushNotification implements NotificationInterface {

    public function send($message) {
        return "Push notification sent: " . $message;
    }
}

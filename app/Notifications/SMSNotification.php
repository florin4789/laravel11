<?php

namespace App\Notifications;

class SMSNotification implements NotificationInterface {

    public function send($message) {
        return "SMS sent: " . $message;
    }
}

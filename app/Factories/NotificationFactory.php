<?php

namespace App\Factories;

use App\Notifications\EmailNotification;
use App\Notifications\NotificationInterface;
use App\Notifications\PushNotification;
use App\Notifications\SmsNotification;

class NotificationFactory {
    public static function create($type) : NotificationInterface {
        switch ($type) {
            case 'email':
                return new EmailNotification();
            case 'sms':
                return new SmsNotification();
            case 'push':
                return new PushNotification();
            default:
                throw new \Exception("Invalid notification type");
        }
    }
}



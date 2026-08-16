<?php

namespace App\Services;

class NotificationService
{
    public function send($user, $message)
    {
        if (config('features.wa_notifications')) {
            // Send via WhatsApp Business API
            $this->sendWhatsApp($user->phone, $message);
        } else {
            // Fallback: Local DB/Email Notification
            $this->sendDatabaseNotification($user, $message);
        }
    }
    
    private function sendWhatsApp($phone, $message)
    {
        // TODO: Implement WA API
    }

    private function sendDatabaseNotification($user, $message)
    {
        // TODO: Implement Database Notification
    }
}

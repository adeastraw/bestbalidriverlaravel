<?php

use App\Models\Setting;
use App\Services\WhatsAppService;

if (!function_exists('whatsapp_url')) {
    function whatsapp_url(string $message = '', ?string $number = null): string
    {
        if (empty($message)) {
            $message = WhatsAppService::generalMessage();
        }
        return WhatsAppService::url($message, $number);
    }
}

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

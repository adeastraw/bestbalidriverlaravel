<?php

namespace App\Services;

use App\Models\Activity;
use App\Models\Driver;
use App\Models\Setting;
use App\Models\Trip;
use App\Models\Vehicle;

class WhatsAppService
{
    /**
     * Get the configured WhatsApp business phone number.
     */
    public static function getNumber(): string
    {
        $dbNumber = Setting::get('whatsapp_number');
        if (!empty($dbNumber)) {
            $number = $dbNumber;
        } else {
            $number = config('services.whatsapp.number', env('WHATSAPP_NUMBER', '6281234567890'));
        }

        // Clean non-numeric characters
        $number = preg_replace('/[^0-9]/', '', $number);

        // Normalize Indonesian prefix: if starts with 08..., convert to 628...
        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }

        return $number;
    }

    /**
     * Generate a direct WhatsApp click-to-chat URL with a pre-filled message.
     */
    public static function url(string $message, ?string $number = null): string
    {
        $targetNumber = $number ?: static::getNumber();
        return 'https://wa.me/' . $targetNumber . '?text=' . urlencode(trim($message));
    }

    /**
     * Contextual message for Trip booking.
     */
    public static function tripMessage(Trip $trip): string
    {
        $price = $trip->price ? 'IDR ' . number_format($trip->price, 0, ',', '.') . ($trip->price_label ? ' (' . $trip->price_label . ')' : '') : 'Contact Us';

        return "Hello Best Bali Driver,\n\n" .
            "I would like to book / inquire about this Bali tour:\n" .
            "• Tour: {$trip->name}\n" .
            "• Duration: " . ($trip->duration ?: 'Full Day') . "\n" .
            "• Est. Price: {$price}\n" .
            "• Planned Date: [Please enter your travel date]\n" .
            "• Number of Guests: [Please enter number of guests]\n" .
            "• Pickup Location: [Hotel/Villa area in Bali]\n\n" .
            "Could you please let me know availability and details? Thank you!";
    }

    /**
     * Contextual message for Driver booking/inquiry.
     */
    public static function driverMessage(Driver $driver): string
    {
        return "Hello Best Bali Driver,\n\n" .
            "I would like to request private driver service with:\n" .
            "• Driver: {$driver->name}\n" .
            "• Service Area: " . ($driver->service_area ?: 'All Bali') . "\n" .
            "• Date(s): [Please enter your travel dates]\n" .
            "• Group Size: [Number of guests]\n\n" .
            "Is {$driver->name} available for these dates? Thank you!";
    }

    /**
     * Contextual message for Vehicle inquiry.
     */
    public static function vehicleMessage(Vehicle $vehicle): string
    {
        return "Hello Best Bali Driver,\n\n" .
            "I am interested in renting / booking with this vehicle:\n" .
            "• Vehicle: {$vehicle->name} (" . ($vehicle->type ?: 'Private Car') . ")\n" .
            "• Capacity: Up to {$vehicle->capacity} passengers\n" .
            "• Planned Date(s): [Please enter your travel dates]\n" .
            "• Pickup Area: [Hotel/Airport/Villa]\n\n" .
            "Could you provide more details and rate with driver? Thank you!";
    }

    /**
     * Contextual message for Activity inquiry.
     */
    public static function activityMessage(Activity $activity): string
    {
        $price = $activity->price ? 'IDR ' . number_format($activity->price, 0, ',', '.') . ($activity->price_label ? ' (' . $activity->price_label . ')' : '') : 'Contact Us';

        return "Hello Best Bali Driver,\n\n" .
            "I am interested in this Bali activity:\n" .
            "• Activity: {$activity->name}\n" .
            "• Location: " . ($activity->location ?: 'Bali') . "\n" .
            "• Duration: " . ($activity->duration ?: 'Flexible') . "\n" .
            "• Price Info: {$price}\n" .
            "• Number of Participants: [Enter number of guests]\n" .
            "• Preferred Date: [Enter preferred date]\n\n" .
            "Could you please provide information on schedule and transport inclusion? Thank you!";
    }

    /**
     * General WhatsApp message.
     */
    public static function generalMessage(): string
    {
        return "Hello Best Bali Driver,\n\n" .
            "I would like to ask about your private driver and custom tour services in Bali.\n" .
            "Could you please assist me with trip planning and pricing? Thank you!";
    }
}

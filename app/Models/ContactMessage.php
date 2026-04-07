<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service',
        'subject',
        'message',
        'ip_address',
    ];

    public const SERVICE_KEYS = ['hardware', 'building', 'bulk', 'quote', 'other'];

    public static function serviceLabel(string $key): string
    {
        return match ($key) {
            'hardware' => __('Hardware & tools'),
            'building' => __('Building materials'),
            'bulk' => __('Bulk / delivery enquiry'),
            'quote' => __('Price quote'),
            default => __('Other'),
        };
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    protected $fillable = [
        'address',
        'email',
        'phone',
        'phone_tel',
        'whatsapp_digits',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'youtube_url',
        'tiktok_url',
        'google_maps_embed_src',
    ];

    /**
     * Single-row settings used across the public site.
     */
    public static function forSite(): self
    {
        $row = static::query()->first();
        if ($row) {
            return $row;
        }

        return new self(self::defaultAttributes());
    }

    /**
     * @return array<string, string|null>
     */
    public static function defaultAttributes(): array
    {
        return [
            'address' => 'Kasubi, Kampala, Uganda',
            'email' => 'info@realqualityjuniorschool.ug',
            'phone' => '+256 700 000 000',
            'phone_tel' => '+256700000000',
            'whatsapp_digits' => '256700000000',
            'facebook_url' => 'https://www.facebook.com/',
            'instagram_url' => null,
            'twitter_url' => null,
            'youtube_url' => null,
            'tiktok_url' => null,
            'google_maps_embed_src' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.739792900789!2d32.4774!3d0.4044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177db9a8d4c2c5e5%3A0x1!2sWakiso%2C%20Uganda!5e0!3m2!1sen!2s!4v1610000000000!5m2!1sen!2s',
        ];
    }

    public function telHref(): string
    {
        $tel = trim((string) $this->phone_tel);
        if ($tel !== '') {
            return 'tel:'.preg_replace('/\s+/', '', $tel);
        }
        $digits = preg_replace('/\D+/', '', (string) $this->phone);
        if ($digits === '') {
            return '#';
        }

        return 'tel:+'.$digits;
    }

    public function waMeUrl(): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $this->whatsapp_digits);
        if ($digits === '') {
            return null;
        }

        return 'https://wa.me/'.$digits;
    }
}

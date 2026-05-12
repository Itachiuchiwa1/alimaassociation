<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];
    public $timestamps = true;

    public static function get(string $key, string $default = ''): string
    {
        return self::where('key', $key)->first()?->value ?? $default;
    }

    public static function set(string $key, string $value): void
    {
        self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}

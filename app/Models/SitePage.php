<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'body',
    ];

    public static function allowedSlugs(): array
    {
        return ['about', 'services', 'products', 'contact'];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function usesDefaultTemplate(): bool
    {
        return $this->body === null || trim($this->body) === '';
    }
}

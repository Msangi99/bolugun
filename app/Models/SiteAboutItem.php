<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrl;
use Illuminate\Database\Eloquent\Model;

class SiteAboutItem extends Model
{
    use HasPublicImageUrl;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }
}

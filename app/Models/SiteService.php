<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrl;
use Illuminate\Database\Eloquent\Model;

class SiteService extends Model
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

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }
}

<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteProduct extends Model
{
    use HasPublicImageUrl;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'site_product_category_id',
        'title',
        'description',
        'tag',
        'image_path',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(SiteProductCategory::class, 'site_product_category_id');
    }

    public function isotopeFilterClass(): string
    {
        return $this->category
            ? $this->category->isotopeFilterClass()
            : 'filter-cat-uncategorized';
    }
}

<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiteProductCategory extends Model
{
    use HasPublicImageUrl;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'image_path',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(SiteProduct::class, 'site_product_category_id');
    }

    public function isotopeFilterClass(): string
    {
        $slug = $this->slug ?? 'uncategorized';

        return 'filter-cat-'.$slug;
    }
}

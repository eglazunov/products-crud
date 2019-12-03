<?php

namespace App\Models;


use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Product
 * @package App\Models
 *
 * @property Collection productAttributes
 */
class Product extends Model
{
    public $table = 'products';

    protected $fillable = [
        'title',
        'price',
        'description',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Returns attributes relation
     *
     * @return BelongsToMany
     */
    public function productAttributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Returns value of given attribute
     *
     * @param Attribute $attribute
     * @return null|string
     */
    public function attributeValue(Attribute $attribute): ?string
    {
        $this->loadMissing('productAttributes');

        return $this->productAttributes
                ->firstWhere('id', $attribute->id)
                ->pivot->value ?? null;
    }
}

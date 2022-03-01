<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Models\ProductView;

class Product extends Model
{
    use HasFactory;

          /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'name',
        'category_id',
        'price'
    ];

/**
     * Get the product images.
     *
     * @param string $value
     *
     * @return string
     */
    public function getImagesAttribute($value)
    {
        if (empty($value)) {
            return [];
        }

        return json_decode($value, true);
    }

    /**
     * Categories to which this product belongs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    // /**
    //  * Orders having this product.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function orders()
    // {
    //     return $this->belongsToMany(Store::class, 'order_product', 'product_id', 'order_id', 'id')
    //         ->withPivot([
    //             'quantity',
    //             'unit_price',
    //         ]);
    // }

    /**
     * Images for this product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }

    /**
     * Reviews for this product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product_reviews()
    {
        return $this->hasMany(ProductView::class,'product_id');
    }

}

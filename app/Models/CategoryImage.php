<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    use HasFactory;

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_images';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';




    protected $fillable = ['category_id', 'image_path', 'image_name'];

        /**
     * Product for this image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}

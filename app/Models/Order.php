<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

          /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

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
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_company',
        'billing_country',
        'billing_city',
        'billing_state',
        'billing_postalcode',
        'billing_address_1',
        'billing_address_2',
        'instructions',
        'sub_total',
        'tax',
        'total',
    ];

        /**
     * User that made this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

        /**
     * Products belonging to this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id', 'id')
            ->withPivot([
                'quantity',
                'unit_price',
            ]);
    }
}

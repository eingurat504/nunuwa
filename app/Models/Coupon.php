<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coupons';


    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'type',
        'value',
        'percent_off',
    ];


    public function findByCode($code){
        return self::where('code', $code)->first();
     }
 
     /**
      * discount function
      */
     public function discount($total){
         if($this->type == 'fixed'){
             return $this->value;
         } elseif($this->type == 'percent'){
             return ($this->percent_off / 100) * $total;
         } else {
             return 0;
         }
     }

}

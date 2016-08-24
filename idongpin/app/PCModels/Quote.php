<?php
/**
 * Created by PhpStorm.
 * User: chendongnan
 * Date: 16/7/21
 * Time: 上午10:58
 */

namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model{
    use SoftDeletes;

    protected $table = 'idp_quote';
    protected $primaryKey = 'quote_id';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'quote_id', 'quote_launch_order_id', 'quote_user_id','quote_price','quote_freight','update_at','create_at'
    ];

}
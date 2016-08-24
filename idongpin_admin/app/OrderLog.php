<?php
/**
 * Created by PhpStorm.
 * User: chendongnan
 * Date: 16/8/24
 * Time: 下午3:55
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model{
    protected $table = 'idp_order_log';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id' ,'order_id','log_detail','created_at','account'
    ];

}
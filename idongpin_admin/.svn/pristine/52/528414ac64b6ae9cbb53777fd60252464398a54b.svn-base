<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:29
 * Instruction: 发布订单表
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaunchOrder extends Model{
    use SoftDeletes;
    protected $table = 'idp_launch_order';

    protected $primaryKey = 'launch_order_id';

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'launch_order_id' ,'limit_time_from','limit_time_to', 'amount', 'oil_content','water_content','shelf_life',
        'per_weight','per_length','madein',
        'launch_order_name',
        'launch_order_detail',
        'user_id', 'review_status', 'review_time', 'review_account'
    ];

}
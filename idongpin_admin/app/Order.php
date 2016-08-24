<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:29
 * Instruction: 产品订单表
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model{
    use SoftDeletes;
    protected $table = 'idp_order';
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'varchar';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'order_id', 'launch_order_id', 'launch_tg_id', 'company_id', 'pro_id', 'order_user_id', 'order_time',
        'pay_time',
        'confirm_time', 'send_time','freight',
        'finish_time', 'order_status','unit_price', 'amount', 'qty', 'inventory_id', 'address', 'pay_method',
        'pay_amount',
        'price_unit','freight_type','qty_unit','receipt_person_phone','receipt_person','arrival_date',
        'pay_id','canceled_at'
    ];

}
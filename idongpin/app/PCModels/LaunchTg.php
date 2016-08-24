<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:29
 * Instruction: 发布团购表
 */

namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;

class Launch_Tg extends Model{
    protected $table = 'idp_launch_tg';
    protected $primaryKey = 'tg_id';
    public $incrementing = false;
    protected $keyType = 'varchar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'tg_id' ,'tg_company_id', 'tg_pro_id', 'limit_up_amount', 'limit_down_amount', 'review_status',
        'review_time', 'review_account'
    ];

}
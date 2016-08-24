<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:27
 * Instruction: 商品主数据表
 */

namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model{
    protected $table = 'idp_brand';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'type_name' ,'brand_name', 'brand_text',
    ];

}
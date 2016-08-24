<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 11:23
 * Instruction: 商品表
 */
namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    protected $table = 'idp_pro';
    protected $primaryKey = 'pro_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'pro_id' ,'company_id',
    ];

}
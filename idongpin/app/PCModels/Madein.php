<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:29
 * Instruction: 原产地主数据表
 */

namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;

class Madein extends Model{
    protected $table = 'idp_madein';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'type_name' ,'madein_name', 'madein_text'
    ];

}
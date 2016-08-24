<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:29
 * Instruction: 菜单导航表
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model{
    protected $table = 'idp_navigation';
    protected $primaryKey = 'type_id';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'type_id' ,'type_par_id', 'type_name', 'type_desc'
    ];

}
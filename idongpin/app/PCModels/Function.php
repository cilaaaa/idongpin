<?php
/**
 * Created by PhpStorm.
 * User: user88
 * Date: 2016/6/27
 * Time: 13:28
 */

namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model{
    protected $table = 'idp_usertype';
    protected $primaryKey = 'value';
    public $incrementing = false;
    protected $keyType = 'varchar';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'value' ,'text',
    ];

}
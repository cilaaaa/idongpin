<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:28
 * Instruction: 冻品行业资讯表
 */

namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;

class DpNews extends Model{
    protected $table = 'idp_dpnews';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id' ,'news_title', 'news_date', 'news_content'
    ];

}
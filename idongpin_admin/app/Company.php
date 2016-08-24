<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/27
 * Time: 13:27
 * Instruction: 企业主数据表
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model{
    use SoftDeletes;

    protected $table = 'idp_company';
    protected $primaryKey = 'company_id';
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'company_id', 'company_type', 'company_name', 'company_address', 'company_major', 'company_product', 'advanced',
        'recommendation', 'company_desc', 'establishment_date', 'registered_capital', 'company_linkman','company_phone',
        'company_mobile', 'company_linkman_extend', 'company_address_map'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'company_id');
    }

}
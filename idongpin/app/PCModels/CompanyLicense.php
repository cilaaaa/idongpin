<?php
/**
 * Created by PhpStorm.
 * User: chendongnan
 * Date: 16/8/12
 * Time: 下午4:11
 */

namespace App\PCModels;

use Illuminate\Database\Eloquent\Model;

class CompanyLicense extends Model{
    protected $table = 'idp_company_license';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'company_id' ,'registered_capital', 'license_id', 'registration_authority', 'business_term'
        ,'business_scope','registered_address','founded_date','legal_representative','scope_of_business',
        'annual_inspection'
    ];

}
<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/29
 * Time: 10:05
 */

namespace App\Http\Controllers\Product;

use App\PCModels\Brand;
use App\PCModels\Company;
use App\PCModels\CompanyLicense;
use App\PCModels\Madein;
use App\PCModels\Product;
use App\PCModels\ProProperty;
use App\PCModels\ProPrice;
use App\PCModels\ProPropertyFields;
use App\PCModels\Navigation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    //定义商品字段名

    protected $pro_brand = 'pro_provider';
    protected $pro_madein = 'pro_place';
    protected $pro_type_id = 'pro_type_id';
    protected $pro_price = 'pro_unitPrice';
    protected $img_host = 'http://image.idongpin.com.cn/';

    //获取商铺信息
    private function company_info($request){
        $company = Company::where('company_id',$request->companyid)->first();
        if($company){
            $company_logo_path = Storage::files('upload/company/'.$request->companyid.'/logo/');
            if(count($company_logo_path)>0){
                $company['logo'] = $this->img_host.$company_logo_path[0];
            }else{
                $company['logo'] = "";
            }
            $pro_types_arr = array();
            $product_ids = Product::where('company_id',$company->company_id)
                ->get();
            foreach ($product_ids as $k2 => $product_id) {
                $productArray = ProProperty::where('pro_id', $product_id->pro_id)->get();
                foreach ($productArray as $item){
                    if($item->property_name=="pro_type_id"){
                        $pro_types_arr[$k2] = $item->property_value;
                    }
                }
            }
            $pro_types_arr = array_count_values($pro_types_arr);
            $pro_types = array();
            foreach ($pro_types_arr as $type => $count){
                $pro_types[] = array('type_id'=>$type,'type_name'=>Navigation::where('type_id',$type)->first()->type_name,'type_count'=>$count);
            }
            return array($company,$pro_types);
        }else{
            return array();
        }
    }

    //获取子类信息
    private function getSubType($par_id){
        $TypeArray = Navigation::where('type_par_id',$par_id)->orderBy('type_id','asc')->get();
        $Type = array();
        foreach ($TypeArray as $key => $type){
            $Type[$key]['type_id'] = $type->type_id;
            $Type[$key]['type_name'] = $type->type_name;
            if(count($this->getSubType($type->type_id))>0){
                $Type[$key]['subtypes'] = $this->getSubType($type->type_id);
            }
        }

        return $Type;
    }

    //获取图片数组
    private function getImgArr($url){
        $paths = Storage::files($url);
        $image_arr = array();
        foreach ($paths as $k => $path){
            $image_arr[$k] = $this->img_host.$path;
        }
        return $image_arr;
    }

    //商品搜索视图
    public function search(Request $request){
        $Type = $this->getSubType(0);
        //判断搜索类型
        if(isset($request->searchType)){
            //搜索商品
            if($request->searchType=='product'){
                //判断是否有关键字
                if(isset($request->keyword)){
                    $product_ids = ProProperty::where('property_name','pro_name')->where('property_value','like','%'.$request->keyword.'%')->get();
                }else{
                    $product_ids = ProProperty::where('property_name','pro_name')->get();
                }
                //筛选大类
                $protype = Navigation::where('type_par_id',0)->get();
                if(isset($request->protype)){
                    $this_protype = Navigation::where('type_id',$request->protype)->first();
                    $brands = Brand::all();
                    $madeins = Madein::all();
                    $subtypes = Navigation::where('type_par_id',$this_protype->type_id)->get();
                    $prices = ProPrice::where('type_name',$this_protype->type_name)->get();
                }else{
                    $brands = Brand::all();
                    $madeins = Madein::all();
                    $subtypes = Navigation::where('type_par_id','>',0)->get();
                    $prices = ProPrice::all()->unique('price_from');
                }
                //返回筛选条件数组
                $group = array('brands'=>$brands,'madins'=>$madeins,'protype'=>$protype,'subtypes'=>$subtypes,'prices'=>$prices);

                //获取商品
                $products = array();
                foreach ($product_ids as $key => $product_id){
                    $products[$key]['pro_id'] = $product_id->pro_id;
                    $products[$key]['company_id'] = Product::where('pro_id',$product_id->pro_id)->first()->company_id;
                    $products_info = ProProperty::selectRaw('property_name,property_value')
                        ->where('pro_id',$product_id->pro_id)
                        ->get();
                    foreach ($products_info as $value){
                        if($value->property_name == 'pro_place'){
                            $products[$key]['product_info'][$value->property_name] =
                                Madein::where('madein_name',$value->property_value)->first()->madein_text;
                        }else{
                            $products[$key]['product_info'][$value->property_name] = $value->property_value;
                        }
                    }
                    $proimg_arr = $this->getImgArr('upload/proimg/'.$products[$key]['company_id'].'_'.$product_id->pro_id.'/');
                    if(count($proimg_arr)>0){
                        $products[$key]['product_info']['pro_img'] = $proimg_arr[0];
                    }else{
                        $products[$key]['product_info']['pro_img'] = "";
                    }
                    if(!isset($products[$key]['product_info'][$this->pro_price])){
                        $products[$key]['product_info'][$this->pro_price] = 0;
                    }
                    //开始筛选数据
                    $excepted = 0;
                    //筛选大类
                    if (isset($request->protype)){
                        $subtypeidArr = Navigation::selectRaw('type_id')->where('type_par_id',$request->protype)->get();
                        $subtypeids = array();
                        foreach ($subtypeidArr as $k => $subtypeid){
                            $subtypeids[$k] = $subtypeid->type_id;
                        }
                        $subtypeids[count($subtypeids)] = $request->protype;
                        if (!in_array($products[$key]['product_info'][$this->pro_type_id],$subtypeids)){
                            $products = array_except($products,$key);
                            $excepted = 1;
                        }
                    }
                    //筛选品牌
                    if($excepted==0){
                        if (isset($request->brand)){
                            if(str_contains($request->brand,';')){
                                $brandFlag = 0;
                                $brandArr = explode(';',$request->brand);
                                foreach ($brandArr as $v){
                                    $brand = Brand::where('brand_name',$v)->first()->brand_text;
                                    if ($products[$key]['product_info'][$this->pro_brand] != $brand){
                                        $brandFlag =1;
                                    }
                                }
                                if($excepted==0&&$brandFlag==0){
                                    $products = array_except($products,$key);
                                    $excepted = 1;
                                }
                            }else{
                                $brand = Brand::where('brand_name',$request->brand)->first()->brand_text;
                                if (isset($products[$key]['product_info'][$this->pro_brand])){
                                    if($products[$key]['product_info'][$this->pro_brand] != $brand){
                                        $products = array_except($products,$key);
                                        $excepted = 1;
                                    }
                                }else{
                                    $products = array_except($products,$key);
                                    $excepted = 1;
                                }
                            }
                        }
                    }
                    //筛选产地
                    if($excepted==0){
                        if (isset($request->madein)){
                            if(str_contains($request->madein,';')){
                                $madeinFlag = 0;
                                $madeinArr = explode(';',$request->madein);
                                foreach ($madeinArr as $v){
                                    if ($products[$key]['product_info'][$this->pro_madein] != $v){
                                        $madeinFlag =1;
                                    }
                                }
                                if($excepted==0&&$madeinFlag==0){
                                    $products = array_except($products,$key);
                                    $excepted = 1;
                                }
                            }else{
                                if ($products[$key]['product_info'][$this->pro_madein] !=
                                    Madein::where('madein_name',$request->madein)->first()->madein_text){
                                    $products = array_except($products,$key);
                                    $excepted = 1;
                                }
                            }
                        }
                    }
                    //筛选子类
                    if($excepted==0){
                        if (isset($request->subtype)){
                            if(str_contains($request->subtype,';')){
                                $subtypeFlag = 0;
                                $subtypeArr = explode(';',$request->subtype);
                                foreach ($subtypeArr as $v){
                                    if ($products[$key]['product_info'][$this->pro_type_id]==$v){
                                        $subtypeFlag =1;
                                    }
                                }
                                if($excepted==0&&$subtypeFlag==0){
                                    $products = array_except($products,$key);
                                    $excepted = 1;
                                }
                            }else{
                                if ($products[$key]['product_info'][$this->pro_type_id]!=$request->subtype){
                                    $products = array_except($products,$key);
                                    $excepted = 1;
                                }
                            }
                        }
                    }
                    //筛选价格段
                    if($excepted==0){
                        if (isset($request->price_from)&&isset($request->price_to)){
                            if(str_contains($request->subtype,';')){
                                $priceFlag = 0;
                                $priceFromArr = explode(';',$request->price_from);
                                $priceToArr = explode(';',$request->price_to);
                                foreach ($priceFromArr as $k => $v){
                                    if ($products[$key]['product_info'][$this->pro_price]>=$v&&
                                        $products[$key]['product_info'][$this->pro_price]<=$priceToArr[$k]){
                                        $priceFlag = 1;
                                    }
                                }
                                if($excepted==0&&$priceFlag==0){
                                    $products = array_except($products,$key);
                                }
                            }else{
                                if ($products[$key]['product_info'][$this->pro_price]<=$request->price_from||
                                    $products[$key]['product_info'][$this->pro_price]>=$request->price_to){
                                    $products = array_except($products,$key);
                                }
                            }
                        }
                    }
                }
                //进行排序
                if(isset($request->sortby)){
                    if(isset($request->orderby)){
                        if($request->sortby=='price'){
                            if($request->orderby=='desc'){
                                $products = Collection::make($products)->sortBy(function($product){
                                    return $product['product_info'][$this->pro_price];
                                },SORT_REGULAR,true)->all();
                            }else{
                                $products = Collection::make($products)->sortBy(function($product){
                                    return $product['product_info'][$this->pro_price];
                                },SORT_REGULAR,false)->all();
                            }
                        }else{

                        }
                    }
                }
                if(count($products) == 0){
                    $page_number = 1;
                }else{
                    $page_number = ceil(count($products) / 20 );
                }
                if(isset($request->page)&&is_int((int)$request->page)){
                    $products = array_slice($products,((int)$request->page-1)*20,20);
                }else{
                    $products = array_slice($products,0,20);
                }
                return view('product/index',['products'=>$products,'types'=>$Type,'group'=>$group,'page_number'=>$page_number]);
            }else{
                //搜索商铺
                if(isset($request->keyword)){
                    $companies = Company::where('company_name','like','%'.$request->keyword.'%')->get();
                }else{
                    $companies = Company::all();
                }
                foreach ($companies as $k => $company){
                    $products = array();
                    $product_ids = Product::where('company_id',$company->company_id)
                        ->take(3)
                        ->get();
                    foreach ($product_ids as $k2 => $product_id){
                        $productArray = ProProperty::where('pro_id',$product_id->pro_id)->get();
                        $prodetail = array();
                        $prodetail['pro_id'] = $product_id->pro_id;
                        foreach ($productArray as $item){
                            if($item->property_name=="pro_name"){
                                $prodetail['pro_name'] = $item->property_value;
                            }else if($item->property_name=="proinfo_packing"){
                                $prodetail['pro_packing'] = $item->property_value;
                            }else if($item->property_name=="pro_place"){
                                $prodetail['pro_place'] = $item->property_value;
                            }else if($item->property_name=="pro_unitPrice"){
                                $prodetail['pro_unitPrice'] = $item->property_value;
                            }else if($item->property_name=="wholesale_unit"){
                                $prodetail['wholesale_unit'] = $item->property_value;
                            }
                        }
//                        $prodetail['pro_price'] = Inventory::where('pro_id',$product_id->pro_id)->min('wholesale_price');
                        $proImg_arr = $this->getImgArr('upload/proimg/'.$product_id->company_id.'_'.$product_id->pro_id.'/');
                        if(count($proImg_arr)>0){
                            $prodetail['pro_img'] = $proImg_arr[0];
                        }else{
                            $prodetail['pro_img'] = "";
                        }
                        $products[$k2] = $prodetail;
                    }
                    $companies[$k]['products'] = $products;
                }
                $companies =  json_decode( json_encode( $companies),true);
                if(count($companies) == 0){
                    $page_number = 1;
                }else{
                    $page_number = ceil(count($companies) / 10 );
                }
                if(isset($request->page)&&is_int((int)$request->page)){
                    $companies = array_slice($companies,((int)$request->page-1)*10,10);
                }else{
                    $companies = array_slice($companies,0,10);
                }
                return view('product/oviStore',['companies'=>$companies,'page_number'=>$page_number]);
            }
        }
    }

    //商品详情视图
    public function getProduct(Request $request){
        $companyinfo_arr = $this->company_info($request);
        if(!empty($companyinfo_arr)){
            $prodectArr = ProProperty::where('pro_id',$request->proid)->get();
            $proDetail = array();
            foreach ($prodectArr as $k => $item){
                $property_array['property_value'] = $item->property_value;
                $property_array['property_text'] = ProPropertyFields::where('property_name',$item->property_name)->first()->property_text;
                if(starts_with($item->property_name,'proinfo')){
                    $proDetail['pro_info'][$item->property_name] = $property_array;
                }else if(starts_with($item->property_name,'import')){
                    $proDetail['pro_import_info'][$item->property_name] = $property_array;
                }else {
                    if($item->property_name=="pro_type_id"){
                        $pro_type = Navigation::where('type_id',$item->property_value)->first()->type_name;
                        $proDetail['pro_detail_info']['pro_type'] = array('property_value'=>$pro_type,'property_text'=>$property_array['property_text']);
                    }else if($item->property_name == 'pro_place'){
                        $pro_place = Madein::where('madein_name',$item->property_value)->first()->madein_text;
                        $proDetail['pro_detail_info']['pro_type'] = array('property_value'=>$pro_place,
                            'property_text'=>$property_array['property_text']);

                    }else{
                        $proDetail['pro_detail_info'][$item->property_name] = $property_array;
                    }
                }
            }
            $images['pro_img'] = $this->getImgArr('upload/proimg/'.$request->companyid.'_'.$request->proid.'/');
            $images['prodetail_img'] = $this->getImgArr('upload/prodetail/'.$request->companyid.'_'.$request->proid.'/');
            $images['import_img'] = $this->getImgArr('upload/import/'.$request->companyid.'_'.$request->proid.'/');
            return view('product/productDetail',['company'=>$companyinfo_arr[0],'prodetail'=>$proDetail,'images'=>$images,'pro_types'=>$companyinfo_arr[1]]);
        }else{
            echo "查无此商铺";
        }
    }

    //商铺首页视图
    public function company(Request $request){
        $companyinfo_arr = $this->company_info($request);
        if(!empty($companyinfo_arr)){
            $companyinfo_arr[0]['images'] = $this->getImgArr('upload/company/'.$request->companyid.'/');
            $products = array();
            $product_ids = Product::where('company_id',$companyinfo_arr[0]->company_id)->get();
            foreach ($product_ids as $k2 => $product_id){
                $productArray = ProProperty::where('pro_id',$product_id->pro_id)->get();
                $prodetail = array();
                $prodetail['pro_id'] = $product_id->pro_id;
                foreach ($productArray as $item){
                    if($item->property_name=="pro_type_id"){
                        $pro_type = Navigation::where('type_id',$item->property_value)->first()->type_name;
                        $prodetail[$item->property_name] = $pro_type;
                    }else if($item->property_name == 'pro_place'){
                        $prodetail[$item->property_name] =
                            Madein::where('madein_name',$item->property_value)->first()->madein_text;
                    }else{
                        $prodetail[$item->property_name] = $item->property_value;
                    }
                }
                $proImg_arr = $this->getImgArr('upload/proimg/'.$product_id->company_id.'_'.$product_id->pro_id.'/');
                if(count($proImg_arr)>0){
                    $prodetail['pro_img'] = $proImg_arr[0];
                }else{
                    $prodetail['pro_img'] = "";
                }
                $products[$k2] = $prodetail;
            }
            if(isset($request->sortby)){
                if(isset($request->orderby)){
                    if($request->sortby=='price'){
                        if($request->orderby=='desc'){
                            $products = Collection::make($products)->sortBy(function($product){
                                return $product[$this->pro_price];
                            },SORT_REGULAR,true)->all();
                        }else{
                            $products = Collection::make($products)->sortBy(function($product){
                                return $product[$this->pro_price];
                            },SORT_REGULAR,false)->all();
                        }
                    }else{

                    }
                }
            }

            if(count($products) == 0){
                $page_number = 1;
            }else{
                $page_number = ceil(count($products) / 20 );
            }
            if(isset($request->page)&&is_int((int)$request->page)){
                $products = array_slice($products,((int)$request->page-1)*20,20);
            }else{
                $products = array_slice($products,0,20);
            }
            return view('product/commercialTenant',['company'=>$companyinfo_arr[0],'company_pro'=>$products,'pro_types'=>$companyinfo_arr[1],'page_number'=>$page_number]);
        }else{
            echo "查无此商铺";
        }
    }

    //商铺介绍视图
    public function companyIntroduce(Request $request){
        $companyinfo_arr = $this->company_info($request);
        $companyinfo_arr[0]['certificates'] = $this->getImgArr('upload/company/'.$request->companyid.'/certificate/');
        $license = CompanyLicense::where('company_id',$request->companyid)->first();
        return view('product/aboutCompany',['company'=>$companyinfo_arr[0],'pro_types'=>$companyinfo_arr[1],
            'license'=>$license]);
    }

    //商铺产品供应视图
    public function companySupply(Request $request){
        $companyinfo_arr = $this->company_info($request);

        $products = array();
        $pro_types_arr = array();
        $product_ids = Product::where('company_id',$companyinfo_arr[0]->company_id)
            ->get();
        foreach ($product_ids as $k2 => $product_id){
            $productArray = ProProperty::where('pro_id',$product_id->pro_id)->get();
            $prodetail = array();
            $prodetail['pro_id'] = $product_id->pro_id;
            foreach ($productArray as $item){
                if($item->property_name=="pro_type_id"){
                    $pro_type = Navigation::where('type_id',$item->property_value)->first()->type_name;
                    $pro_types_arr[$k2] = $item->property_value;
                    $prodetail['type_name'] = $pro_type;
                    $prodetail['type_id'] = $item->property_value;
                }else if($item->property_name=="pro_place"){
                    $prodetail[$item->property_name] = Madein::where('madein_name',$item->property_value)->first()->madein_text;
                }else{
                    $prodetail[$item->property_name] = $item->property_value;
                }
            }
            $proImg_arrs = $this->getImgArr('upload/proimg/'.$product_id->company_id.'_'.$product_id->pro_id.'/');
            if(count($proImg_arrs)>0){
                $prodetail['pro_img'] = $proImg_arrs[0];
            }else{
                $prodetail['pro_img'] = "";
            }

            //商品筛选
            $excepted = 0;
            if(isset($request->keyword)&&$request->keyword!=""){
                if(!str_contains($prodetail['pro_name'],$request->keyword)){
                    $excepted = 1;
                }
            }
            if(isset($request->typeid)){
                if($prodetail['type_id']!=$request->typeid){
                    $excepted = 1;
                }
            }
            if($excepted == 0){
                $products[$k2] = $prodetail;
            }
        }

        if(isset($request->sortby)){
            if(isset($request->orderby)){
                if($request->sortby=='price'){
                    if($request->orderby=='desc'){
                        $products = Collection::make($products)->sortBy(function($product){
                            return isset($product[$this->pro_price])?$product[$this->pro_price]:"";
                        },SORT_REGULAR,true)->all();
                    }else{
                        $products = Collection::make($products)->sortBy(function($product){
                            return isset($product[$this->pro_price])?$product[$this->pro_price]:"";
                        },SORT_REGULAR,false)->all();
                    }
                }else{

                }
            }
        }
        $pro_types_arr = array_count_values($pro_types_arr);
        $pro_types = array();
        foreach ($pro_types_arr as $type => $count) {
            $pro_types[] = array('type_id' => $type, 'type_name' => Navigation::where('type_id', $type)->first()->type_name, 'type_count' => $count);
        }
        if(count($products) == 0){
            $page_number = 1;
        }else{
            $page_number = ceil(count($products) / 20 );
        }
        if(isset($request->page)&&is_int((int)$request->page)){
            $products = array_slice($products,((int)$request->page-1)*20,20);
        }else{
            $products = array_slice($products,0,20);
        }
        return view('product/supplyProducts',['company'=>$companyinfo_arr[0],'company_pro'=>$products,'pro_types'=>$pro_types,'page_number'=>$page_number]);
    }

    //商铺联系方式视图
    public function companyContact(Request $request){
        $companyinfo_arr = $this->company_info($request);
        return view('product/contactUs',['company'=>$companyinfo_arr[0],'pro_types'=>$companyinfo_arr[1]]);
    }
}
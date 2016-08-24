<?php

namespace App\Http\Controllers\Home;

use App\PCModels\SlideShow;
use App\PCModels\Product;
use App\PCModels\Inventory;
use App\PCModels\ProProperty;
use App\PCModels\ProPropertyFields;
use App\PCModels\Navigation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    protected $img_host = 'http://image.idongpin.com.cn/';

    private function getImgArr($url){
        $paths = Storage::files($url);
        $image_arr = array();
        foreach ($paths as $k => $path){
            $image_arr[$k] = $this->img_host.$path;
        }
        return $image_arr;
    }

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
    public function index()
    {
        //获取分类数组
        $Type = $this->getSubType(0);
        $products = array();
        $product_ids = Product::where('company_id',10032)->get();
        foreach ($product_ids as $key => $product_id){
            $products[$key]['pro_id'] = $product_id->pro_id;
            $products[$key]['company_id'] = $product_id->company_id;
            $products_info = ProProperty::selectRaw('property_name,property_value')
                ->where('pro_id',$product_id->pro_id)
                ->get();
            foreach ($products_info as $value){
                $products[$key]['product_info'][$value->property_name] = $value->property_value;
            }
//            $inventory = Inventory::selectRaw('wholesale_price,wholesale_unit,wholesale_amount,wholesale_price_extend')
//                ->where('pro_id',$product_id->pro_id)
//                ->where('wholesale_price',$inventory = Inventory::selectRaw('wholesale_price')
//                    ->where('pro_id',$product_id->pro_id)
//                    ->min('wholesale_price'))
//                ->first();
//            $products[$key]['product_info']['price'] = $inventory->wholesale_price?$inventory->wholesale_price:"";
//            $products[$key]['product_info']['unit'] = $inventory->wholesale_uni?$inventory->wholesale_uni:"";
//            $products[$key]['product_info']['amount'] = $inventory->wholesale_amount?$inventory->wholesale_amount:"";
//            $products[$key]['product_info']['price_extend'] = $inventory->wholesale_price_extend?$inventory->wholesale_price_extend:"";
            if(isset($products[$key]['product_info']['pro_type_id'])){
                $type_info = Navigation::where('type_id',$products[$key]['product_info']['pro_type_id'])->first();
                $products[$key]['product_info']['type_par_id'] = $type_info->type_par_id?$type_info->type_par_id:"";
                $products[$key]['product_info']['type_name'] = $type_info->type_name?$type_info->type_name:"";
            }
            $proimg_arr = $this->getImgArr('upload/proimg/'.$product_id->company_id.'_'.$product_id->pro_id.'/');
            if(count($proimg_arr)>0){
                $products[$key]['product_info']['pro_img'] = $proimg_arr[0];
            }else{
                $products[$key]['product_info']['pro_img'] = "";
            }

        }
        
        $ProPropertyFields = ProPropertyFields::all();
        $fields = array();
        foreach ($ProPropertyFields as $value2){
            $fields[$value2->property_name] = $value2->property_text;
        }
        $slidePics = SlideShow::all();
        return view('index/index',['types'=>$Type,'products'=>$products,'fields'=>$fields,'slidePics'=>$slidePics]);
    }
}
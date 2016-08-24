<?php

namespace App\Http\Controllers\Product;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Madein;
use App\Navigation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Validator;
use App\Company;
use App\Product;
use App\ProProperty;
use App\ProPropertyFields;


class ProductController extends Controller
{

    protected $Type;

    private function getPageNum($data,$per_page){
        if(count($data) == 0){
            $page_number = 1;
        }else{
            $page_number = ceil(count($data) / $per_page );
        }
        return $page_number;
    }

    public function index()
    {
        return view('admin/product/index');
    }

    public function product_list(Request $request)
    {
        if($request->user()->user_type == 'admin'){
            $companies = Company::all();
        }else if($request->user()->user_type == 'company'){
            $companies = Company::where('company_id',$request->user()->company_id)->get();
        }
        $pro_ids = Product::where('company_id', isset($request->companyid)
            ? $request->companyid : $companies[0]['company_id'])->get();
        $products = array();
        foreach ($pro_ids as $k => $pro_id) {
            $productsArr = ProProperty::where('pro_id', $pro_id->pro_id)
                ->whereIn('property_name', ['pro_name','pro_type_id','proinfo_desc'])
                ->get();
            foreach ($productsArr as $key => $value) {
                $products[$k][$value->property_name] = isset($value->property_value) ? $value->property_value : "";
                if($value->property_name == 'pro_type_id'){
                    $products[$k]['pro_type_name'] = Navigation::where('type_id',$value->property_value)->first()
                        ->type_name;
                }
                if(!isset($products[$k]['proinfo_desc'])) {
                    $products[$k]['proinfo_desc'] = '';
                }
                $products[$k]['proid'] = $pro_id->pro_id;
            }
            if (isset($request->keywords)&&$request->keywords!="") {
                if (!str_contains($products[$k]['pro_name'], $request->keywords) && !str_contains((string)
                    $pro_id->pro_id, $request->keywords) && !str_contains($products[$k]['pro_type_name'],
                        $request->keywords) ) {
                    $products = array_except($products,$k);
                }
            }
        }
        $page_number = $this->getPageNum($products,10);
        if (isset($request->page) && is_int((int)$request->page)) {
            $products = array_slice($products, ((int)$request->page - 1) * 10, 10);
        } else {
            $products = array_slice($products, 0, 10);
        }
        return view('admin/product/list', ['companies' => $companies, 'products' => $products, 'page_number' => $page_number]);
    }

    //获取子类信息
    private function getSubType($par_id){
        $TypeArray = Navigation::where('type_par_id',$par_id)->orderBy('type_id','asc')->get();
        foreach ($TypeArray as $key => $type){
            if(Navigation::where('type_par_id',$type->type_id)->count()>0){
                $this->getSubType($type->type_id);
            }else{
                $this->Type[] = array('type_id'=>$type->type_id,'type_name'=>$type->type_name);
            }
        }
    }

    public function addProView()
    {
        $fields = ProPropertyFields::all();
        $this->getSubType(0);
        $madein = Madein::all();
        return view('admin/product/add',['fields'=>$fields,'types'=>$this->Type,'madein'=>$madein]);
    }

    public function addPro(Request $request)
    {
        try {
            $pro = Product::create([
                'company_id' => $request->companyid
            ]);
        } catch (Exception $e) {
            return redirect()->to($this->getRedirectUrl())
                ->withErrors($e->getMessage(), $this->errorBag());
        }
        foreach ($request->all() as $k => $v) {
            if ($k != 'companyid' && $k != '_token') {
                ProProperty::create([
                    'property_name' => $k,
                    'pro_id' => $pro->pro_id,
                    'property_value' => $v
                ]);
            }
        }
        return redirect()->route('product::list');
    }

    public function product_info(Request $request)
    {
        if (isset($request->proid)) {
            $productArr = ProProperty::where('pro_id', $request->proid)->get();
            $product = array();
            foreach ($productArr as $key => $value) {
                $product[$key]['property_name'] = $value->property_name;
                $product[$key]['property_value'] = $value->property_value;
                $product[$key]['property_text'] = ProPropertyFields::where('property_name',$value->property_name)
                    ->first()->property_text;
            }
            $fields = ProPropertyFields::all();
            $this->getSubType(0);
            $madein = Madein::all();
            $brand = Brand::all();
            return view('admin/product/productDetail', ['fields'=>$fields,'product' => $product,'types'=>$this->Type,'brand'=>$brand,'madein'=>$madein]);
        } else {
            return redirect()->back();
        }
    }

    private function validatePro(array $data){
        return Validator::make($data,[
            'pro_name' => 'required',
            'pro_type_id' => 'required',
        ]);
    }

    public function product_update(Request $request){
        if(isset($request->do_method)){
            if($request->do_method == 'update'){
                $validator = $this->validatePro($request->all(),'update');
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                ProProperty::where('pro_id',$request->proid)->delete();
                foreach ($request->all() as $key => $value){
                    if($key != 'proid' && $key!= '_token' && $key!= 'do_method'){
                        ProProperty::create([
                            'property_name' => $key,
                            'pro_id' => $request->proid,
                            'property_value' => $value
                        ]);
                    }
                }
            }else if($request->do_method == 'del'){
                try{
                    ProProperty::where('pro_id',$request->proid)->delete();
                    Product::where('pro_id',$request->proid)->delete();
                }catch (Exception $e){
                    return new JsonResponse($e->getMessage(),422);
                }
                return new JsonResponse(array('msg'=>"success"),200);
            }
            return redirect()->route('product::item',array('proid'=>$request->proid));
        }else{
            return redirect()->back();
        }
    }

    public function getTypes(Request $request){
        $navigationArr = Navigation::where('type_par_id',$request->type_par_id)->get();
        $navigations = array();
        foreach($navigationArr as $key => $value){
            if(Navigation::where('type_par_id',$value->type_id)->count()>0){
                $navigations[$key]['type'] = 'folder';
            }else{
                $navigations[$key]['type'] = 'item';
            }
            $navigations[$key]['type_id'] = $value->type_id;
            $navigations[$key]['type_par_id'] = $value->type_par_id;
            $navigations[$key]['name'] = $value->type_name;
        }
        return new JsonResponse($navigations,200);
    }

    public function product_type(){
        return view('admin/product/navigation/index');
    }

    public function product_type_list(){
        return view('admin/product/navigation/navigation');
    }

    private function validateType(array $data){
        return Validator::make($data,[
            'type_name' => 'required',
        ]);
    }

    public function type_update(Request $request){
        if(isset($request->do_method)){
            if($request->do_method == 'add'){
                $validator = $this->validateType($request->all());
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                Navigation::create([
                    'type_name' => $request->type_name,
                    'type_par_id' => $request->type_par_id
                ]);
            }else if($request->do_method == 'update'){
                $validator = $this->validateType($request->all());
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                Navigation::where('type_id',$request->type_id)->update([
                    'type_name' => $request->type_name,
                ]);
            }else if($request->do_method == 'del'){
                $this->getSubType($request->type_id);
                $types[0] = $request->type_id;
                if(count($this->Type)>0){
                    foreach($this->Type as $k => $type){
                        $types[$k+1] = $type['type_id'];
                    }
                }
                if(ProProperty::where('property_name','pro_type_id')
                        ->whereIn('property_value',$types)->count() == 0){
                    Navigation::whereIn('type_id',$types)->delete();
                }else{
                    return redirect()->back()->withErrors(array('msg'=>'该类别被商品管理,不能被删除,请检查'));
                }
            }
            return redirect()->route('product::typelist');
        }else{
            return redirect()->back();
        }
    }

    public function product_field(){
        return view('admin/product/field/index');
    }

    public function product_field_list(Request $request){
        if(isset($request->keywords)){
            $fields = ProPropertyFields::where('property_text','like','%'.$request->keywords.'%')
                ->orWhere('property_name','like','%'.$request->keywords.'%')
                ->get();
        }else{
            $fields = ProPropertyFields::all();
        }
        $fields = json_decode(json_encode($fields));
        $page_number = $this->getPageNum($fields,10);
        if (isset($request->page) && is_int((int)$request->page)) {
            $fields = array_slice($fields, ((int)$request->page - 1) * 10, 10);
        } else {
            $fields = array_slice($fields, 0, 10);
        }
        return view('admin/product/field/field',['fields'=>$fields,'page_number'=>$page_number]);
    }

    private function validateField(array $data,$option){
        if($option == 'add'){
            return Validator::make($data,[
                'property_text' => 'required',
                'property_name' => 'required|unique:idp_pro_property_fields',
            ]);
        }else if($option == 'update'){
            return Validator::make($data,[
                'property_text' => 'required',
                'property_name' => 'required',
            ]);
        }
    }

    public function field_update(Request $request){
        if(isset($request->do_method)){
            if($request->do_method == 'add'){
                $validator = $this->validateField($request->all(),'add');
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                ProPropertyFields::create([
                    'property_text' => $request->property_text,
                    'property_name' => $request->property_name
                ]);
            }else if($request->do_method == 'update'){
                $validator = $this->validateField($request->all(),'update');
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                ProPropertyFields::where('id',$request->fieldid)->update([
                    'property_text' => $request->property_text,
                    'property_name' => $request->property_name
                ]);
            }else if($request->do_method == 'del'){
                if(ProProperty::where('property_name',
                    ProPropertyFields::where('id',$request->fieldid)
                    ->first()
                    ->property_name)->count()==0){
                    ProPropertyFields::where('id',$request->fieldid)->delete();
                }else{
                    return redirect()->back()->withErrors(array('msg'=>'该属性被商品管理,不能被删除,请检查'));
                }
            }
            return redirect()->route('product::fieldlist');
        }else{
            return redirect()->back();
        }
    }

    public function product_madein(){
        return view('admin/product/madein/index');
    }

    public function product_madein_list(Request $request){
        $madein = Madein::all();
        $madein = json_decode(json_encode($madein));
        $page_number = $this->getPageNum($madein,10);
        if (isset($request->page) && is_int((int)$request->page)) {
            $madein = array_slice($madein, ((int)$request->page - 1) * 10, 10);
        } else {
            $madein = array_slice($madein, 0, 10);
        }
        return view('admin/product/madein/madein',['madein'=>$madein,'page_number'=>$page_number]);
    }

    private function validateMadein(array $data){
        return Validator::make($data,[
            'madein_name' => 'required',
            'madein_text' => 'required'
        ]);
    }

    public function madein_update(Request $request){
        if(isset($request->do_method)){
            if($request->do_method == 'add'){
                $validator = $this->validateMadein($request->all());
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                Madein::create([
                    'madein_name' => $request->madein_name,
                    'madein_text' => $request->madein_text
                ]);
            }else if($request->do_method == 'update'){
                $validator = $this->validateMadein($request->all());
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                Madein::where('id',$request->madeinid)->update([
                    'madein_name' => $request->madein_name,
                    'madein_text' => $request->madein_text
                ]);
            }else if($request->do_method == 'del'){
                if(ProProperty::where('property_name','pro_place')
                    ->where('property_value',Madein::where('id',$request->madeinid)->first()->madein_name)
                    ->count()==0){
                    Madein::where('id',$request->madeinid)->delete();
                }else{
                    return redirect()->back()->withErrors(array('msg'=>'该产地被商品管理,不能被删除,请检查'));
                }
            }
            return redirect()->route('product::madeinlist');
        }else{
            return redirect()->back();
        }
    }
}

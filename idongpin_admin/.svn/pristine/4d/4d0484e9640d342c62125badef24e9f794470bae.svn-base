<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;
use App\Company;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index()
    {
        return view('admin/company/index');
    }

    public function company_list()
    {
        $companies = Company::selectRaw('company_id,company_name,company_linkman,company_mobile')->paginate(10);
        return view('admin/company/list', ['companies' => $companies]);
    }

    public function company_info(Request $request)
    {
        if (isset($request->companyid)) {
            $company = Company::where('company_id', $request->companyid)->first();
            return view('admin/company/companyDetail', ['company' => $company]);
        } else {
            return redirect()->back();
        }
    }

    private function validateCompanyinfo(array $data)
    {
        return Validator::make($data, [
            'company_name' => 'required',
        ]);

    }

    public function update(Request $request)
    {
        if ($request->companyid) {
            if ($request->do_method == "update") {
                $info_arr = json_decode($request->companyinfo, true);
                $validator = $this->validateCompanyinfo($info_arr);
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                try {
                    Company::where('company_id', $request->companyid)->update($info_arr);
                    return new JsonResponse(array('msg' => 'success'), 200);
                } catch (Exception $e) {
                    return new JsonResponse($e->getMessage(), 400);
                }
            } else if ($request->do_method == 'del') {
                try {
                    Company::where('company_id', $request->companyid)->delete();
                    return new JsonResponse(array('msg' => 'success'), 200);
                } catch (Exception $e) {
                    return new JsonResponse($e->getMessage(), 400);
                }
            } else {
                $error['msg'] = '缺少参数';
                return new JsonResponse($error, 400);
            }
        } else {
            $error['msg'] = '缺少参数';
            return new JsonResponse($error, 400);
        }
    }
}

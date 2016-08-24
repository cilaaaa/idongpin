<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\PCModels\User;
use App\Http\Models\PhoneMessage;
use Validator;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    use PhoneMessage;
    //重置密码视图
    public function showResetView(){
        return view('auth/passwords/reset');
    }

    //获取重置验证码
    public function getResetCode(Request $request){
        $validator = $this->validatorPhone($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        if(User::where('user_phone',$request->phone)->count()==0){
            $errors['msg'] = '不存在该手机号';
            return new JsonResponse($errors, 422);
        }else{
            $user = User::where('user_phone',$request->phone)->first();
            if(time()<(strtotime($user->code_create_time)+60)) {
                $time = strtotime($user->code_create_time)-time()+60;
                $errors['msg'] = '请在' . $time . '秒后重新获取验证码';
                return new JsonResponse($errors, 422);
            }else{
                $code = rand(100000,999999);
                User::where('user_phone',$request->phone)->update([
                    'code' => $code,
                    'code_create_time' => date("Y-m-d H:i:s"),
                    'code_type'  => '重置'
                ]);
            }
        }
        $result = $this->sendPhoneMessageByModule($request->phone,1451629,$code);
        if($result['code']==0){
            $success['status'] = 200;
            return new JsonResponse($success, 200);
        }else{
            $errors['msg'] = $result['msg'];
            return new JsonResponse($errors, 422);
        }
    }

    protected function validatorPhone(array $data)
    {
        $data['user_phone'] = $data['phone'];
        return Validator::make($data, [
            'user_phone' => array( 'required','min:11','regex:/^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$/'),
        ]);
    }

    public function reset(Request $request){
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        if(User::where('user_phone',$request->phone)->count()==1){
            $user = User::where('user_phone',$request->phone)->first();
            if(time()<(strtotime($user->code_create_time)+900)){
                if($user->code==$request->code && $user->code_type=='重置'){
                    Auth::guard($this->getGuard())->login($this->update($request->all()));

                    return redirect($this->redirectPath());
                }
            }
        }else{
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors([
                    'phone' => "该用户不存在",
                ]);
        }
        return redirect()->back()
            ->withInput($request->input())
            ->withErrors([
                'code' => "验证码错误",
            ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => array( 'required','min:11','regex:/^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$/'),
            'password' => 'required|min:6|confirmed',
            'code' => 'required|min:6',
        ]);
    }

    protected function update(array $data)
    {
        User::where('user_phone', $data['phone'])->update([
            'password' => bcrypt($data['password']),
            'code' => '',
            'code_type' => ''
        ]);
        return User::where('user_phone', $data['phone'])->first();
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }

    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }
}

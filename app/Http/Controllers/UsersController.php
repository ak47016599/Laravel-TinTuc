<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\userDemo;
use App\Theloai;
use App\TinTuc;
class UsersController extends Controller
{
    //
     public function getDanhSach(){
         $users = userDemo::paginate(5);
         return (view('admin.user.users', ['users' => $users]));
     }
     public function getThem(){
        return (view('admin.user.themuser'));
     }
     public function possThem(Request $request){

         $this->validate($request, [
              'username' => 'required|min:10|max:60',
              'email' => 'required|unique:users,email',
              'password' => 'required|min:7|max:18',
              'password_repeat' => 'required'
         ],[
             'email.required' => 'email không được để trống',
             'email.unique' => 'email đã có người sử dụng',
              'username.required' => 'Tên người dùng không được để trống',
              'username.min' => 'Tên người dùng phải từ 10 đến 60 ký tự',
              'username.max' => 'Tên người dùng phải từ 10 đến 60 ký tự',
              'password.required' => 'Mật khẩu không được để trống',
              'password.min' => 'Mật khẩu phải từ 7 đến 18 ký tự',
              'password.max' => 'Mật khẩu phải từ 7 đến 18 ký tự',
              'password_repeat.required' => 'Mật khẩu nhập lại không được để trống'
         ]);

         $user = new userDemo;
         $user->name = $request->username;
         $user->email = $request->email;
         $user->password =  bcrypt($request->password);
         $user->lever = $request->lever;
         $user->remember_token = 'Ghi chu';
         $user->image = 'default-user.png';
         $user->save();
         return redirect('admin/users/them')->with('thongbao', 'Thêm người dùng thành công');
     }
     public function getXoa($id){
         //echo "Xóa người dùng với id = $id";
        // $user = userDemo::find($id)->delete();
        $user = userDemo::find($id);
        $name = $user->name;
        $user = userDemo::find($id)->delete();
        return redirect('admin/users/danhsach')->with('thongbao', 'Xóa '.$name.' thanh cong');
     }
     public function getAdminLogin(){
         return( view('admin.login'));
     }
     public function postAdminLogin(Request $request){
         $email = $request->email;
         $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
           // echo 'Login thanh cong';
           return(redirect('admin/theloai/danhsach'));
        } else {
            return(redirect('admin/dangnhap')->with('thongbao', true));
        }
     }
     public function getAdminLogout(){
         Auth::logout();
         return (redirect('admin/dangnhap'));
     }
     public function returnForm(){
        // $route = "{{ action('SchoolController@getSchool') }}" ;
       echo ' <div class="center">

        <i class="fa fa-close"></i>
  <center>    <h2 class="title-form-h2-resign">Đăng Ký</h2></center>
        <form name="myResinger"  onsubmit="return validateForm1()" action="" method="get">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <img class = "image-form" src = "https://cdn.iconscout.com/icon/premium/png-256-thumb/username-1081622.png" width = "35" height = "35">
                <input  value = "" id="RgUser" type="text" class="form-control"  placeholder="Enter User Name" name="username">
              </div>
              <span id ="userError">* Bắt buộc nhập </span>
              <div id = "username" class="form-group">
                <img class = "image-form" src = "https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-and-shapes-3/177800/129-512.png" width = "35" height = "35">
                <input  value = "" id="RgEmail" autocomplete = "off" type="email" class="form-control"  placeholder="Enter Email" name="email">
              </div>
            <span id ="emailError">* Bắt buộc nhập </span>
            <div style = "clear : both"> </div>
            <div id = "password" class="form-group">
            <img class = "image-form" src = "https://capitalise.com/public/lock_icon_for-blog.png" width = "35" height = "35">
              <input id="RgPassword"  type="password" class="form-control"  placeholder="Enter password" name="password">
            </div>
            <div style = "clear : both"> </div>
            <span id = "passError">* Bắt buộc nhập </span>
            <div id = "username" class="form-group">
                <img class = "image-form" src = "http://cdn.onlinewebfonts.com/svg/img_398183.png" width = "35" height = "35">
                <input  id = "RgPasswordAgain"  value = "" autocomplete = "off" type="password" class="form-control" placeholder="Enter Password Again">
              </div>
              <span id ="erro">* Bắt buộc nhập </span>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" value = "1"> Remember me
              </label>
            </div>

            <button type="submit" class="btn btn-danger">Đăng Ký</button>
          </form>


    </div> ';



     }
     public function resignForm(Request $request){
        // echo $request->username;
        $email = $request->email;
        $password = $request->password;
         $user = new userDemo;
         $user->name = $request->username;
         $user->email = $request->email;
         $user->password =  bcrypt($request->password);
         $user->lever = 0;
         $user->provider = 'dantri';
         $user->provider_id = 0;
         $user->remember_token = 'Ghi chu';
         $user->image = 'default-user.png';
         $user->save();
         if(Auth::attempt(['email' => $email, 'password' => $password])){
            if(session()->has('login_user')){
                session()->forget('login_user');
            }
               session()->put('login_user' ,Auth::user());
               session()->save();
            return (redirect('tintuc/post'));
         }

     }
     public function ajaxRequest(Request $request){
          $username = $request->name;
          $password = $request->password;
          $email = $request->email;

       $countName = userDemo::where('email', $email)->get();
       if(count($countName) != 0){
        $array = ['stater'=>'error',
        'email'=>'* Email đã có người sử dụng',
       ];
        return (response()->json($array));
       }else {
        $user = new userDemo;
        $user->name =  $username;
        $user->email = $request->email;
        $user->password =  bcrypt($request->password);
        $user->lever = 0;
        $user->provider = 'dantri';
        $user->provider_id = 0;
        $user->remember_token = 'Ghi chu';
        $user->image = 'default-user.png';
        $user->save();
        if(Auth::attempt(['email' => $email, 'password' => $password])){
           if(session()->has('login_user')){
               session()->forget('login_user');
           }
              session()->put('login_user' ,Auth::user());
              session()->save();
        }
        $array = ['stater'=>'success'
       ];
        return (response()->json($array));
       }
     }
     public function getChange(){
        $theloaiAll = Theloai::all();
        $theloai = Theloai::all();
           return view('post.change', ['theloai' => $theloai,
           'theloaiAll' => $theloaiAll]);
     }
     public function CheckFile($file){
        $Errors = array();
        $nameFile = $file->getClientOriginalName('file_image');
        $nameType = $file->getClientOriginalExtension('file_image');
        $FileBites = $file->getClientSize('file_image');
        $valueTypes = array('jpg', 'png', 'jpeg', 'bmp');
        if(!in_array($nameType,$valueTypes)){
             $Errors[] = "* file '.$nameFile .' không đúng với định dạng hình ảnh";
        }
        if($FileBites > (8 * 1024 * 1024)){
            $Errors[] = "* file '.$nameFile.' vượt quá dung lượng cho phép";
        }
       return ($Errors);
    }
     public function postChange(Request $request){
         $id = session('login_user')->id ;
         $userChangeInfor = userDemo::find($id);
        $imageDelete = $userChangeInfor->image;
           // var_dump($request->myFile); die();
       /*  echo "Name : $request->username <br/>";
         echo "Email : $request->email <br/>";
         echo "Password : $request->password <br/>";
         echo "New Password : $request->newPassword"; */
         if($request->hasFile('myFile')){
             $errors = array();
            $file = $request->myFile;
           $result = $this->CheckFile($file);
           $nameFile = $file->getClientOriginalName('myFile');

           if (count($result) > 0){
               $errors = $result;
               $text = '';
               foreach ($errors as $key){
                  $text = $key;
               }
               return(redirect('user/change')->with('error', $text));
           } else {
               $fileCheck = true;
           }

        } else {
             $fileCheck = false;
        }
         if (session('login_user')->provider == 'dantri'){
         $this->validate($request, [
            'username' => 'required|min:10|max:60',
            'email' => 'required',
            'password' => 'required|min:6|max:18',
            'newPassword' => 'required|min:6|max:18'
         ],
         [
             'username.required' => '* Tên người dùng không được để trống',
             'username.min' => '* Tên người dùng phải từ 10 đến 60 ký tự',
             'username.max' => '* Tên người dùng phải từ 10 đến 60 ký tự',
             'email.required' => '* Email không được để trống',
             'password.required' => '* Mật khẩu không được để trống',
             'password.min' => '* Mật khẩu phải từ 6 đến 18 ký tự',
             'password.max' => '* Mật khẩu phải từ 6 đến 18 ký tự',
             'newPassword.required' => '* Mật khẩu mới không được để trống',
             'newPassword.min' => '* Mật khẩu mới phải từ 6 đến 18 ký tự',
             'newPassword.max' => '* Mật khẩu mới phải từ 6 đến 18 ký tự',
         ]);
         }

        if($fileCheck == true && session('login_user')->provider != 'dantri'){
            if($imageDelete != 'default-user.png'){
                unlink('imgUser/'.$imageDelete);
            }
            $file->move('imgUser/', ''.$nameFile.'');
            $userChangeInfor->image = $nameFile;
            $userChangeInfor->save();
        }
        if (session('login_user')->provider == 'dantri'){
            $email = session('login_user')->email ;
            $password = $request->password;
            $newPassword = $request->newPassword;
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                $checkEmail =  $request->email;
            $checkPassword = $newPassword;
            $userChangeInfor->name =  $request->username;
        $userChangeInfor->email = $request->email;
        $userChangeInfor->password =  bcrypt($newPassword);

            if($fileCheck == true){
                if($imageDelete != 'default-user.png'){
                    unlink('imgUser/'.$imageDelete);
                }
                $file->move('imgUser/', ''.$nameFile.'');
                $userChangeInfor->image = $nameFile;
            }
            $userChangeInfor->save();

            if(Auth::attempt(['email' => $checkEmail, 'password' => $checkPassword])){
                if(session()->has('login_user')){
                    session()->forget('login_user');
                }
                   session()->put('login_user' ,Auth::user());
                   session()->save();
             }


            } else {
                return(redirect('user/change')->with('error', '* Mật khẩu không chính xác'));
            }
        }
        if (session('login_user')->provider != 'dantri' && $fileCheck == true){
            session('login_user')->image = $nameFile;

        }
        /*
           if(Auth::attempt(['email' => $email, 'password' => $password])){
           if(session()->has('login_user')){
               session()->forget('login_user');
           }
              session()->put('login_user' ,Auth::user());
              session()->save();
        }
        */
         return(redirect('user/change'));
     }
     public function forgotForm(){
        echo ' <div class="center">

        <i class="fa fa-close"></i>
  <center>    <h2 class="title-form-h2-resign">Quên Mật Khẩu</h2></center>
        <form name="myResinger"  onsubmit="return validateForm2()" action="" method="get">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div id = "username" class="form-group">
                <img class = "image-form" src = "https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-and-shapes-3/177800/129-512.png" width = "35" height = "35">
                <input  value = "" id="RgEmail" autocomplete = "off" type="email" class="form-control"  placeholder="Enter Email" name="email">
              </div>
            <span id ="emailError">* Bắt buộc nhập </span>
           <div style="clear:both"> </div>

            <button type="submit" class="btn btn-danger">Gửi mã xác nhận</button>
          </form>


    </div>
    <b style="color : green;font-size:25px" id="success-forgot"></b>

    ';

     }
     public function ajaxRequestForgot(Request $request){
        $email = $request->email;

     $countName = userDemo::where('email', $email)->where('provider', 'dantri')->get();
     if(count($countName) == 0){
      $array = ['stater'=>'error',
      'email'=>'* Email không đúng hoặc chưa đăng ký',
     ];
      return (response()->json($array));
     }else {

     // $nameGmail = "vlvlvlvl";
     $array = ['stater'=>'success',
     'email'=> $countName[0]->id
    ];
     return (response()->json($array));
     }
   }
   public function GetFormForgot($id){
       $Email = userDemo::find($id);
       $six_digit_random_number = mt_rand(100000, 999999);
       $data = array(
           'email' => $Email->email,
           'codeForgot' => $six_digit_random_number
     );
   Mail::to('vuminhhungltt904@gmail.com')->send(new SendMail($data));
   $array = array(
          'code' => $six_digit_random_number,
          'id' => $Email->id
   );
   if(session()->has('codeforgot')){
    session()->forget('codeforgot');
}
   session()->put('codeforgot' ,$array);
   session()->save();
  return (view('submit.forgot', ['email' => $Email->email]));

      //return (view('submit.forgot', ['email' =>  $Email->email]));
   }
   public function confirm(Request $request){
    $resultEmail = userDemo::find(session('codeforgot')['id']);

     if ($request->codeOtp != session('codeforgot')['code']) {
        return (view('submit.forgot', ['error' => '* Mã OTP không khớp',
        'email' => $resultEmail->email
        ]));
      }
      else {
          $resultData = userDemo::find(session('codeforgot')['id']);
            return (view('submit.changePassword', ['data' => $resultData]));
      }

   }
   public function postFormChange(Request $request){
    $password = $request->password;
      $changeUser = userDemo::find(session('codeforgot')['id']);
     $changeUser->password = bcrypt($password);
     $changeUser->save();
     if(Auth::attempt(['email' => $changeUser->email, 'password' => $password])){
        if(session()->has('login_user')){
            session()->forget('login_user');
        }
           session()->put('login_user' ,Auth::user());
           session()->save();
     }
     if(session()->has('codeforgot')){
        session()->forget('codeforgot');
    }
    return (redirect('tintuc/post'));
   }
}

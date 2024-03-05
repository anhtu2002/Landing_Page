<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StorePostRequest;
session_start();

class LandpageController extends Controller
{
    //get view landing page
    public function getLandingPage()
    {
        return view('landing_page');
    }
    // store information 
    public function storeInformation(StorePostRequest $request)
    {
        //validated request
        $request->validated();
        //xử lý khi không có lỗi
        $data = array();
        $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'created_at' => now()->setTimezone('Asia/Ho_Chi_Minh'),
        ];
        //insert dữ liệu
        DB::table('land_pages')->insert($data);
        //thông báo thành công
        return redirect("/")->with("message", "Đăng ký thành công !");
                    
    }
}

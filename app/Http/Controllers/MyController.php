<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Requests;
use App\Models\Event;
use App\Models\Profile;
use Auth;
class MyController extends Controller
{

    

    


    //dat Cookie
    public function setCookie()
    {
    	$response = new Response();
    	$response->withCookie('Minh','laravel-vvm', 0.1);
        echo "da set cookie";
    	return $response;
    }
    public function getCookie(Request $request)
    {
        echo "cookie ca ban la: ";
    	return $request->cookie('Minh');
    }
    public function postFile(Request $request)
    {
        //kiem tra file da upload len hay chua
        if($request->hasFile('myFile'))
        {
            $file = $request->file('myFile');
            if($file->getClientOriginalExtension('myFile') == "JPG" || "PNG")
            {
                //luu anh

            $filename = $file->getClientOriginalName('myFile');
            echo $filename;
            $file->move('img',$filename);//move vao noi luu
            echo "da luu file ";
            }
            else
            {
                echo "khong phai file anh";
            }      
        }
        else
        {
            echo "chua co file";
        }
    }
    public function getJson()
    {
        $array = ['Laravel','Php','ASP.Net','HTML'];
        return response()->json($array);
    }
    public function Time($t)
    {
        return view('myView',['time'=>$t]);
    }
    public function blade($str)
    {
        $khoahoc = "";
        if ($str == "laravel") {
            return view('pages.laravel',['khoahoc'=>$khoahoc]);
        }
        elseif ($str == 'php') {
            return view('pages.php',['khoahoc'=>$khoahoc]);
        }
    }
}

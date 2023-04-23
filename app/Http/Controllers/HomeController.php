<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.userpage');
    }
    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else{
            return view('home.userpage');
        }
    }

    // public function product_details($id)
// {
//     $product=product::find($id);
//     return view('home.product_details',compact('product'));
// }
// public function add_cart($id)
// {
//     if(Auth::id())
//     {
//         return redirect()->back();
//     }
//     else{
//         return redirect('login');
//     }
// }
 }

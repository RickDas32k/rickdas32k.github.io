<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

<<<<<<< HEAD
use App\Models\Comment;
=======
use App\Models\order;
>>>>>>> 4697bb8f6a8b16025d5d9a680ce733b07b4cb3eb

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(10);
        return view('home.userpage',compact('product'));
    }
    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else{
            $product=Product::paginate(10);
            $comment=comment::all();
            return view('home.userpage',compact('product','comment'));
        }
    }

    public function product_details($id)
{
    $product=product::find($id);
    return view('home.product_details',compact('product'));
}
 public function add_cart(Request $request,$id)
 {
     if(Auth::id())
     {
         $user=Auth::user();

         $product=product::find($id);

         $cart=new cart;

         $cart->name=$user->name;

         $cart->email=$user->email;

         $cart->phone=$user->phone;

         $cart->address=$user->address;

         $cart->user_id=$user->id;

         $cart->product_title=$product->title;

         if($product->discount_price!=null)

         {
            $cart->price=$product->discount_price * $request->quantity;
         }

         else

         {

            $cart->price=$product->price * $request->quantity;

         }

        

         $cart->image=$product->image;

         $cart->Product_id=$product->id;

         $cart->quantity=$request->quantity;

         $cart->save();

         return redirect()->back();

        
     }
     else{
         return redirect('login');
     }
 }

 public function show_cart()
 {

    if(Auth::id())
    {
        $id=Auth::user()->id;

    $cart=cart::where('user_id','=',$id)->get();

    return view('home.showcart',compact('cart')); 
    }

    else
    {
        return redirect('login');
    }
    
 }

 public function remove_cart($id)
 {

    $cart=cart::find($id);

    $cart->delete();

    return redirect()->back();

 }

<<<<<<< HEAD
public function add_comment(Request $request)
{
    if(Auth::id())
    {
        $comment=new comment;
        $comment->name=Auth::user()->name;

        $comment->user_id=Auth::user()->id;
        $comment->comment=$request->comment;
        $comment->save();
        return redirect()->back();
    }
    else{
        return redirect('login');
    }
=======

 public function cash_order()
 {
    $user=Auth::user();
    $userid=$user->id;

    dd($userid);


 }

>>>>>>> 4697bb8f6a8b16025d5d9a680ce733b07b4cb3eb
}

}
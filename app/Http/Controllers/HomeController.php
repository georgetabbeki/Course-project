<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact_us;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
use App\Models\Comment;
use App\Models\Reply;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    public function index()
    {
        $product=product::paginate(3);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
        return view('home.userpage',compact('product','comment','reply'));
    }


    public function redirect()
    {
                $usertype=Auth::user()->usertype;

        if ($usertype=='1')
        {
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();

            $total_revneue=0;
            foreach ($order as $order)
            {
                $total_revneue=$total_revneue + $order->price;
            }
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','total_revneue','total_delivered','total_processing'));
        }
        else
        {
            $product=product::paginate(3);
            $comment=comment::orderby('id','desc')->get();
            $reply=reply::all();
            return view('home.userpage',compact('product','comment','reply'));
        }

    }

    public function prouduct_details($id)
        {
            $product=product::find($id);
            return view('home.prouduct_details',compact('product'));
        }

    public function About()
        {
            return view('home.About');
        }

    public function companies()
        {
            return view('home.companies');
        }


    public function our_Products()
        {
            $product=product::paginate(3);
            return view('home.our_products',compact('product'));
        }

    public function Contact()
        {
            return view('home.Contact');
        }

    public function add_cart(Request $request,$id)
        {
            if(Auth::id())
            {
                $user=Auth::user();

                $userid=$user->id;

                $product=product::find($id);

                $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

                if ($product_exist_id)
                {
                    $cart=cart::find($product_exist_id)->first();
                    $quantity=$cart->quantity;
                    $cart->quantity=$quantity + $request->quantity;

                    if ($product->discount_price!=null)
                    {
                        $cart->price=$product->discount_price * $request->quantity;

                    }

                    else
                    {
                        $cart->price=$product->price * $request->quantity;

                    }

                    $cart->save();
                    Alert::success('Product Added Successfully','We Have Added Product to The Cart');
                    return redirect()->back();

                }
                else
                {

                $cart=new cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;

                $cart->product_title=$product->title;

                $cart->image=$product->image;
                $cart->product_id=$product->id;

                $cart->quantity=$request->quantity;

                $cart->save();
                return redirect()->back();

                }

            }



        else
        {
            return redirect('login');
        }
    }

    public function Show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.Show_cart',compact('cart'));
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

        return redirect()->back()->with('message','Remove Product Successfully');
    }

    public function cash_order()
    {
        $user=Auth::user();
        $user_id=$user->id;

        $data=cart::where('user_id','=',$user_id)->get();

        foreach ($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();
        }

        return redirect()->back()->with('message','We Have Received Your Order. We Will Connect With You Soon ....');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }


    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks For Payment."
        ]);

        $user=Auth::user();
        $user_id=$user->id;

        $data=cart::where('user_id','=',$user_id)->get();

        foreach ($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='paid';
            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);

            $cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function add_comment (Request $request)
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
        else
        {
            return redirect('login');

        }
    }
    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply=new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;

            $reply->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');

        }
    }
    public function add_message(Request $request)
    {
        $Contact_us=new Contact_us;
        $Contact_us->name=$request->name;
        $Contact_us->email=$request->email;
        $Contact_us->subject=$request->subject;
        $Contact_us->message=$request->message;


        $Contact_us->save();

        return redirect()->back()->with('message' ,'message send successfully');
    }
    public function product_search (Request $request)
    {
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();

        $searchText=$request->search;

        $product=product::where('title','LIKE',"%$searchText%")->orwhere('catagory','LIKE',"$searchText")->orwhere('description','LIKE',"%$searchText%")->orwhere('price','LIKE',"%$searchText%")->orwhere('discount_price','LIKE',"%$searchText%")->paginate(10);

        return view('home.userpage',compact('product','comment','reply'));
    }

}

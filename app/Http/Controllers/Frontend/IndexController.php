<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Slider;
use App\Http\Controllers\Backend\ProductController;
use Intervention\Image\Image;
use App\Models\MultiImg;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name','ASC')->limit(1)->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(4)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(6)->get();


        $skip_category_0 = Category::skip(0)->first();
    	$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_subcategory_1 = SubCategory::skip(0)->first();
    	$skip_subcategory_product_1 = Product::where('status',1)->where('subcategory_id',$skip_subcategory_1->id)->orderBy('id','DESC')->get();


    	return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','skip_category_0','skip_product_0','skip_subcategory_1','skip_subcategory_product_1'));

    }
    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('Frontend.profile.user_profile',compact('user'));

    }

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data ->email = $request->email;
        $data ->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file =$request->file('profile_photo_path');
            //@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('dashboard')->with($notification);

    }

    public function ChangePassword(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request ->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');

        }else{
            return redirect()->back();
        }
    }

    public function ProductDetails($id,$slug){
        $product = Product::findOrFail($id);
		$multiImag = MultiImg::where('product_id',$id)->get();
        $color = $product->product_color;
		$product_color = explode(',', $color);
        $size = $product->product_size;
		$product_size = explode(',', $size);
        $category = Category::latest()->get();
        $cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color','product_size','category','relatedProduct'));

	}

     /// Product View With Ajax
	public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method
}
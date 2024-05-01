<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index(Request $request)
    {       
        $page = $request->query("page");
        $size = $request->query("size");
        if(!$page)
                $page = 1;
        if(!$size)
                $size = 12;
        $order = $request->query("order");
        if(!$order)
        $order = -1;
        $o_column = "";
        $o_order = "";
        switch($order)
        {
        case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
        case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
        case 3:
                $o_column = "regular_price";
                $o_order = "ASC";
                break;  
        case 4:
                $o_column = "regular_price";
                $o_order = "DESC";
                break;
        default:
                $o_column = "id";
                $o_order = "DESC";

        }   
        $brandIds = Product::where('categorie_product', 'VET')->distinct()->pluck('brand_id');
        $brands = Brand::whereIn('id', $brandIds)->orderBy('name','ASC')->get();
        $q_brands = $request->query("brands");

        $gategorieIds = Product::where('categorie_product', 'VET')->distinct()->pluck('category_id');
        $categories = Category::whereIn('id', $gategorieIds)->orderBy('name','ASC')->get();
        $q_categories = $request->query("categories");  

        $prange = $request->query("prange");
        if(!$prange)
            $prange = "0,500";
        $from  = explode(",",$prange)[0];
        $to  = explode(",",$prange)[1];
        $products = Product::where('categorie_product', 'VET')
                                ->where('featured', 1)
                                ->where(function($query) use($q_brands){
                                $query->whereIn('brand_id',explode(',',$q_brands))
                                        ->orWhereRaw("'".$q_brands."'=''");
                                })
                                ->where(function($query) use($q_categories){
                                $query->whereIn('category_id',explode(',',$q_categories))
                                        ->orWhereRaw("'".$q_categories."'=''");
                                })
                                ->whereBetween('regular_price',array($from,$to))
                                ->orderBy('created_at','DESC')
                                ->orderBy($o_column,$o_order)
                                ->paginate($size);
        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'brands'=>$brands,'q_brands'=>$q_brands,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]);   
    }

    public function shopInformatique(Request $request)
    {       
        $page = $request->query("page");
        $size = $request->query("size");
        if(!$page)
                $page = 1;
        if(!$size)
                $size = 12;
        $order = $request->query("order");
        if(!$order)
        $order = -1;
        $o_column = "";
        $o_order = "";
        switch($order)
        {
        case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
        case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
        case 3:
                $o_column = "regular_price";
                $o_order = "ASC";
                break;  
        case 4:
                $o_column = "regular_price";
                $o_order = "DESC";
                break;
        default:
                $o_column = "id";
                $o_order = "DESC";

        }   
        $brandIds = Product::where('categorie_product', 'INF')->distinct()->pluck('brand_id');
        $brands = Brand::whereIn('id', $brandIds)->orderBy('name','ASC')->get();    
        $q_brands = $request->query("brands");
        
        $gategorieIds = Product::where('categorie_product', 'INF')->distinct()->pluck('category_id');
        $categories = Category::whereIn('id', $gategorieIds)->orderBy('name','ASC')->get();
        $q_categories = $request->query("categories");  
        $prange = $request->query("prange");
        if(!$prange)
            $prange = "0,500";
        $from  = explode(",",$prange)[0];
        $to  = explode(",",$prange)[1];
        $products = Product::where('categorie_product', 'INF')
                                ->where('featured', 1) // Ajout de la condition 'featured'
                                ->where(function($query) use($q_brands){
                                $query->whereIn('brand_id', explode(',', $q_brands))
                                        ->orWhereRaw("'".$q_brands."'=''");
                                })
                                ->where(function($query) use($q_categories){
                                $query->whereIn('category_id', explode(',', $q_categories))
                                        ->orWhereRaw("'".$q_categories."'=''");
                                })
                                ->whereBetween('regular_price', [$from, $to])
                                ->orderBy('created_at', 'DESC')
                                ->orderBy($o_column, $o_order)
                                ->paginate($size);
        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'brands'=>$brands,'q_brands'=>$q_brands,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]);   
    }
    public function productDetails($slug)
{
    $product = Product::where('slug', $slug)->first();
    $rproducts = Product::where('slug', "!=", $slug)->inRandomOrder()->take(8)->get();


    $userId = $product->user_id;
    $user = User::find($userId);
    $phoneNumber = $user->phone;

        return view('details', [
        'product' => $product,
        'rproducts' => $rproducts,
        'phoneNumber' => $phoneNumber
    ]);
}

    public function getCartAndWishlistCount()
    {
        // $cartCount = Cart::instance("cart")->Content()->count();
        $wishlistcount = Cart::instance("wishlist")->Content()->count();
        return response()->json(['status'=>200,'cartCount'=>$cartCount,'wishlistCount'=>$wishlistcount]);
    }

    public function search(Request $request){
        $page = $request->query("page");
        $size = $request->query("size");
        if(!$page)
                $page = 1;
        if(!$size)
                $size = 12;
        $order = $request->query("order");
        if(!$order)
        $order = -1;
        $o_column = "";
        $o_order = "";
        switch($order)
        {
        case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
        case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
        case 3:
                $o_column = "regular_price";
                $o_order = "ASC";
                break;  
        case 4:
                $o_column = "regular_price";
                $o_order = "DESC";
                break;
        default:
                $o_column = "id";
                $o_order = "DESC";

        }   
        $brandIds = Product::where('categorie_product', 'INF')->distinct()->pluck('brand_id');
        $brands = Brand::whereIn('id', $brandIds)->orderBy('name','ASC')->get();    
        $q_brands = $request->query("brands");
        
        $gategorieIds = Product::where('categorie_product', 'VET')->distinct()->pluck('category_id');
        $categories = Category::whereIn('id', $gategorieIds)->orderBy('name','ASC')->get();
        $q_categories = $request->query("categories");  
        $prange = $request->query("prange");
        if(!$prange)
            $prange = "0,500";
        $from  = explode(",",$prange)[0];
        $to  = explode(",",$prange)[1];

        $query = $request->input('q');
        $products = Product::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('slug', 'LIKE', "%{$query}%")
                        ->paginate($size);


        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'brands'=>$brands,'q_brands'=>$q_brands,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]);   
    }

//     public function saveRating($id,Request $request){
//         $validatore = Validator::make($request->all(), [
//                 'name' => 'required|min:5',
//                 'email' => 'required|email',
//                 'comment' => 'required',
//                 'rating' => 'required'
//         ]);

//         if($validatore->fails()){
//                 return response()->json([
//                         'status' => false,
//                         'errors' => $validatore->errors()
//                 ]);
//         }

//         $productRating = new ProductRating;
//         $productRating->product_id = $id;
//         $productRating->name = $request->name;
//         $productRating->email = $request->email;
//         $productRating->comment = $request->comment;
//         $productRating->rating = $request->rating;
//         $productRating->status = 0;
//         $productRating->save();
    
//         session()->flash('success', 'Rating added successfully.');

//         return response()->json([
//                 'status' => true,
//                 'message' => 'Rating added successfully.'
//         ]);

//         }

}

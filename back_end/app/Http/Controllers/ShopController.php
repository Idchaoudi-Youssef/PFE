<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
        public function index(Request $request)
        {
            $page = $request->query('page', 1);
            $size = $request->query('size', 12);
            $order = $request->query('order', -1);
        
            $sortingOptions = [
                1 => ['created_at', 'DESC'],
                2 => ['created_at', 'ASC'],
                3 => ['regular_price', 'ASC'],
                4 => ['regular_price', 'DESC'],
            ];
            [$o_column, $o_order] = $sortingOptions[$order] ?? ['id', 'DESC'];
        
            $gategorieIds = Product::where('categorie_product', 'VET')->distinct()->pluck('category_id');
            $categories = Category::whereIn('id', $gategorieIds)->orderBy('name', 'ASC')->get();
        
            $q_categories = $request->query('categories', '');
            $prange = $request->query('prange', '0,500');
            [$from, $to] = explode(',', $prange);
        
            $products = Product::where('categorie_product', 'VET')
                ->where(function($query) use($q_categories) {
                    if ($q_categories) {
                        $query->whereIn('category_id', explode(',', $q_categories));
                    }
                })
                ->whereBetween('regular_price', [$from, $to])
                ->orderBy($o_column, $o_order)
                ->paginate($size);
        
            return view('shop', [
                'products' => $products,
                'page' => $page,
                'size' => $size,
                'order' => $order,
                'categories' => $categories,
                'q_categories' => $q_categories,
                'from' => $from,
                'to' => $to,
            ]);
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
                                ->where(function($query) use($q_categories){
                                $query->whereIn('category_id', explode(',', $q_categories))
                                        ->orWhereRaw("'".$q_categories."'=''");
                                })
                                ->whereBetween('regular_price', [$from, $to])
                                ->orderBy('created_at', 'DESC')
                                ->orderBy($o_column, $o_order)
                                ->paginate($size);
        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]);   
    }
//     public function productDetails($slug)
//         {
        
//         $product = Product::where('slug', $slug)->first();
//         $rproducts = Product::where('slug', "!=", $slug)->inRandomOrder()->take(8)->get();
        
//         $productImages = ProductImage::where('product_id', $product->id)->get();
//         $specification_products = ProductSpecification::where('product_id', $product->id)->get();
        
//         $userId = $product->user_id;
//         $user = User::find($userId);
//         $phoneNumber = $user->phone;
//         // dd($productImages);
//                 return view('details', [
//                 'product' => $product,
//                 'rproducts' => $rproducts,
//                 'phoneNumber' => $phoneNumber,
//                 'productImages' => $productImages,
//                 'specification_products' => $specification_products
//         ]);
//         }


public function productDetails($slug)
{
    // Load the product and its related images
    $product = Product::where('slug', $slug)->with('images')->first();

    // Get random products excluding the current one
    $rproducts = Product::where('slug', "!=", $slug)->inRandomOrder()->take(8)->get();

    // Fetch product specifications
    $specification_products = ProductSpecification::where('product_id', $product->id)->get();

    // Retrieve the user's phone number
    $userId = $product->user_id;
    $user = User::find($userId);
    $phoneNumber = $user->phone;

//     dd($product, $specification_products);
//     Pass the product, its images, and other data to the view
    return view('details', [
        'product' => $product,
        'rproducts' => $rproducts,
        'phoneNumber' => $phoneNumber,
        'productImages' => $product->images, // Use images from the relationship
        'specification_products' => $specification_products
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


        return view('shop',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]);   
    }

public function SshopCategory($category, Request $request)
{
    $page = $request->query("page", 1);
    $size = $request->query("size", 12);
    $order = $request->query("order", -1);

    // Define default ordering
    $o_column = "id";
    $o_order = "DESC";
    switch($order) {
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
    }
    $prange = $request->query("prange");
    if(!$prange)
        $prange = "0,500";
    $from  = explode(",",$prange)[0];
    $to  = explode(",",$prange)[1];
    

    $gategorieIds = Product::where('categorie_product', 'VET')->distinct()->pluck('category_id');
    $categories = Category::whereIn('id', $gategorieIds)->orderBy('name','ASC')->get();
    $q_categories = $request->query("categories"); 
    $category = Category::where('name', $category)->first();

    if ($category === null) {
        return redirect()->route('error.page')->with('error', 'Category not found');
    }

    $products = Product::where('category_id', $category->id)
                        ->orderBy($o_column, $o_order)
                        ->paginate($size);

    return view('shopCategory', compact('products',  'category', 'page', 'size', 'order' , 'categories', 'q_categories' , 'prange', 'from', 'to'));
}

}

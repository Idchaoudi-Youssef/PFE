<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function getAlProductsByUserId($id){
        // Récupère tous les produits appartenant à l'utilisateur spécifié par $userId
        $products = Product::where('user_id', $id)->get();

    }

    public function getAllProductsByUserId(Request $request,$id){
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
        
        $brands = Brand::orderBy('name','ASC')->get();    
        $q_brands = $request->query("brands");
        $categories = Category::orderBy("name","ASC")->get();
        $q_categories = $request->query("categories");  
        $prange = $request->query("prange");
        if(!$prange)
            $prange = "0,500";
        $from  = explode(",",$prange)[0];
        $to  = explode(",",$prange)[1];
        $products = Product::where(function($query) use($q_brands){
                    $query->whereIn('brand_id', explode(',', $q_brands))
                        ->orWhereRaw("'".$q_brands."'=''");
                    })
                    ->where(function($query) use($q_categories){
                        $query->whereIn('category_id', explode(',', $q_categories))
                            ->orWhereRaw("'".$q_categories."'=''");
                    })
                        ->whereBetween('regular_price', array($from, $to))
                        ->where('user_id', $id) 
                        ->orderBy('created_at', 'DESC')
                        ->orderBy($o_column, $o_order)
                        ->paginate($size);
            return view('users.product.listproduct',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'brands'=>$brands,'q_brands'=>$q_brands,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]); 
    }

    

    public function createProducts(){
            $categories = Category::all();
            $brands = Brand::all();
            return view('users.product.create-products', compact('categories', 'brands'));
    }

    public function storeProducts(Request $request)
    {

        $data = $request->input();
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug',
        'short_description' => 'nullable|string',
        'description' => 'nullable|string',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'SKU' => 'required|string|max:255',
        'stock_status' => 'required|string',
        'featured' => 'required|boolean',
        'quantity' => 'required|numeric|min:1',
        'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
        'categorie_product' => 'nullable|string',
        'user_id' => 'required|exists:users,id',

    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('assets/images/fashion/product/front','public');
        $validatedData['image'] = $imagePath;
        $validatedData['images'] = $imagePath;
    }
    $validatedData['user_id'] = Auth::id();

    $product = Product::create($validatedData);

    return redirect()->route('user.listproducts')->with('success', 'Product created successfully.');

}
}

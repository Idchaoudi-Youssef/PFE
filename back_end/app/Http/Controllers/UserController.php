<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Mail\WelcomeMail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    

    public function getAllProductsByUserId(Request $request, $id){
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
            default:
                $o_column = "id";
                $o_order = "DESC";
        }   
    
        $categories = Category::orderBy("name", "ASC")->get();
        $q_categories = $request->query("categories");  
        $prange = $request->query("prange");
        if(!$prange)
            $prange = "0,500";
        $from  = explode(",",$prange)[0];
        $to  = explode(",",$prange)[1];
        $products = Product::where(function($query) use($q_categories) {
                $query->whereIn('category_id', explode(',', $q_categories))
                    ->orWhereRaw("'".$q_categories."'=''");
            })
            ->whereBetween('regular_price', array($from, $to))
            ->where('user_id', $id) 
            ->orderBy('created_at', 'DESC')
            ->orderBy($o_column, $o_order)
            ->paginate($size);
            
        return view('users.product.listproduct', [
            'products' => $products,
            'page' => $page,
            'size' => $size,
            'order' => $order,
            'categories' => $categories,
            'q_categories' => $q_categories,
            'from' => $from,
            'to' => $to
        ]); 
    }


    public function createProducts(){
            $categories = Category::all();
           
            return view('users.product.create-products', compact('categories'));
    }

    public function testcreateProducts(){
        $categories = Category::all();
       
        return view('test', compact('categories'));
}

   
    public function storeProducts(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'regular_price' => 'required|numeric',
            'stock_status' => 'required|string',
            'featured' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'categorie_product' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'split_input' => 'required|array',
            'split_input.*.attribute' => 'required|string|max:255',
            'split_input.*.value' => 'required|string|max:255'
        ]);

        $validatedData['user_id'] = Auth::id();
        $product = Product::create($validatedData);

        if ($files = $request->file('imagess')) {
            $imageData = [];
            foreach ($files as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $key . '_' . time() . '.' . $extension;
                
                $path = $file->store('assets/images/fashion/product/front', 'public');
                
                $imageData[] = [
                    'product_id' => $product->id,
                    'image' => $path, // Le chemin du fichier dans le stockage Laravel
                ];
            }
        
            ProductImage::insert($imageData);
        }

        $specifications = [];
        foreach ($request->input('split_input') as $specification) {
            $specifications[] = [
                'product_id' => $product->id,
                'attribute' => $specification['attribute'],
                'value' => $specification['value'],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Insert specifications into the database
        ProductSpecification::insert($specifications);

    return redirect()->route('user.listproducts',['id' => Auth::id()])->with('success', 'Product created successfully.');

}

    public function deleteProducts($id){
        
        $product = Product::find($id);
        if ($product) {

            $product->delete();

            return redirect()->route('user.listproducts',['id' => Auth::id()])->with('success', 'Product created successfully.');
        } else {
            
            return redirect()->route('user.listproducts',['id' => Auth::id()])->with('erreur', 'Lors de la suppression du produit, une erreur s\'est produite.');
        }
    }

    public function waitingListProducts($id){
        $products = Product::whereNull('featured')
        ->inRandomOrder()
        ->get();
    
        return view('users.product.waitinglisteProduct', compact('products'));
    }

    public function approvedListProducts($id){
        $products = Product::where('featured', 1)
        ->where('user_id', $id)
        ->inRandomOrder()
        ->get();
    
        return view('users.product.approvedListProduct', compact('products'));
    }
    
    public function rejectedListProducts($id){
        $products = Product::where('featured', 0)
        ->where('user_id', $id)
        ->inRandomOrder()
        ->get();
    
        return view('users.product.rejectedListProduct', compact('products'));
    }

    public function profile(){
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function updateUsers(Request $request , $id){
        $user = User::find($id);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->zip = $request->input('zip');
    
        if($request->filled('password')) {
            $password = $request->input('password');
            $passwordConfirmation = $request->input('password_confirmation');
    
            if($password === $passwordConfirmation) {
                $user->password = bcrypt($password);
            } else {
                return back()->withErrors(['password' => 'Password and confirmation do not match.']);
            }
        }
    
        $user->save();
    
        return redirect()->route('user.profile')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function editUsers($id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function verifyEmail(Request $request){
        [$createdAt,$id] = explode('///',base64_decode($request->hash));
        $user = User::findOrFail($id);

        if($user->created_at->toDateTimeString() !== $createdAt){
            abort(403);
        }

        if($user->email_verified_at !== NULL) {
            return response('Compte déja activé');
        }

        $name = $user->name;
        $email = $user->email;
        $user->fill([
            'email_verified_at' => time()
        ])->save();


        return view('users.email_verified',compact('name','email'));
    }

    public function verifyAndRedirect() {
        if (Auth::check()) {
            $user = Auth::user();
    
            if ($user->email_verified_at !== null) {
                if ($user->utype === 'ADM') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('user.index');
                }
            } else {
                return redirect()->route('app.index')->with('error', 'Votre email n est pas verifie.');

            }
        }
            return redirect()->route('login');
    }

    public function verifyEmails(){
            $user = auth()->user(); // Assurez-vous que l'utilisateur est connecté
            Mail::to('bourhanelahmadi@gmail.com')->send(new WelcomeMail($user));
             return redirect()->back()->with('success', 'E-mail de vérification envoyé.');
        
    }

    public function ViewResetPassword(Request $request , $id){
        $user = User::find($id);
        return view('users.resetPassword' , compact('user'));
    }

    



    public function ResetPassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find($id);

        

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'L\'ancien mot de passe est incorrect.']);
        }

        if ($request->new_password !== $request->new_password_confirmation) {
            return back()->withErrors(['new_password_confirmation' => 'La confirmation du nouveau mot de passe ne correspond pas.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Votre mot de passe a été réinitialisé avec succès.');
    }
}

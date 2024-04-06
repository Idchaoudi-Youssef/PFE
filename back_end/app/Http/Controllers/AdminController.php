<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function getAllUsers(){
        $users = User::all(['id', 'name', 'email', 'utype']);
        return view('admin.user.listusers', compact('users'));
    }

    public function getAllProducts(Request $request){
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
                                $query->whereIn('brand_id',explode(',',$q_brands))->orWhereRaw("'".$q_brands."'=''");
                            })
                            ->where(function($query) use($q_categories){
                                $query->whereIn('category_id',explode(',',$q_categories))->orWhereRaw("'".$q_categories."'=''");
                            })
                            ->whereBetween('regular_price',array($from,$to))
                    ->orderBy('created_at','DESC')->orderBy($o_column,$o_order)->paginate($size);
        return view('admin.product.listproduct',['products'=>$products,'page'=>$page,'size'=>$size,'order'=>$order,'brands'=>$brands,'q_brands'=>$q_brands,'categories'=>$categories,'q_categories'=>$q_categories,'from'=>$from,'to'=>$to]); 
    }

    public function getAllBrand(){
        $brands = Brand::all();
        return view('admin.brand.listbrand', compact('brands'));
    }

    public function getAllCategorie(){
        $categorie = Category::all();
        return view('admin.categorie.listcategorie', compact('categorie'));
    }
    
    public function createUsers(){
        
        return view('admin.user.create-users');
    }
    
    public function createBrands(){
        
        return view('admin.brand.create-brands');
    }
    public function createCategories(){
        
        return view('admin.categorie.create-categories');
    }

    public function createProducts(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create-products', compact('categories', 'brands'));
    }



    public function storeUsers(Request $request)
    {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', // Assurez-vous que l'email est unique dans la table users
            'password' => 'required|string|min:8|confirmed', // Le champ confirmed assure que password et password_confirmation correspondent
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'utype' => 'nullable|string|in:USR,ADM', // Assure que utype est soit USR, soit ADM si fourni
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'zip' => 'nullable|string',
        ]);

        // Créer l'utilisateur avec les données validées
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hasher le mot de passe pour la sécurité
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'utype' => $validatedData['utype'] ?? 'USR', // Fournir une valeur par défaut si utype n'est pas défini
            'city' => $validatedData['city'],
            'country' => $validatedData['country'],
            'state' => $validatedData['state'],
            'zip' => $validatedData['zip'],
        ]);

        // Rediriger vers la route souhaitée avec un message de succès
        return redirect()->route('admin.users')->with('success', 'User created successfully');
    }
    
    public function storeBrands(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255', 
            'image' => 'nullable|image|mimes:jpeg,jpg,pnj|max:2048',
        ]);

        $this->uploadImage($request, $validatedData);

        $brand = Brand::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'image' => $validatedData['image'],
        ]);

        return redirect()->route('admin.brands')->with('success', 'Brand created successfully');
    }

    private function uploadImage(Request $request, array &$formFields) {
            if($request->hasFile('image')){
                $formFields['image'] = $request->file('image')->store('assets/images/fashion/brand','public');
            }
    }


    public function storeCategories(Request $request)
    {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        // Créer l'utilisateur avec les données validées
        $categorie = Category::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
        ]);

        // Rediriger vers la route souhaitée avec un message de succès
        return redirect()->route('admin.categories')->with('success', 'Categorie created successfully');
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
        'featured' => 'nullable|boolean',
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

    return redirect()->route('admin.Verifiedproducts')->with('success', 'Product created successfully.');

    }      




    // private function uploadImage1(Request $request, array &$validatedData) {
    //     if($request->hasFile('image')){
    //         $imagePath ['image'] = $request->file('image')->store('assets/images/fashion/product/front','public');
    //         $validatedData['image'] = $imagePath;
    //     }
    // }


    public function deleteUsers($id) {
        $user = User::find($id);
        if ($user) {
            // L'utilisateur existe, on peut le supprimer
            $user->delete();
            $users = User::all(['id', 'name', 'email', 'utype']);
            return view('admin.user.listusers', compact('users'))->with('success', 'Utilisateur supprimé avec succès.');
        } else {
            $users = User::all(['id', 'name', 'email', 'utype']);
            return view('admin.user.listusers', compact('users'))->with('erreur', 'Lors de la suppression de l\'utilisateur, une erreur s\'est produite.');
        }
    }

    public function deleteCategories($id)
    {
        $category = Category::find($id);
        if ($category) {
            // L'utilisateur existe, on peut le supprimer
            $category->delete();
            $categorie = Category::all();
            return view('admin.categorie.listcategorie', compact('categorie'));
        } else {
            $categorie = Category::all();
            return view('admin.categorie.listcategorie', compact('categorie'));
        }
    }

    public function deleteBrands($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            // L'utilisateur existe, on peut le supprimer
            $brand->delete();
            $brands = Brand::all();
            return view('admin.brand.listbrand', compact('brands'));
        } else {
            $brands = Brand::all();
            return view('admin.brand.listbrand', compact('brands'));
            }
    }

    public function deleteProducts($id)
    {
        $product = Product::find($id);
        if ($product) {
            // L'utilisateur existe, on peut le supprimer
            $product->delete();
            $products = Product::all();
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            $products = Product::all();
            return redirect()->back()->with('error', 'Lors de la suppression du produit, une erreur s\'est produite.');
        }
    }

    public function editUsers($id){
        $user = User::find($id);
        return view('admin.user.update-users', compact('user'));
    }

    public function editCategories($id){
        $categorie = Category::find($id);
        return view('admin.categorie.update-categorie', compact('categorie'));
    }

    public function updateUsers(Request $request, $id){
        $user = User::find($id);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->zip = $request->input('zip');
        $user->utype = $request->input('utype');
    
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
    
        return redirect()->route('admin.users')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    // public function editProducts($id){
    //     $user = User::find($id);
    //     return view('admin.user.update-users', compact('user'));
    // }

    public function editBrands($id){
        $brand = Brand::find($id);
        return view('admin.brand.update-brand', compact('brand'));
    }



    public function updateBrand(Request $request, $id)
    {
        $brand = Brand::findOrFail($id); // Trouve la marque par son ID ou retourne une erreur 404

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255', 
            'image' => 'nullable|image|mimes:jpeg,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $this->uploadImage($request, $validatedData); // Assurez-vous que cette méthode met à jour le chemin de l'image dans $validatedData
        }

        $brand->update([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'image' => $validatedData['image'] ?? $brand->image, // Garde l'image existante si aucune nouvelle image n'est fournie
        ]);

        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully');
    }

    public function updateCategories(Request $request, $id)
    {
        $categorie = Category::findOrFail($id); // Trouve la marque par son ID ou retourne une erreur 404

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        // Créer l'utilisateur avec les données validées
        $categorie->update([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
        ]);

        // Rediriger vers la route souhaitée avec un message de succès
        return redirect()->route('admin.categories')->with('success', 'Categorie updated successfully');
    }

    public function editProducts($id){
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.update-product', compact('product' , 'categories' , 'brands'));
    }

    public function UpdateProduct(Request $request, $id){
        $product = Product::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255', 
            'short_description' => 'string',
            'description' => 'string',
            'regular_price' => 'numeric',
            'sale_price' => 'numeric',
            'SKU' => 'string|max:255',
            'stock_status' => 'string',
            'featured' => 'boolean',
            'quantity' => 'numeric|min:1',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'categorie_product' => 'nullable|string',

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/images/fashion/product/front', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $product->update($validatedData);

        return redirect()->route('admin.Verifiedproducts')->with('success', 'Product created successfully.');

    }

    public function dashboard ()
    {
        return view('admin.dashboard.index');
    }

    public function VerifiedproductsView(){
        $products = Product::all();
        return view('admin.product.verified', compact('products'));
    }

    public function verifyProduct(Request $request, Product $product)
{
    $validated = $request->validate([
        'featured' => 'required|in:0,1', // Assurez-vous que la valeur est soit 0, soit 1
    ]);

    $product->featured = $validated['featured'];
    $product->save();

    return back()->with('success', 'Product verification updated successfully.');
}

}


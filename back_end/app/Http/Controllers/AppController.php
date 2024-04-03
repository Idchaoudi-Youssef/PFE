<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        $products = Product::where('categorie_product', 'VET')->inRandomOrder()->take(6)->get();
        $productss = Product::where('categorie_product', 'INF')->inRandomOrder()->take(6)->get();
        $latestProducts = Product::where('categorie_product', 'VET')->orderBy('created_at', 'desc')->take(5)->get();
        $latestElectronics = Product::where('categorie_product', 'INF')->orderBy('created_at', 'desc')->take(5)->get();
        $highSalePriceProducts = Product::orderBy('sale_price', 'desc')->take(10)->get();


        return view('index', ['products' => $products] , ['productss' => $productss, 'latestProducts' => $latestProducts, 'latestElectronics' => $latestElectronics , 'highSalePriceProducts' => $highSalePriceProducts]);
    }

    public function aboutUs(){
        return view('about-us');
    }

    public function contactUs(){
        return view('contact-us');
    }

    public function blog(){
        return view('blog');
    }

    public function contactUsStore(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:255',
            'commentaire' => 'required|string',
        ]);
    
        $contact = Contact::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'phone' => $request->phone,
            'commentaire' => $request->commentaire,
        ]);
    
        return redirect()->route('app.contactus')->with('success', 'Categorie updated successfully');
    }
}

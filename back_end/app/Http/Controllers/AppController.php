<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppController extends Controller
{
    public function index(){
        $products = Product::where('categorie_product', 'VET')
        ->where('featured', 1)
        ->inRandomOrder()
        ->take(6)
        ->get();
    
    // Produits de la catégorie 'INF' vérifiés
    $productss = Product::where('categorie_product', 'INF')
        ->where('featured', 1)
        ->inRandomOrder()
        ->take(6)
        ->get();
    
    // Derniers produits de la catégorie 'VET' vérifiés
    $latestProducts = Product::where('categorie_product', 'VET')
        ->where('featured', 1)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    
    // Derniers produits de la catégorie 'INF' vérifiés
    $latestElectronics = Product::where('categorie_product', 'INF')
        ->where('featured', 1)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();
    
    // Produits avec le prix de vente le plus élevé vérifiés
   


        return view('index', ['products' => $products] , ['productss' => $productss, 'latestProducts' => $latestProducts, 'latestElectronics' => $latestElectronics ]);
    
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

        public function contactUsStore(Request $request)
        {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:255',
                'commentaire' => 'required|string',
            ]);
        
            $contact = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'phone' => $request->phone,
                'commentaire' => $request->commentaire,
            ];
        
            Mail::send('email-template', $contact, function($message) use ($contact) {
                $message->from($contact['email'])
                        ->to('bourhanelahmadi@gmail.com')
                        ->subject('Nouveau message de ' . $contact['nom'] . ' ' . $contact['prenom']);
            });
        
            return redirect()->route('app.contactus')->with('success', 'Contact details sent successfully');
        }
}

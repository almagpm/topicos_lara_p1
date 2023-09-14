<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Review;


use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; // Importa la clase de correo que defines

class SiteController extends Controller
{
    //
    public function services(){
        return view('services');
    }
    public function contact(Request $request){
        if($request->isMethod("POST")){
            $request->validate([
                'name' => 'required|max:50',
                'email' => 'required|email|max:50',
                'subject' => 'required|max:100',
                'message' => 'required|min:5',
            ],[
                'name.required' => 'Please type your name.',
                'name.max' => '50 characters maximum.',
                'email.required' => 'Please type your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => '50 characters maximum.',
                'subject.required' => 'Please type your subject.',
                'subject.max' => '100 characters maximum.',
                'message.required' => 'Please type your message.',

            ]);

            $contact = new Contact();
            $contact -> name = $request->input('name');
            $contact -> email = $request->input('email');
            $contact -> subject = $request->input('subject');
            $contact -> message = $request->input('message');
            $contact -> save();

            $emailData = [
                'name' => $contact->name,
                'email' => $contact->email,
                'subject' => $contact->subject,
                'message' => $contact->message,
            ];
    
            Mail::to('20030274@itcelaya.edu.mx')->send(new ContactMail($emailData));
    

            return redirect()->route("contact")->with('success', 'Your contact messsage has been sent.');
        }
        return view('e-commerce.contact');
    }
    public function faq(){
        return view('faq');
    } 

    public function productsByCategory()
    {
        $categories=Category::all();
        return view('e-commerce.product-by-list',compact('categories'));
    }
    public function product($category_id = null){
        //$products = Product::all();
        $categories = Category::all();
        $products = (is_null($category_id)?
            Product::all():
            Product::where('category_id',$category_id)->get()
        );
        //return view('product-list',['product' => $product]);
        return view('e-commerce.product-list',compact('products','categories'));
    }

    public function about(){
        $about_message="Hola, somos una empresa que se dedica al desarrollo de sofware de Sistemas de Información";
        return view('about',["about_message" => $about_message]);
    }

    public function detalle($product_id)
    {
        // Aquí debes realizar una consulta a la base de datos para obtener los detalles del producto
        $reviews = Review::where('product_id',$product_id)->get();
        $product = Product::find($product_id); 
        return view('e-commerce.detalle', compact('product','reviews'));
    }

    public function guardarReview(Request $request)
    {
        // Valida los datos del formulario
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'product_id' => 'required|exists:products,id', // Asegúrate de que exista un producto con ese ID en tu base de datos
        ]);

        // Crea una nueva instancia de la reseña
        $review = new Review();
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->rating = $request->input('rating'); // Aquí asigna el valor del campo 'rating'
        $review->description = $request->input('description');
        $review->product_id = $request->input('product_id');



        // Guarda la reseña en la base de datos
        $review->save();

        // Redirige al usuario de vuelta a la página de detalles del producto o a donde desees
        return redirect()->back()->with('success', 'Reseña guardada correctamente');
    }

}    
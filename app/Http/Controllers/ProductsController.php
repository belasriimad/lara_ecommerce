<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use Cart;
use DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('created_at','desc')->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'titre'=>'required|max:100',
            'desc'=>'required|max:1000',
            'qte'=>'required',
            'prix'=>'required',
            'file'=>'required'
        ],[
            'required' => 'Ce champ est obligatoire'
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move('images',$name);
            $product = new Product();
            $product->titre = $request->titre;
            $product->description = $request->desc;
            $product->qte = $request->qte;
            $product->prix = $request->prix;
            $product->image = $name;
            $product->save();
            return redirect()->route('index')->with(['success'=>'Produit ajouté avec succés']);
        }
        return redirect()->route('index')->with(['fail'=>'Erreur veuillez réessayer']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request,[
            'titre'=>'required|max:100',
            'desc'=>'required|max:1000',
            'qte'=>'required',
            'prix'=>'required',
        ],[
            'required' => 'Ce champ est obligatoire'
        ]);
        $product = Product::find($id);
        $product->titre = $request->titre;
        $product->description = $request->desc;
        $product->qte = $request->qte;
        $product->prix = $request->prix;
        $product->update();
        return redirect()->route('admin.products')->with(['success'=>'Produit modifié avec succés']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.products')->with(['success'=>'Produit supprimé avec succés']);
    }
    public function getPanier()
    {
        //
        return view('products.cart');
    }
    public function addToCart(Request $request){
        Cart::add(['id' => $request->id, 'name' => $request->titre, 'qty' => $request->qte, 'price' => $request->prix,'options' => ['size' => 'large']]);
        $product = Product::find($request->id);
        $product->vendu+=$request->qte;
        $product->update();
        return redirect()->route('index');
    }
    public function adminProducts(){
        $products = Product::orderBy('created_at','desc')->get();
        return view('admin.products.index',compact('products'));
    }
    public function productByCat($categorie){
        $products = Category::find($categorie)->products;
        $categorie = Category::find($categorie);
        return view('products.product-cat',compact('products','categorie'));
    }
    public function cancelCart(){
        Cart::destroy();
        return redirect()->route('index');
    }
}

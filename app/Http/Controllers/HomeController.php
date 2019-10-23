<?php
namespace App\Http\Controllers;
use App\Product;
use App\Category;
class HomeController extends Controller
{
   public function index(){
       $categories = Category::all();
       $products = Product::orderBy('created_at','desc')->paginate(6);
       $bestSold = Product::orderBy('vendu','desc')->where('vendu','>',0)->get();
       return view('index',compact('products','categories','bestSold'));
   }
}
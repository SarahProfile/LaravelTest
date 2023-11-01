<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use function view;

class HomeComponent extends Controller 
{

    public $id;

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
     
      $products = Product::all();
  
   
        return view('products.home',['products' => $products]);
    }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
   
    $products = Product::all();
    // $suppliers = Supplier::all();
    // foreach($request->products as $item){
    //   Stock::create(['stock_id' =>$stock->id,'product_id' =>$item]);
    // }
    return view('products.home', compact('products'));
  }
    
}

?>
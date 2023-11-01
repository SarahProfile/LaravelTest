<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Stock;
use App\Models\StockProduct;
use App\Models\Supplier;

class StockController extends Controller 
{

    public $id;

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
      $stock = Stock::find($this->id);
      $products = Product::all();
      $suppliers = Supplier::all();
   
        return view('productsStock.edit-stock',['stock'=>$stock,'products' => $products,'suppliers' => $suppliers]);
    }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $stocks = Stock::all();
    $products = Product::all();
    // $suppliers = Supplier::all();
    // foreach($request->products as $item){
    //   Stock::create(['stock_id' =>$stock->id,'product_id' =>$item]);
    // }
    return view('productsStock.index', ['stocks' => $stocks,'products' => $products]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $products=Product::all();
      return view('productsStock.add-stock');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      // Validate the form data
      $data = $request->validate([
        'quantity_added'=>'required',
        'last_added_date',
        'product_id'=>"required",
 
      ]);
      
      // Create and save the new productd
      $stock = Stock::create($request->all());
     
      return redirect('/admin/stocks')->with('success', 'Stock added successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }
  public function add()
  {
    $products = Product::all();
    return view('productsStock.add-stock',['products' => $products]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request,$id)
  {
      $stock = Stock::find($id);

      $stock->quantity_added += $request->quantity_added;
      $stock->last_added_date = $request->last_added_date;
      $stock->supplier_name = $request->supplier_name;
      $stock->date2 = $request->date2;
      $stock->supplier2 = $request->supplier2;
      // $newStock=Stock::create($request->all());
      // $stock->fill($request->all());
         $stock->save();


       
        // return redirect()->route('product.update',['id'=>$id]);
        return redirect('/admin/stocks')->with('success', 'Stock updated successfully.');
   
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    $stock = Stock::find($id);
    $products = Product::all();
    return view('productsStock.edit-stock',['products' => $products,'stock' => $stock]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $stock = Stock::find($id);
    $stock->delete();
        // Alert::success('Success', 'Team deleted successfully');
        
        return redirect()->route('/admin/stocks');
  }
  
}

?>
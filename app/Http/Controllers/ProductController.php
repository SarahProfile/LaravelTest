<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;

class ProductController extends Controller 
{

    public $id;

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $product = Product::find($this->id);
        
        return view('products.edit-product',['product'=>$product]);
    }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $products = Product::withSum('stocks','quantity_added')->get();
    return view('products.index', ['products' => $products]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('products.add-product');
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
        'title'=>'required',
        'price'=>'required',
        'describtion'=>'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'productCode' =>'required|unique:products,productCode',
        'category_id' =>'required'
 
      ]);
      if ($request->file('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
}
      // Create and save the new productd
      $product = Product::create([...$request->all(),'product_image'=>$imageName]);
      
      return redirect('/admin/products')->with('success', 'Product added successfully.');
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
    $categories = Category::all();
    return view('products.add-product',['categories' => $categories]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request,$id)
  {
    $product = Product::find($id);

        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->describtion = $request->input('describtion');
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->product_image = $imageName;
          }
          $product->save();
           return redirect('/admin/products')->with('success', 'Product updated successfully.');
   
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    $product = Product::find($id);
    $categories = Category::all();
    return view('products.edit-product',['categories' => $categories,'product' => $product]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $product = Product::find($id);
    $product->delete();
        // Alert::success('Success', 'Team deleted successfully');
        
        return redirect()->route('/admin/products');
  }
  
}

?>
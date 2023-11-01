<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class CategoryController extends Controller 
{

    public $id;

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $category = Category::find($this->id);
        
        return view('productsCategory.edit-product-category',['category'=>$category]);
    }
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $categories = Category::all();
    return view('productsCategory.index', ['categories' => $categories]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('productsCategory.add-product-category');
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
        'name'=>'required'
      ]);
   // Create and save the new productd
      $category = Category::create([...$request->all()]);
      return redirect('/admin/categories')->with('success', 'Category added successfully.');
      
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
    
    return view('productsCategory.add-product-category');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Request $request,$id)
  {
    $category = Category::find($id);


        $category->name = $request->input('name');
       
          $category->save();
           return redirect('/admin/categories')->with('success', 'Category updated successfully.');
   
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,$id)
  {
    $category = Category::find($id);
    // $categories = Category::all();
    return view('productsCategory.edit-product-category',['category' => $category]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    $category->delete();
        // Alert::success('Success', 'Team deleted successfully');
        
        return redirect('/admin/categories')->with('success', 'Product Deleted successfully.');
  }
  
}

?>
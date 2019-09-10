<?php

namespace App\Http\Controllers\Admin;

use App\CategorieProduct;
use App\Category;
use App\Order;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        return view('admin/products/create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\ProductCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {

        $pathImage = $request->thumbnail->store(
            "/images/products/{$request->sku}",
            'public'
        );

        $product = new Product();

        $product->sku = $request->sku;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->price = $request->price;
        $product->in_stock = $request->in_stock;
        $product->thumbnail = $pathImage;

        if($product->save()){
            foreach ($request->categories as $categoryId){
                $product->categories()->attach($categoryId);
            }
            if (!empty($request->product_gallery)) {
                foreach ($request->product_gallery as $product_gallery) {
                    $pathProductGallery = $product_gallery->store(
                        "/images/products/{$request->sku}",
                        'public'
                    );
                    $product->galleryImages()->attach(
                        $pathProductGallery
                    );
                }
            }
        }
            $products = Product::paginate(7);
            return view('product/product', ['products' => $products]);

        return back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::find($id);
        $categories = Category::all();
        return view('admin/products/edit', ['categories' => $categories])->with('products', $product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->sku = $request['sku'];
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->short_description = $request['short_description'];
        $product->price = $request['price'];
        $product->in_stock = $request['in_stock'];
        $product->thumbnail = $request['thumbnail'];

        $product->save();

        $products = Product::paginate(7);
        return view('product/product', ['products' => $products])->with('success', 'Product has been updated');;

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->order()->detach();
        $product->categories()->detach();
        $product->followers()->detach();
        $product->delete();
        $products = Product::paginate(7);
        return view('product/product', ['products' => $products])
            ->with('success', 'Stock has been deleted Successfully');;

    }
}

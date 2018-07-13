<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreProductsRequest;
use App\Http\Requests\Site\UpdateProductsRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
  use \App\Http\Controllers\Traits\FileUploadTrait;
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $products = Product::all();
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsRequest $request)
    {
        //
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
          $request=$this->saveFiles($request);


    //$this->postImage->add($input);
        Product::create($request->all());
        // return redirect('/shop');
        return redirect()->route('admin.products.index');
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
        if (! Gate::allows('site_manage')) {
            return view('shop.product-view',compact('product'));
        }
        //return view('admin.products.index',compact('product'));
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
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        $product = Product::findOrFail($id);
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $request, $id)
    {
        //
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        $request=$this->saveFiles($request);
        $product = Product::findOrFail($id);

        $product->update($request->all());
        return redirect()->route('admin.products.index');
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
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('site_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Product::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}

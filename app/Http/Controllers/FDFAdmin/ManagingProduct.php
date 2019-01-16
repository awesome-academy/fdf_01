<?php

namespace App\Http\Controllers\FDFAdmin;

use Illuminate\Http\Request;
use App\Http\Requests\ManagingProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ManagingProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Category::select('categories.name as nameCate', 'products.*')
            ->join('products' ,'categories.id', '=', 'products.categories_id')->get();
        
        return view('fdfadmin.product.index', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catList = Category::all();

        return view('fdfadmin.product.add', compact('catList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagingProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->txtName;
        $product->description = $request->txtDescription;
        $product->price = $request->txtPrice;
        $product->quantity = $request->txtQuantity;

        $picture = "";
        if($request->file('txtAvatar') != null)
        {
            $file = $request->file('txtAvatar');
            $fileExtension = $file->getClientOriginalExtension();
            $picture = 'product-'.time().'.'.$fileExtension;
            $uploadPath = public_path('images/product/avatar/');
            $file->move($uploadPath, $picture);
        }
        $product->avatar = $picture;
        $product->status = config('setting.status_active');
        $product->categories_id = $request->txtCategory;
        $checkSave = $product->save();
        if($checkSave)
        {

            return redirect(route('managing-product.index'))->with('alert',trans('managing_product.add_successful'));
        } else {

            return redirect(route('managing-product.index'))->with('alert',trans('managing_product.add_fail'));
        }
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
        $productList = Product::findOrFail($id);
        $catList = Category::all();

        return view('fdfadmin.product.edit', compact('productList', 'catList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagingProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->txtName;
        $product->description = $request->txtDescription;
        $product->price = $request->txtPrice;
        $product->quantity = $request->txtQuantity;

        $picture = "";
        $old_avatar = $product->avatar;
        $oldPath = public_path('images/product/avatar/').$old_avatar;
        if($request->file('txtAvatar') != null)
        {
            if($old_avatar != "default.jpg") {
                unlink($oldPath);
            }
            $file = $request->file('txtAvatar');
            $fileExtension = $file->getClientOriginalExtension();
            $picture = 'avatar-'.time().'.'.$fileExtension;
            $uploadPath = public_path('images/product/avatar/');
            $file->move($uploadPath, $picture);
        } else {
            $picture = $old_avatar;
        }

        $product->avatar = $picture;
        $product->status = config('setting.status_active');
        $product->categories_id = $request->txtCategory;
        $checkSave = $product->save();
        if($checkSave)
        {

            return redirect(route('managing-product.index'))->with('alert', trans('managing_product.edit_successful'));
        } else {

            return redirect(route('managing-product.index'))->with('alert', trans('managing_product.edit_fail'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $productDel = Product::findOrFail($id);
            $oldPicture = $productDel->avatar;
            if ($oldPicture != "default.jpg")
            {
                $oldPath = public_path('images/product/avatar/').$oldPicture;
                unlink($oldPath);
            }
            $productDel->delete();

            return redirect()->route('managing-product.index')->with('msgDelete', trans('admin_page.delete_success'));
        } catch (Exception $exception) {

            return redirect()->route('managing-product.index')->with('msgDelete', trans('admin_pages.delete_failed'));
        }
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $presentStatus = $request->presentStatus;
        if($presentStatus == config('setting.status_active'))
        {
            Product::where('id', $id)->update(['status' => config('setting.status_deactive')]);
        }
        else {
            Product::where('id', $id)->update(['status' => config('setting.status_active')]);
        }

        return view('fdfadmin.product.ajaxUpdateStatus', compact('id', 'presentStatus'));
    }

}

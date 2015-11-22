<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function index()
    {
        $products = $this->model->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $request)
    {
        $data = $request->all();
        $product = $this->model->fill($data);
        $product->save();
        return redirect('admin/products');
    }

    public function edit($id, Category $category)
    {
        $product = $this->model->find($id);
        $categories = $category->lists('name', 'id');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $this->model->find($id)->update($request->all());
        return redirect('admin/products');
    }

    public function destroy($id)
    {
        $product = $this->model->find($id);
        if ($product->images) {
            foreach ($product->images as $image) {
                if (Storage::disk('local_public')->exists($image->id.'.'.$image->extension)) {
                    Storage::disk('local_public')->delete($image->id . '.' . $image->extension);
                }
                $image->delete();
            }
        }
        $product->delete();
        return redirect('admin/products');
    }

    public function images($id)
    {
        $product = $this->model->find($id);
        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->model->find($id);
        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);
        Storage::disk('local_public')->put($image->id.'.'.$extension, File::get($file));
        return redirect()->route('admin.products.images', ['id' => $id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        if (Storage::disk('local_public')->exists($image->id.'.'.$image->extension)) {
            Storage::disk('local_public')->delete($image->id . '.' . $image->extension);
        }
        $product = $image->product;
        $image->delete();

        return redirect()->route('admin.products.images', ['id' => $product->id]);
    }

}

<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{

    private $modelCategory;
    private $modelProduct;

    public function __construct(Category $category, Product $product)
    {
        $this->modelCategory = $category;
        $this->modelProduct = $product;
    }

    public function index()
    {
        $categories = $this->modelCategory->all();
        $featured   = $this->modelProduct->featured()->limit(3)->orderBy(DB::raw('RAND()'))->get();
        $recommend  = $this->modelProduct->recommend()->limit(3)->orderBy(DB::raw('RAND()'))->get();

        return view('store.index', compact('categories', 'featured', 'recommend'));
    }

    public function category($id)
    {
        $categories = $this->modelCategory->all();
        $category = $this->modelCategory->find($id);
        $products = $this->modelProduct->ofCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));
    }

    public function product($id)
    {
        $categories = $this->modelCategory->all();
        $product = $this->modelProduct->find($id);

        return view('store.product', compact('categories', 'product'));
    }

}
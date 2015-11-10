<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function index()
    {
        $categories = $this->model->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        $data = $request->all();
        $category = $this->model->fill($data);
        $category->save();
        return redirect('admin/categories');
    }

    public function edit($id)
    {
        $category = $this->model->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $this->model->find($id)->update($request->all());
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        return redirect('admin/categories');
    }

}

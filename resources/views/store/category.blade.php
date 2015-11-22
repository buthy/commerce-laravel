@extends('template')

@section('title')
    Categorias | E-Shop
@endsection

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">{{ $category->name }}</h2>
            @include('store.partial.products', ['products' => $products])
        </div>
    </div>
@endsection
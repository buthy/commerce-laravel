@extends('template')

@section('title')
    Home | E-Shop
@endsection

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">Em destaque</h2>
            @include('store.partial.products', ['products' => $featured])
        </div>

        <div class="features_items">
            <h2 class="title text-center">Recomendados</h2>
            @include('store.partial.products', ['products' => $recommend])
        </div>
    </div>
@endsection
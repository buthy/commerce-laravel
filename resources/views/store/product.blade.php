@extends('template')

@section('title')
    Produto | E-Shop
@endsection

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details">
            <div class="col-sm-5">
                <div class="view-product">
                    @if (count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="{{ $product->name }}" />
                    @else
                        <img src="{{ url('images/no-img.jpg') }}" alt="{{ $product->name }}" alt="{{ $product->name }}" />
                    @endif
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach ($product->images as $img)
                                <a href="#">
                                    <img src="{{ url('uploads/'.$img->id.'.'.$img->extension) }}" width="80" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <h2>{{ $product->name }} <small>{{ $product->category->name }}</small></h2>
                    <p>{{ $product->description }}</p>
                    <span>
                        <span>R$ {{ money_format('%.2n', $product->price) }}</span>
                        <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Adicionar no Carrinho
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('template')

@section('title')
    Editar produto
@endsection

@section('content')
    <div class="container">

        <h1>
            Editar produto
            <small>{{ $product->name }}</small>
        </h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
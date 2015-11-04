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

        {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome:', ['class' => 'control-label']) !!}
            {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Preço:', ['class' => 'control-label']) !!}
            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>

        <div class="checkbox">
            <label>
                {!! Form::checkbox('featured', 1, false) !!} Produto em destaque
            </label>
        </div>

        <div class="checkbox">
            <label>
                {!! Form::checkbox('recommend', 1, false) !!} Produto recomendado
            </label>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
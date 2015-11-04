@extends('template')

@section('title')
    Novo produto
@endsection

@section('content')
    <div class="container">

        <h1>Novo produto</h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'products.store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome:', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Preço:', ['class' => 'control-label']) !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
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
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
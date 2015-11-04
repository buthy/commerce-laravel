@extends('template')

@section('title')
    Editar categoria
@endsection

@section('content')
    <div class="container">

        <h1>
            Editar categoria
            <small>{{ $category->name }}</small>
        </h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nome:', ['class' => 'control-label']) !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descrição:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
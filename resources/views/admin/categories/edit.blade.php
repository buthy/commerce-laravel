@extends('admin.template')

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

        {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'put']) !!}

        @include('admin.categories._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
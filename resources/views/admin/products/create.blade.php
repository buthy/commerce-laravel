@extends('admin.template')

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

        {!! Form::open(['route' => 'admin.products.store']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'Separe as tags por vírgula']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.products.index') }}" class="btn btn-default">Cancelar</a>
        </div>

        {!! Form::close() !!}

    </div>
@endsection
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

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
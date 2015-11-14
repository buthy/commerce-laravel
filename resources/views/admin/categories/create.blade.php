@extends('admin.template')

@section('title')
    Nova categoria
@endsection

@section('content')
    <div class="container">

        <h1>Nova categoria</h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'admin.categories.store']) !!}

        @include('admin.categories._form')

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
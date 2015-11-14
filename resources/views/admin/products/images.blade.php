@extends('admin.template')

@section('title')
    Imagens
@endsection

@section('content')
    <div class="container">

        <h1>Imagens <small>{{ $product->name }}</small></h1>

        <a href="{{ route('admin.products.images.create', ['id' => $product->id]) }}" class="btn btn-success">Nova imagem</a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Voltar</a>
        <br><br>

        <table class="table table-responsive table-bordered">
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Extensão</th>
                <th>Ações</th>
            </tr>

            @foreach ($product->images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td>
                    <img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" height="40">
                </td>
                <td>{{ $image->extension }}</td>
                <td>
                    <a href="{{ route('admin.products.images.destroy', $image->id) }}" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>
@endsection
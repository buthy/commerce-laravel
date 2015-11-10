@extends('template')

@section('title')
    Produtos
@endsection

@section('content')
    <div class="container">

        <h1>Produtos</h1>

        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Novo produto</a>
        <br><br>
        <table class="table table-responsive table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>

            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ str_limit($product->description, $limit = 50, $end = '...') }}</td>
                <td>
                    <a href="{{ route('admin.products.images', ['id' => $product->id ]) }}" class="btn btn-sm btn-default">Imagens</a>
                    <a href="{{ route('admin.products.edit', ['id' => $product->id ]) }}" class="btn btn-sm btn-default">Editar</a>
                    <a href="{{ route('admin.products.destroy', ['id' => $product->id ]) }}" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach

        </table>

        {!! $products->render() !!}

    </div>
@endsection
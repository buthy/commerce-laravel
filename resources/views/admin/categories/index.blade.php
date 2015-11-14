@extends('admin.template')

@section('title')
    Categorias
@endsection

@section('content')
    <div class="container">

        <h1>Categorias</h1>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Nova categoria</a>
        <br><br>
        <table class="table table-responsive table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>

            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', ['id' => $category->id ]) }}" class="btn btn-sm btn-default">Editar</a>
                    <a href="{{ route('admin.categories.destroy', ['id' => $category->id ]) }}" class="btn btn-sm btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach

        </table>

        {!! $categories->render() !!}

    </div>
@endsection
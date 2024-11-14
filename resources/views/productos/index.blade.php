@extends('layouts.app')
@section('title', 'Productos')
@section('content')

<h1>Productos</h1>
<div class="text-end">
    <a href="{{ route('product.create') }}" class="btn btn-warning">CREAR</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Categoria</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->category }}</td>
            <td>
                <a href="{{ route('product.update', $product->id)}}" class="btn btn-primary"> Editar </a>
            </td>
            <td>
                <form action="{{ route('product.destroy', $product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type='submit' class="btn btn-danger">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products->links('pagination::bootstrap-4') }}

@endsection

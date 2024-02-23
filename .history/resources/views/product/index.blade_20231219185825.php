@extends('layouts.app')
    @section('content')
        <div class="container mt-2">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Price</th>
                        <th>Tags</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @foreach ($product->tags as $tag)
                                    {{ $tag->name }} {{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at }}</td>
                            <td>
                                <form action="{{ route('product.destroy', $product->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
    @endsection

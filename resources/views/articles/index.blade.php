@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left d-inline">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
            </div>

            <div class="float-right d-inline">
                <form action="" method="GET" class="d-flex">
                   
                    <input type="text" name="name" class="form-control" placeholder="Search Article">
                    <button type="submit" class="btn btn-primary">Search</button>

                </form>

            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articles as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('articles.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('articles.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('articles.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $articles->links() !!}
</div>
@endsection
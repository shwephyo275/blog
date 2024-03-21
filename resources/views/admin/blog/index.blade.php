@extends('admin.layout.master')

@section('content')

<div>
    <a href="{{ route('admin.blog.create') }}" class="btn btn-dark">Create</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>
                Image
            </th>
            <th>Title</th>
            <th>Category</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td><img src="{{ asset('/images/'.$d->image) }}" style="width:200px" class="img-thumbnail" alt=""></td>
            <td>{{ $d->title }}</td>
            <td>
                @foreach ($d->category as $c)
                <span class="badge badge-dark">{{ $c->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('admin.blog.edit', $d->id) }}" class="btn btn-primary">Edit</a>
                <form class="d-inline" action="{{ route('admin.blog.destroy', $d->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

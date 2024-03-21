@extends('admin.layout.master')

@extends('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


@section('content')
<div>
    <a href="{{ route('admin.blog.index') }}" class="btn btn-dark">Back</a>
</div>

<form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="">Enter Title</label>
        <input type="text" name="title" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="">Choose Category</label>
        <select name="category[]" id="category" multiple>
            @foreach ($category as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <input type="submit" value="Create" class="btn btn-dark">

</form>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('#category').select2();
</script>

@endsection

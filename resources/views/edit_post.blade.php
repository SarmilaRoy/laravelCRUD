
@extends('template')

@section('main-content')

<h1>Edit Post</h1>
<div class="container my-5 p-4 shadow">
    <form action="{{ route('updatepost') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="postid" value="{{ $editPost->id }}">
        <div class="form-group mb-2">
            <label for="title" class="form-label" >Enter Title</label>
            <input type="text" name="title" value="{{ $editPost->title }}" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label for="img" class="form-label" >Current Image</label>
            <img style="height: 50px;" src="{{ asset($editPost->img_url) }}" alt="">
        </div>

        <div class="form-group mb-2">
            <label for="img" class="form-label" >Select New Image(if you want)</label>
            <input type="file" name="img" class="form-control">
        </div>

        <input type="submit" name="btn_add_post" value="Edit Post" class="btn btn-sm btn-primary w-100">
    </form>
</div>



@endsection
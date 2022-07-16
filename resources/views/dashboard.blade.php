@extends('template')

@section('main-content')

<h2>Deshboard</h2>

<div class="container shadow p-4 my-3">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($posts as $postData)
                    
                <tr>
                    <td>{{ $postData->title }}</td>
                    <td>
                        <img style="height: 50px;" src="{{ asset($postData->img_url) }}" alt="">
                    </td>
                    <td>
                        <a href="{{ route('editpost',$postData->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('deletepost',$postData->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

@endsection
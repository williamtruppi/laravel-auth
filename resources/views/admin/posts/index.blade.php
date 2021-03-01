@extends('layouts.dashboard')

@section('content')
    <h1>All post for the Admin</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td scoper="row">{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>
                    <a href="{{route('admin.posts.show', ['post' => $post->slug])}}" class="btn btn-primary"><i class="fas fa-eye fa-xs fa-fw"></i></a>
                    <a href="{{route('admin.posts.create')}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
                    <a href="#" class="btn btn-danger"><i class="fas fa-trash fa-xs fa-fw"></i></a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
    
@endsection
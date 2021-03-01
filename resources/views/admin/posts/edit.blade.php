@extends("layouts.dashboard")

@section("content")

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <h1>Edit post {{$post->title}}</h1>
    <form action="{{ route('admin.posts.update', ['post'=> $post->id]) }}" method="post">
        @csrf

        @method("PUT") <!-- passiamo PUT poichè il metodo più indicato per EDIT -->
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body" rows="3">{{$post->body}}</textarea>
        </div>
        @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      {{--   <span>Choose a category</span>
        <select name="category_id" id="category_id">
            <option value="" selected disabled hidden>Choose here</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <span>Choose tags: </span>
        <div class="form-group">
          <label for="tags"></label>
          <select class="form-control" name="tags[]" id="tags" multiple>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
          </select>
        </div> --}}

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection

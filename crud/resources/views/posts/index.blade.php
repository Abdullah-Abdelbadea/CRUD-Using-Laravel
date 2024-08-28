@extends('layouts.app')
@section('title', 'all posts')
@section('content')
{{-- @dd($posts) --}}
  <div class="text-center" >
    <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
    <form action="{{route('softdeleted')}}" method="POST" style="display: inline" >
      @csrf
             <button type="submit" class="btn btn-danger">Deleteed Posts</button>
    </form>
            </div>
    

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Posted By</th>
          <th scope="col">Created At</th>
          <th scope="col">Updated At</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          @foreach ($posts as $post )
           
          <th scope="row">{{  $post->id}}</th>
          <td>{{  $post->title}}</td>
          <td>{{$post->post_creator->name}}</td>
          <td>{{  $post->created_at}}</td>
          <td>{{  $post->updated_at}}</td>
          <td>
              <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              <form action="{{route('posts.destroy',$post->id)}}" method="POST" style="display: inline" class="delete">
                @csrf
                @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
              </form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <script>
      const deleteForms = document.querySelectorAll('.delete');
      deleteForms.forEach(deleteForm => {
        deleteForm.addEventListener('submit', function(e){
          const userConfirmed = confirm("Are you sure you want to delete?");
          if(!userConfirmed){
            e.preventDefault();
          }
        })
      })
    </script>

@endsection




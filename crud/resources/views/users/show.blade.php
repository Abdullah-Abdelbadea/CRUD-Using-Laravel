@extends('layouts.app')

@section('title', $user['name'])
      @section('content')
  
        <div class="card">
            <div class="card-header">
              User Info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name : {{$user['name']}}</h5>
              <h5 class="card-title">Email : {{$user['email']}}</h5>
              
            </div>
          </div>
     <br>
          <div class="card" >
            <div class="card-header">
              Posts By {{$user->name}}
            </div>
            <div class="card-body">
              @forelse ($user->posts as $post )
              <h5 class="card-title">Title : {{$post['title']}}</h5>
              <p class="card-text">Description : {{$post['description']}}</p>
              <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">View</a>
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
              <form action="{{route('posts.destroy',$post->id)}}" method="POST" style="display: inline" class="delete">
                @csrf
                @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              
        
              <hr>

              @empty
              <h5 class="card-title text-center text-danger">No Posts</h5>
              @endforelse
             
              
            
            </div>
          </div>
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
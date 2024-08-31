@extends('layouts.app')
@section('title', 'all users')
@section('content')
{{-- @dd($posts) --}}
@if(Session::has('msg'))
  <div class="alert alert-success">
      {{Session::get('msg')}}
  </div>
@endif
  <div class="text-center" >
    <a href="{{route('users.create')}}" class="btn btn-success">Create User</a>
    {{-- <form action="{{route('softdeleted')}}" method="POST" style="display: inline" >
      @csrf
             <button type="submit" class="btn btn-danger">Deleteed Posts</button>
    </form> --}}
            </div>
    

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">Email</th>
          <th scope="col">Created At</th>
          <th scope="col">Updated At</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          @foreach ($users as $user )
           
          <th scope="row">{{  $user->id}}</th>
          <td>{{  $user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{  $user->created_at}}</td>
          <td>{{  $user->updated_at}}</td>
          <td>
              <a href="{{route('users.show',$user->id)}}" class="btn btn-info">View</a>
              <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
              <form action="{{route('users.destroy',$user->id)}}" method="POST" style="display: inline" class="delete">
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




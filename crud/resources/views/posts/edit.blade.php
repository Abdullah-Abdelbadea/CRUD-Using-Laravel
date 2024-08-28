@extends('layouts.app')

@section('title', 'Update Post')
      @section('content')
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>

              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>

              @endforeach
          </ul>
      </div>
  @endif
      <form method="POST" action="{{route('posts.update',$post['id'])}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title"     class="form-control" id="title" value="{{$post['title']}}">
         
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea  name="description"  class="form-control" id="exampleFormControlTextarea1"  rows="3">{{$post['description']}}</textarea>
          </div>
        <div class="mb-3">
          <label for="creator" class="form-label">Post Creator</label>
          <Select name="posted_by" calss="form-control" >
            @foreach ($users as $user)
            <option value="{{$user->id}}"  @if($user_edited->id == $user->id ) 
                 @selected(true)
              @endif >{{$user->name}}</option>
            @endforeach
          </Select>
                </div>
   
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
   
        

      @endsection
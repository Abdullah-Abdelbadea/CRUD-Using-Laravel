@extends('layouts.app')

@section('title', 'Create Post')
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
  @if(Session::has('msg'))
  <div class="alert alert-success">
      {{Session::get('msg')}}
  </div>
@endif
      <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title"     class="form-control" id="title" value="{{old('title')}}" >

        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea  name="description"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('description')}}</textarea>
          </div>
        <div class="mb-3">
          <label for="creator" class="form-label">Post Creator</label>
          <Select name="posted_by" calss="form-control">
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </Select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
      </form>



      @endsection

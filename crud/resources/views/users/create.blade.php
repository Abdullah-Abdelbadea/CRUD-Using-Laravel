@extends('layouts.app')

@section('title', 'Create User')
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
      <form method="POST" action="{{route('users.store')}}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name"     class="form-control" id="name" value="{{old('name')}}" >

        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email"     class="form-control" id="email" value="{{old('email')}}" >
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password"     class="form-control" id="password" >
        </div>
     
        <button type="submit" class="btn btn-success">Submit</button>
      </form>



      @endsection

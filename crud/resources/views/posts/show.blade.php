@extends('layouts.app')

@section('title', $post['title'])
      @section('content')
  
        <div class="card">
            <div class="card-header">
              Post Info 
            </div>
            <div class="card-body">
              <h5 class="card-title">Title : {{$post['title']}}</h5>
              <p class="card-text">Description : {{$post['description']}}</p>
           
            </div>
          </div>
     <br>
          <div class="card" >
            <div class="card-header">
              Post Creator Info 
            </div>
            <div class="card-body">
              <h5 class="card-title">Name: {{$post->post_creator->name}} </h5>
              <p class="card-text">Createdat: {{$post['created_at']}}</p>
            
            </div>
          </div>
      
     @endsection
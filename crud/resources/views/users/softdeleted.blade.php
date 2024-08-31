      @extends('layouts.app')
      @section('title', 'all posts')
      @section('content')
      @if(Session::has('msg'))
      <div class="alert alert-success">
          {{ Session::get('msg') }}
      </div>
  @endif
  

        <div class="text-center" >
       
          <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
          <form action="{{route('softdeleted')}}" method="POST" style="display: inline" class="delete">
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
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                @forelse ($posts as $post )

                <th scope="row">{{  $post->id}}</th>
                <td>{{  $post->title}}</td>
                <td>{{  $post->post_creator->name}}</td>
                <td>{{  $post->created_at}}</td>
                <td>
                   
                    <form action="{{route('restore',$post->id)}}" method="POST" style="display: inline" class="softdelete">
                      @csrf
        
                             <button type="submit" class="btn btn-primary">Restore</button>
                    </form>
                         
                    <form action="{{route('forcedelete',$post->id)}}" method="POST" style="display: inline" class="forcedelete">
                      @csrf
                     
        
                             <button type="submit" class="btn btn-danger">force delete</button>
                    </form>




                </td>
              </tr>
              @empty
                   <tr>
                      <td colspan="5" class="text-center text-danger">No posts found</td>
                   </tr>
             
              @endforelse
            </tbody>
          </table>
          <script>
            const deleteForms = document.querySelectorAll('.softdelete');
            deleteForms.forEach(deleteForm => {
              deleteForm.addEventListener('submit', function(e){
                const userConfirmed = confirm("Are you sure you want to restore this row?");
                if(!userConfirmed){
                  e.preventDefault();
                }
              })
            })

              const deleteForms1 = document.querySelectorAll('.forcedelete');
            deleteForms1.forEach(deleteForm => {
              deleteForm.addEventListener('submit', function(e){
                const userConfirmed = confirm("Are you sure you want to forcedelete this row?");
                if(!userConfirmed){
                  e.preventDefault();
                }
              })
            })
          </script>


    @endsection




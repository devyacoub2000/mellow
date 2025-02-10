

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Add Gallery </h1>
  
    @if(session('msg'))
        <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
    @endif

 <form action="{{route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

       

        <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
               <label for="image"> Image </label> 
               <input type="file" name="image" onchange="showImg(event)"  class="form-control @error('image') is-invalid @enderror" id="image" >
               @error('image') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
                <img src="" id="preview" width="80px">
         </div>
        </div>
        </div>

       

        <button class="btn btn-success"> <i class="fas fa-save"></i> Add </button>
 </form>

@endsection

@section('title', 'Add Gallery')

 @section('js')
     <script type="text/javascript">
          function showImg(e) {
            const [file] = e.target.files;
            if(file) {
               preview.src = URL.createObjectURL(file);
            }
          }
     </script>
 @endsection

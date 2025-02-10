

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Edit blog </h1>
  
    @if(session('msg'))
        <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
    @endif

 <form action="{{route('admin.blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')

        <div class="row">
        
           <div class="col-md-12">
                <div class="mb-3">
               <label for="title">  blog Name </label> 
               <input name="name" class="form-control @error('title') is-invalid @enderror" type="text" placeholder="blog Name"  id="title" value="{{old('name', $blog->name)}}">
               @error('title') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
           </div>

            <div class="col-md-12">
                <div class="mb-3">
               <label for="date">  blog Date </label> 
               <input name="date" class="form-control @error('date') is-invalid @enderror" type="date" placeholder="blog Date"  id="date" value="{{old('date', $blog->date)}}">
               @error('date') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
           </div>
       
        
        <div class="col-md-6">
          <div class="mb-3">
           <label for="image"> Image </label> 
           <input type="file" name="image" onchange="showImg(event)"  class="form-control @error('image') is-invalid @enderror" id="image" >
           @error('image') 
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
           @php 
             $src = '';
             if($blog->image) {
                 $src = asset('images/'.$blog->image->path);
             }
           @endphp
            <img src="{{$src}}" id="preview" width="80px">
           </div>
           </div>

      
            <div class="col-md-12">
                <div class="mb-3">
               <label for="body"> Description </label> 
               <textarea  class="form-control @error('body') is-invalid @enderror" type="text" name="body" placeholder="Description blog: " id="body" rows="4">
                    {{old('body', $blog->body)}}
               </textarea>
               @error('body') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
            </div>
            </div>

        </div>


       
      

        <button class="btn btn-info"> <i class="fas fa-edit"></i> Edit </button>
 </form>

@endsection

@section('title', 'Add Blog')

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

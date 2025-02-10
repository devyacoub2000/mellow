

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Add New service </h1>
  
    @if(session('msg'))
        <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
    @endif

 <form action="{{route('admin.service.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">
        
           <div class="col-md-12">
                <div class="mb-3">
               <label for="name">  service Name </label> 
               <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="service Name"  id="name" value="{{old('name', $service->name)}}">
               @error('name') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
         
           </div>


           <div class="col-md-12">
                <div class="mb-3">
               <label for="svg">  service svg </label> 
               <input name="svg" class="form-control @error('svg') is-invalid @enderror" type="text" placeholder="service svg"  id="svg" value="{{old('svg', $service->svg)}}">
               @error('svg') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
         
           </div>
        

            <div class="col-md-12">
                <div class="mb-3">
               <label for="body"> Description </label> 
               <textarea  class="form-control @error('body') is-invalid @enderror" type="text" name="body" placeholder="Description service: " id="body" rows="4">
                    {{old('body', $service->body)}}
               </textarea>
               @error('body') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
            </div>
            </div>
        </div>


        <button class="btn btn-success"> <i class="fas fa-save"></i> Add </button>
 </form>

@endsection

@section('title', 'Add Service')

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

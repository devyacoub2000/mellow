

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">Add New Room </h1>
  
    @if(session('msg'))
        <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
    @endif

 <form action="{{route('admin.room.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">
        
           <div class="col-md-12">
                <div class="mb-3">
               <label for="title">  Room Name </label> 
               <input name="title" class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Room Name"  id="title" value="{{old('title', $room->title)}}">
               @error('title') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
         
           </div>
        </div>

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

        <div class="col-md-6">
              <div class="mb-3">
               <label for="gallery"> Gallery </label> 
               <input type="file" name="gallery[]" multiple class="form-control @error('gallery') is-invalid @enderror" id="gallery" >
               @error('gallery') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
         </div>
        </div>
        </div>

         <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
               <label for="body"> Description </label> 
               <textarea  class="form-control @error('body') is-invalid @enderror" type="text" name="body" placeholder="Description Room: " id="body" rows="4">
                    {{old('body', $room->body)}}
               </textarea>
               @error('body') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
            </div>
            </div>
        </div>

        <div class="row">
             <div class="col-md-4">
            <div class="mb-3">
            <label for="price">Price</label>
            <input type="number"  id="price" name="price" class="form-control @error('price') is-invalid @enderror"
            placeholder="Price Product: " value="{{old('price'), $room->price}}">
            
            @error('price') 
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
           </div>
           </div> 

           <div class="col-md-4">
             <div class="mb-3">
            <label for="size">Size</label>
            <input type="number" id="size" name="size" class="form-control @error('size') is-invalid @enderror"
            placeholder="Size Room: " value="{{old('size', $room->size)}}">
            
            @error('size') 
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
           </div>

           </div>


           <div class="col-md-4">
             <div class="mb-3">
            <label for="capacity">Capacity</label>
            <input type="number" id="capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror"
            placeholder="Capacity Room: " value="{{old('capacity', $room->capacity)}}">
            
            @error('capacity') 
              <small class="invalid-feedback"> {{$message}} </small>
            @enderror
           </div>

           </div>

           <div class="col-md-6">
                <div class="mb-3">
               <label for="bed">  Room Bed </label> 
               <input name="bed" class="form-control @error('bed') is-invalid @enderror" type="text" placeholder="Room Bed"  id="bed" value="{{old('bed', $room->bed)}}">
               @error('bed') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
         
           </div>

           <div class="col-md-6">
                <div class="mb-3">
               <label for="service">  Room Service </label> 
               <input name="service" class="form-control @error('service') is-invalid @enderror" type="text" placeholder="Room Service"  id="service" value="{{old('service', $room->service)}}">
               @error('service') 
                 <small class="invalid-feedback"> {{$message}} </small>
               @enderror
           </div>
         
           </div>

        </div>
      

        <button class="btn btn-success"> <i class="fas fa-save"></i> Add </button>
 </form>

@endsection

@section('title', 'Add Product')

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

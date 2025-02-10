@extends('admin.master')

@section('css') 
<style>
    .gallery-wrapper {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .gallery-wrapper div {
        position: relative;
        width: 80px;
        height: 90px;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .gallery-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .gallery-wrapper span {
        position: absolute;
        top: 5px;
        right: 5px;
        width: 18px;
        height: 18px;
        background: #eb5e5e;
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-wrapper div:hover span {
        opacity: 1;
    }
</style>
@endsection

@section('content')
<h1 class="h3 mb-4 text-gray-800">Edit Room</h1>

@if(session('msg'))
    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{ session('msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<form action="{{ route('admin.room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="title">Room Name</label>
            <input name="title" class="form-control @error('title') is-invalid @enderror" type="text" placeholder="English Name" id="title" value="{{ old('title', $room->title) }}">
            @error('title') <small class="invalid-feedback">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" onchange="showImg(event)" class="form-control @error('image') is-invalid @enderror" id="image">
            @error('image') <small class="invalid-feedback">{{ $message }}</small> @enderror
            <img src="{{ $room->image ? asset('images/' . $room->image->path) : '' }}" id="preview" width="80px" class="mt-2">
        </div>

        <div class="col-md-6 mb-3">
            <label for="gallery">Gallery</label>
            <input type="file" name="gallery[]" multiple class="form-control @error('gallery') is-invalid @enderror" id="gallery">
            @error('gallery') <small class="invalid-feedback">{{ $message }}</small> @enderror
            @if($room->gallery)
                <div class="gallery-wrapper mt-2">
                    @foreach($room->gallery as $img)
                        <div>
                            <img src="{{ asset('images/' . $img->path) }}">
                            <span onclick="deleImg(event, {{ $img->id }});">x</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="col-md-12 mb-3">
            <label for="body">Description</label>
            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="4">{{ old('body', $room->body) }}</textarea>
            @error('body') <small class="invalid-feedback">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $room->price) }}">
            @error('price') <small class="invalid-feedback">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="size">Size</label>
            <input type="number" id="size" name="size" class="form-control @error('size') is-invalid @enderror" value="{{ old('size', $room->size) }}">
            @error('size') <small class="invalid-feedback">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-4 mb-3">
            <label for="capacity">Capacity</label>
            <input type="number" id="capacity" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $room->capacity) }}">
            @error('capacity') <small class="invalid-feedback">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="bed">Room Bed</label>
            <input name="bed" class="form-control @error('bed') is-invalid @enderror" type="text" id="bed" value="{{ old('bed', $room->bed) }}">
            @error('bed') <small class="invalid-feedback">{{ $message }}</small> @enderror
        </div>

        <div class="col-md-6 mb-3">
            <label for="service">Room Service</label>
            <input name="service" class="form-control @error('service') is-invalid @enderror" type="text" id="service" value="{{ old('service', $room->service) }}">
            @error('service') <small class="invalid-feedback">{{ $message }}</small> @enderror
        </div>
    </div>

    <button class="btn btn-success"><i class="fas fa-edit"></i> Save</button>
</form>
@endsection

@section('title', 'Edit Room')

@section('js')
<script>
    function showImg(e) {
        const [file] = e.target.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }

     function deleImg(e, id) {
            
             $.ajax({
                type: 'get',
                url: '{{route("admin.delete_img")}}/'+id,
                success: (res) => {
                    if(res) {
                       e.target.parentElement.remove();
                    }
                },
                error: (err) => {
                    console.log(err);
                }
             });

        }
          
</script>
@endsection

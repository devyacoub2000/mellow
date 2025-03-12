
@extends('admin.master')

@section('title', 'Settings Page')

@section('content')

   <h1 class="h3 mb-4 text-gray-800" style="cursor: pointer;">
   Welcome To My {{env('APP_NAME')}} Settings</h1>


 <form action="{{route('admin.settings')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')

        <div class="row">
        
           <div class="col-md-12">
                <div class="mb-3">
               <label for="website_name">  Website Name </label> 
               <input class="form-control" name="website_name" type="text" placeholder="Enter Website Name"  id="website_name" value="{{old('website_name', $settings['website_name'])}}">
           </div>
         
           </div>

            <div class="col-md-12">
                <div class="mb-3">
               <label for="website_logo">  Website Logo </label> 
               <input class="form-control" name="website_logo" type="file" id="website_logo" onchange="showImg(event)" value="{{old('website_logo', $settings['website_logo'])}}">
                <?php 
                    $src = asset('images/noo_imagee.jpg');
                   if($settings['website_logo']) {
                     $src = asset('settings/'.$settings['website_logo']);
                  } 
                ?>
              
                 <div class="position-relative d-inline-block">
                   <div id="del_site_img">x</div> 
                   <img src="{{$src}}" id="preview" width="80px" style="margin-top: 10px; display: block; border-radius: 8px;">
                 </div>

               
           </div>
         
           </div>

             <div class="col-md-12">
                <div class="mb-3">
               <label for="facebook">  facebook </label> 
               <input class="form-control" name="facebook" type="url" placeholder="Enter Facebook Url"  id="facebook" value="{{old('facebook', $settings['facebook'])}}">
           </div>
           </div>

           <div class="col-md-12">
                <div class="mb-3">
               <label for="twitter">  twitter </label> 
               <input class="form-control" name="twitter" type="url" placeholder="Enter Twitter Url"  id="twitter" value="{{old('twitter', $settings['twitter'])}}">
           </div>
           </div>

            <div class="col-md-12">
                <div class="mb-3">
               <label for="instagram">  instagram </label> 
               <input class="form-control" name="instagram" type="url" placeholder="Enter Instagram Url"  id="instagram" value="{{old('instagram', $settings['instagram'])}}">
               
           </div>
           </div>

            <div class="col-md-12">
                <div class="mb-3">
               <label for="phone">  Phone </label> 
               <input class="form-control" name="phone" type="tel" placeholder="Enter Phone"  id="phone" value="{{old('phone', $settings['phone'])}}">
           </div>
           </div>

            <div class="col-md-12">
                <div class="mb-3">
               <label for="location">  Location </label> 
               <input class="form-control" name="location" type="text" placeholder="Enter Location"  id="location" value="{{old('location', $settings['location'])}}">
           </div>
           </div>

           <div class="col-md-12">
                <div class="mb-3">
               <label for="email"> Email </label> 
               <input class="form-control" name="email" type="email" placeholder="Enter email"  id="email" 
               value="{{old('email', $settings['email'])}}">
           </div>
           </div>

           <div class="col-md-12">
               <div class="mb-3">
               <label for="copyright"> Copyright </label> 
               <textarea class="form-control" name="copyright" type="text" placeholder="Enter Copyright"  id="copyright" rows="5">
                  	{{old('copyright', $settings['copyright'])}}
               </textarea>
           </div>
           </div>

        </div>


        <button class="btn btn-success"> <i class="fas fa-save"></i> Save </button>
 </form>


@endsection

 @section('js')
    <script type="text/javascript">

        let del_img = document.querySelector('#del_site_img');
        del_img.onclick = () => {
             $.get('/admin/delete_logo_site')
             .done((res) => {
                 del_img.parentElement.remove()
             })
             .fail((err) => {
                console.log(err);
             })
        }
        function showImg(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                const objectUrl = URL.createObjectURL(file);
                preview.src = objectUrl;
                preview.onload = () => URL.revokeObjectURL(objectUrl);
            }
        }
    </script>
@endsection

@section('css')
  <style type="text/css">
       
        #del_site_img {
             position: absolute;
             top: 10px;
             right: 5px;
             width: 20px;
             height: 20px;
             background: red;
             color: white;
             font-size: 15px;
             cursor: pointer;
             border-radius: 50%;
             display: flex;
             justify-content: center;
             align-items: center;
        }


  </style>
@endsection

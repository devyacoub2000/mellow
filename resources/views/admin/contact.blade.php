

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">All Contacts </h1>

   @if(session('msg'))
      <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
		{{session('msg')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	   </div>
  @endif 
 <table class="table table-bordered table-hover">
 	 <tr class="bg-dark text-white">
 	 	<th>#</th>
 	 	<th>Name</th>
 	 	<th>Email</th>
 	 	<th>Action</th>
 	 </tr>
      @forelse($data as $item)
 	 <tr>
 	 	<td> {{$loop->iteration}}</td>
 	 	

 	 	<td>{{$item->name}}</td>
 	 	<td>{{$item->email}}</td>

 	 
 	 	<td>
            
 	 		

 	 		<form class="d-inline" action="{{route('admin.delete_contact', $item->id)}}" method="POST">
 	 			@csrf
 	 			@method('DELETE')

 	 			<button onclick="return confirm('Are You Sure ?!')" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i></button>

 	 		</form>
 	 		
 	 	</td>
 	 </tr>
 	  @empty
 	   <tr>
 	   	  <td colspan="10" class="text-center"> No Data Found </td>
 	   </tr>

 	  @endforelse

 </table>

 {{$data->links()}}
@endsection

@section('title', 'All Contacts')


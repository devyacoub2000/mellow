

@extends('admin.master')

@section('content')
 <h1 class="h3 mb-4 text-gray-800">All Reservations </h1>

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
 	 	<th>Check In</th>
 	 	<th>Check Out</th>
 	 	<th>Number Guest</th>
 	 	<th>Room Name</th>
 	 	<th>Status</th>
 	 	<th>Update</th>
 	 	<th>Action</th>
 	 </tr>
      @forelse($data as $item)
 	 <tr>
 	 	<td> {{$loop->iteration}}</td>
 	 	<td> {{$item->check_in}}</td>
 	 	<td> {{$item->check_out}}</td>
 	 	<td> {{$item->guest}}</td>
 	 	<td> {{$item->room->title}}</td>
 	 	<td style="cursor: pointer;" class="@php if($item->status == 'pending') echo 'text-warning';
 	 		elseif($item->status == 'done') echo 'text-success';
 	 		else echo 'text-danger';
 	 	 @endphp">
 	 	 {{$item->status}}
 	 	</td>
 	 	<td>
    <form action="{{ route('admin.update_status', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <select name="status" class="form-control" onchange="this.form.submit()">
            <option hidden value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>
                Pending
            </option>
            <option value="done" {{ $item->status == 'done' ? 'selected' : '' }}>
                Done
            </option>
            <option value="cancel" {{ $item->status == 'cancel' ? 'selected' : '' }}>
                Cancel
            </option>
        </select>
    </form>
</td>
 	 	<td>
           
 		<form class="d-inline" action="{{route('admin.delete_reservation', $item->id)}}" method="POST">
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

@section('title', 'All Reservations')


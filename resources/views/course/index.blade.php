@extends('adminlte::page')
@section('css')
<style type="text/css">
	.pagination{
		float: right;
		margin: 10px;
	}
</style>
@endsection
@section('content')
@section('title','Course Manager')
@section('content_header')
<div class="card">
  <div class="card-header bg-info">
    Manage Courses
    <a href="{{route('course.add')}}" class="btn btn-success " style="float: right;">+ Course</a>

  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered" id="coursetable">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Course Name</th>
      <th scope="col">Duration</th>
      <th scope="col">Fees</th>
       <th scope="col">Trainer</th>
      <th scope="col">Image</th>
       <th scope="col">Status</th>
       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->fee}}</td>
                        <td>{{$course->duration}}</td>
                        <td>{!!$course->trainer==1?'<span >Nirbhay Singh</span>':'<span >Shah Fahad</span>'!!}</td>
                        <td><a class="btn btn-info" href="{{asset('course_image')}}/{{$course->image}}" target="_blank">view</a></td>
                        <td>{!!$course->status==1?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Disabled</span>'!!}</td>
                        <td> <button  class="btn btn-success mr-4">Edit</button><button class="btn btn-danger" onclick="deleteCourse('{{Crypt::encrypt($course->id)}}')">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>



</table>
{{$courses->links()}}
</div></div>
@stop
@section('js')
<script>
	function deleteCourse(id){
		const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
  	$.ajax({
  		type:'POST',
  		url: "{{route('delete.course')}}",
  		data:{id:id,_token:"{{csrf_token()}}"},
  		success:function(data){
  			if(data=="false"){
  				Swal.fire('something went wrong');
  			}
  			else{
  				Swal.fire('Operation Excecuted Successfully');
  				location.reload();
  			}
  		}
  	
  	});
    // swalWithBootstrapButtons.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
  }
})
	}
</script>
@if(Session::has('success'))
<script >
	Swal.fire({
  icon: 'success',
  title: '{{Session::get("success")}}',
  text: 'Congratulations! Course Added Successfully',
})

</script>
@endif
@if(Session::has('error'))
<script >
	Swal.fire({
  icon: 'error',
  title: '{{Session::get("error")}}',
  text: 'something went wrong!!!',
})

</script>
@endif
@endsection
@endsection
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
@section('title','Staff Manager')
@section('content_header')
<div class="card">
  <div class="card-header bg-info">
    Manage Staff
    <a href="{{route('staff.add')}}" class="btn btn-success" style="float: right;">+ Staff</a>

  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
       <th scope="col">phone</th>
       <th scope="col">Qualification</th>
      <th scope="col">Courses Assigned</th>
      <th scope="col">age</th>
       <th scope="col">Address</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($staffs as $staff)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->email}}</td>
                        <td>{{$staff->phone}}</td>
                        <td>{{$staff->qualification}}</td>
                        <td>{{$staff->course}}</td>
                        <td>{{$staff->age}}</td>
                        <td>{{$staff->address}}</td>
                        

                        <!-- <td>{!!$staff->trainer==1?'<span >Nirbhay Singh</span>':'<span >Shah Fahad</span>'!!}</td> -->
                        <td><a class="btn btn-info" href="{{asset('staff_image')}}/{{$staff->image}}" target="_blank">view</a></td>
                       <!--  <td>{!!$staff->status==1?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Disabled</span>'!!}</td> -->
                        <td> <a  class="btn btn-success mr-4" href="{{url('manage/added/staff',Crypt::encrypt($staff->id))}}">Edit</a><button class="btn btn-danger" onclick="deleteCourse('{{Crypt::encrypt($staff->id)}}')">Delete</button></td>
                    </tr>
                    @endforeach
  </tbody>
</table>
  </div>
</div>

@stop
@section('js')
@if(Session::has('success'))
<script >
  Swal.fire({
  icon: 'success',
  title: '{{Session::get("success")}}',
  text: 'Congratulations! Staff Added Successfully',
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
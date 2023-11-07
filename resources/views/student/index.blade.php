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
@section('title','Student Manager')
@section('content_header')
<div class="card">
  <div class="card-header bg-info">
    Manage Student
    <a href="{{route('student.add')}}" class="btn btn-success" style="float: right;">+ Student</a>

  </div>
  <div class="card-body">
    <table class="table table-striped table-bordered">
  <thead>
     <tr>
                                <th>S.no</th>
                                <th>Student's Name</th>
                                <th>Student's Id</th>
                                <th>More Details</th>
                                <th>Action</th>
                            
                            </tr>
  </thead>
  <tbody>
    @foreach($student as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->firstname??'NA'}}</td>
                                        <td>{{$student->stu_id??'NA'}}</td>
                                        <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Details</button> </td>
                                        <td>
                                        <a class="btn text-success mr-2"><i class="fa fa-edit"></i></a>
                                         <a onclick="deletestudent('{{Crypt::encrypt($student->id)}}')" class="btn text-danger"><i class="fa fa-trash"></i></a>
                                        </td>

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
@extends('adminlte::page')
@section('content')
@section('title','Staff Manager')
@section('content_header')
<div class="conatiner-fluid">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title">Add New Staff</h5>
        </div>
        <div class="card-body">
            <form action="{{route('save.staff')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="form-group col-sm-6">
                    <label for="">Staff Name: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control @error('course_name') is-invalid @enderror" name="name">
                    @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Email: <small class="text-danger">*</small></label>
                    <input type="email" class="form-control" name="email">
                    @error('email') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">contact: <small class="text-danger">*</small></label>
                    <input type="number" class="form-control" name="contact">
                    @error('contact') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Qualification: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="qualification">
                    @error('qualification') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group col-sm-6" >
                    <label for="">Courses: <small class="text-danger">*</small></label>
                   <select name="courses[]" id="" class="form-control selectpikker" multiple="multiple">
                    <!-- <option>--please select--</option> -->
                        
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}/{{$course->duration}}</option>
                        
                        @endforeach
                    </select>
                    @error('courses') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Age: <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="age">
                    @error('age') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Address: <small class="text-danger">*</small></label>
                    <textarea class="form-control" name="address"></textarea>
                    @error('address') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Staff Image: <small class="text-danger">*</small></label>
                    <input type="file" class="form-control" name="image">
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                </div>
                
                
                
                
                
                </div>
                
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Clear</button>
            </form>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
    $(document).ready(function() {
    $('.selectpikker').select2();
});
</script>

@endsection
@endsection
@extends('adminlte::page')
@section('content_header')
@section('content')
@section('title', 'Update Staff')



      <div class="container-fluid mt-4">

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Update {{$select_data->name}}'s Details</h3>
              </div>

              <form action="{{route('update.staff')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value={{Crypt::encrypt($select_data->id)}} name="token">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Name: <small class="text-danger">*</small></label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{old('name',$select_data->name)}}">
                    @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Email: <small class="text-danger">*</small></label>
                    <input type="Email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="{{old('email',$select_data->email)}}">
                    @error('email') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Phone Number: <small class="text-danger">*</small></label>
                    <input type="number" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone number" value="{{old('phone',$select_data->phone)}}">
                    @error('phone') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Qualification: <small class="text-danger">*</small></label>
                    <input type="text" name="qualification" class="form-control" id="exampleInputEmail1" placeholder="Enter qualification" value="{{old('qualification',$select_data->qualification)}}">
                    @error('qualification')<span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Courses: <small class="text-danger">*</small></label>

                    <select name="courses[]" id="" class="form-control bs_custom_select" multiple>

                        @foreach($courses as $course)
                        <option value="{{$course->id}}" {{in_array($course->id,json_decode($select_data->course,true))?'selected':''}}>{{$course->course_name.'/'.$course->duration}}</option>

                        @endforeach
                    </select>

                    @error('courses')<span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Age: <small class="text-danger">*</small></label>
                    <input type="number" name="age" class="form-control" id="exampleInputEmail1" placeholder="Enter Age" value="{{old('age',$select_data->age)}}">
                    @error('age') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Address: <small class="text-danger">*</small></label>
                    <textarea name="address" id=""  rows="3" class="form-control">{{old('address',$select_data->address)}}</textarea>
                    @error('address') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                      <label for="exampleInputFile"> Image <i class="fas fa-images"></i><small class="text-danger">*</small></label>

                    <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="form-control" name="image" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    </div>
                        </div>
                    </div>



                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Clear</button>
                </div>
              </form>
            </div>

            </div>

@stop
@section('js')
<script>
    $(document).ready(function() {
    $('.bs_custom_select').select2({
        placeholder:"Select Courses",

        theme:"classic"
    });
});
</script>
@if(Session::has('success'))
<script>
    Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: '{{Session::get("success")}}',
    })

</script>
@endif
@if(Session::has('error'))
<script>
    Swal.fire({
    icon: 'success',
    title: 'Congratulations',
    text: '{{Session::get("error")}}',
    })

</script>
@endif
@endsection
@endsection
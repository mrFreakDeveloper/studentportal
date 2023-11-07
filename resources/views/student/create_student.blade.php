@extends('adminlte::page')
@section('content')
@section('title','Student Manager')
@section('content_header')
<div class="conatiner-fluid">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title">Register a Student</h5>
        </div>
        <div class="card-body">
            <form action="{{route('save.student')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">

                  <div class="form-group col-sm-4">
                    <label for="">Reg No: <small class="text-danger">*</small></label>
                    <input type="text" name="Reg_no" class="form-control" id="" placeholder="">
                    @error('Reg_no') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                  <div class="form-group col-sm-4">
                    <label for=""> Full Name: <small class="text-danger">*</small></label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Enter Name">
                    @error('name') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="">Date of birth: <small class="text-danger">*</small></label>
                    <input type="date" name="dob" class="form-control" id="" >
                    @error('dob') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="">Student Email: <small class="text-danger">*</small></label>
                    <input type="Email" name="email" class="form-control" id="" placeholder="Enter Email">
                    @error('email') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="">Student Contact No: <small class="text-danger">*</small></label>
                    <input type="number" name="phone" class="form-control" id="" placeholder="Enter Phone number">
                    @error('phone') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="">Student Emergency Contact No: <small class="text-danger">*</small></label>
                    <input type="number" name="emergency_phone" class="form-control" id="" placeholder="Enter Phone number">
                    @error('emergency_phone') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="">Student ID Type: <small class="text-danger">*</small></label>
                    <select name="id_type" id="" class="form-control selectpikker " multiple="multiple">
                        <option value="">Please Select</option>
                        <option value="COLLEGE ID">COLLEGE ID</option>
                        <option value="AADHAAR NO">AADHAAR NO</option>
                    </select>
                    @error('id_type') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                    <label for="">Enter ID No: <small class="text-danger">*</small></label>
                    <input type="text" name="id_no" class="form-control" id="" >
                    @error('id_no') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    
                    
                    <div class="form-group col-sm-4">
                    <label for="">Designaton: <small class="text-danger">*</small></label>
                    <input type="text" name="designaton" class="form-control" id="" placeholder="Enter designaton">
                    @error('designaton') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="">Student Institute/College Name: <small class="text-danger">*</small></label>
                    <input type="text" name="clg" class="form-control" id="" placeholder="Enter qualification">
                    @error('clg') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="">Student Institute/College Address: <small class="text-danger">*</small></label>
                    <input type="text" name="clg_add" class="form-control" id="" placeholder="Enter qualification">
                    @error('clg_add') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <hr>
                    <div class="form-group col-sm-12">
                    <label for=""> Choose Your Courses:<small class="text-danger">*</small></label>
                  <div class="row ml-5">
                  @foreach($courses as $course)
                    <div class="col-sm-2">
                    <input class="form-check-input p-4" type="radio" name="courses[]" value="{{$course->id}}" id="flexCheckIndeterminate" onclick="getFee('{{$course->id}}')">
                   
                   <label class="form-check-label" for="flexCheckIndeterminate">
                   {{$course->course_name}}/{{$course->duration}}
                   </label>
                  </div>
                  @endforeach
                  </div>
                    
                    @error('courses') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    
                    <label for="">Select Your Trainer: <small class="text-danger">*</small></label>
                   <select name="trainer" id="" class="form-control">
                    <option value="">Please Choose Trainer</option>
                    <option value="Nirbhay Singh">Nirbhay Singh</option>
                    <option value="Shah Fahad">Shah Fahad</option>
                   </select>
                    @error('trainer') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    
                    <label for="">Total Fee: <small class="text-danger">*</small></label>
                   <input type="text" name="total_fee" class="form-control" id="total_fee">
                    @error('total_fee') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                     <label for="">Paid Amount: <small class="text-danger">*</small></label>
                   <input type="text" name="paid_amt" class="form-control" id="" >
                    @error('paid_amt') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                     <label for="">Due Amount: <small class="text-danger">*</small></label>
                   <input type="text" name="due_amt" class="form-control" id="" >
                    @error('due_amt') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-4">
                     <label for="">Reg Date: <small class="text-danger">*</small></label>
                   <input type="date" name="reg_date" class="form-control" id="" >
                    @error('reg_date') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>

                    <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Student Address: <small class="text-danger">*</small></label>
                    <textarea name="address" id=""  rows="3" class="form-control"></textarea>
                    @error('address') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <label for="exampleInputFile">Student Image <i class="fas fa-images"></i><small class="text-danger">*</small></label>
                      
                    <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    @error('image') <span class="text-danger">{{ucwords($message)}}</span> @enderror
                    </div>
                    </div>
                        </div>
                    </div>
                
                  
                  
                </div>
               
                <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit Your Details</button>
                  <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
   
    function getFee(id){
$('#total_fee').attr('readonly','readonly');
 var courses = '<?= json_encode($courses)?>';
 courses = JSON.parse(courses);
 let filteredData = courses.filter(item => item.id == id);
   $('#total_fee').val(filteredData[0].fee);
    console.log(filteredData[0].fee);
}
</script>

@endsection
@endsection
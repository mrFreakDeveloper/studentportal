@extends('adminlte::page')
@section('content')
@section('title','Certificate Manager')
@section('content_header')
<div class="card">
  <div class="card-header bg-info">
    Manage Certificate
    <a href="#" class="btn btn-success" style="float: right;">+ Certificate</a>

  </div>
  <div class="card-body">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col"></th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
  </div>
</div>
@stop
@endsection
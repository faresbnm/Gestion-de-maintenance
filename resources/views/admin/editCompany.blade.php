@extends('admin.adminSideBar')
@section('admin')
<style>
.create-user input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.create-user input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.create-user input[type=submit]:hover {
  background-color: #45a049;
}


</style>
<body>


<div class="create-user">
  <form action="{{ url('admin/company/' .$company->id) }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @method('PATCH')

    <label for="fname">Company Name</label>
    <input type="text" id="fname" name="companyName" value="{{$company->company_name}}">

    <label for="lname">Company Description</label>
    <input type="text" id="uname" name="company_description" value="{{$company->description}}">

    <label for="lname">Company Proffession/Field of Work</label>
    <input type="text" id="password" name="proffession" value="{{$company->field_of_work}}">

    <h1>Localization</h1>

    <label for="lname">Country</label>
    <input type="text" id="password" name="companyCountry" value="{{$local->country}}">

    <label for="lname">City</label>
    <input type="text" id="password" name="companyCity" value="{{$local->city}}">

    <label for="lname">Street</label>
    <input type="text" id="password" name="companyStreet" value="{{$local->street}}">

    <label for="lname">Building Number</label>
    <input type="text" id="password" name="companyBuilding" value="{{$local->building_number}}">

    <label for="lname">Door Number</label>
    <input type="text" id="password" name="companyDoor" value="{{$local->door_number}}">

    <label for="">Set Company Logo</label>
    <input type="file" name="logo">

    <input type="submit" value="Update Company">
  </form>
</div>

@endsection



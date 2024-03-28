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
  <form action="{{ url('admin/company') }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <label for="fname">Company Name</label>
    <input type="text" id="fname" name="companyName" placeholder="">

    <label for="lname">Company Description</label>
    <input type="text" id="uname" name="company_description" placeholder="">

    <label for="lname">Company Proffession/Field of Work</label>
    <input type="text" id="password" name="proffession" placeholder="">

    <h1>Localization</h1>

    <label for="lname">Country</label>
    <input type="text" id="password" name="companyCountry" placeholder="">

    <label for="lname">City</label>
    <input type="text" id="password" name="companyCity" placeholder="">

    <label for="lname">Street</label>
    <input type="text" id="password" name="companyStreet" placeholder="">

    <label for="lname">Building Number</label>
    <input type="text" id="password" name="companyBuilding" value="Building n° ">

    <label for="lname">Door Number</label>
    <input type="text" id="password" name="companyDoor" value="Door n° ">

    <label for="">Set Company Logo</label>
    <input type="file" name="logo">

    <input type="submit" value="Create Company">
  </form>
</div>

@endsection



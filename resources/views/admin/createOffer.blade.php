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
  <form action="{{ url('admin/internship') }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <label for="fname">Title</label>
    <input type="text" id="fname" name="title" placeholder="">

    <label for="lname">Description</label>
    <input type="text" id="uname" name="description" placeholder="">

    <label for="lname">Skills</label>
    <input type="text" id="password" name="skills" placeholder="">

    <label for="lname">Included promotion</label>
    <select id="country" name="promo">
        <option value="none">None (for admins)</option>
        <option value="A1">A1</option>
        <option value="A2">A2</option>
        <option value="A3">A3</option>
        <option value="A4">A4</option>
        <option value="A5">A5</option>
    </select>

    <label for="lname">Duration</label>
    <input type="text" id="password" name="duration" placeholder="">

    <label for="lname">Based Salary</label>
    <input type="text" id="password" name="salary" placeholder="">

    <label for="lname">Date</label>
    <input type="date" id="password" name="date" placeholder="">
    
    <label for="lname">Places</label>
    <input style="width: 100px;" type="number" name="places" value="1" min="1" step="1">
    <br>
    <label for="lname">Applies</label>
    <input style="width: 100px;" type="number" name="applies" value="0" min="0" step="1"><br>

    <label for="country">Company</label>
    <select id="country" name="company_id">
      @foreach ($companyOffer as $item)
      <option value="{{$item->id}}"> {{$item->company_name}} </option>
      @endforeach
    </select>

    <label for="">Upload Image</label>
    <input type="file" name="image">

    <input type="submit" value="Create Offer">
  </form>
</div>

@endsection



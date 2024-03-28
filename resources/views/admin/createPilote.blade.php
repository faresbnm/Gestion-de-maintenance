@extends('admin.adminSideBar')
@section('admin')
<style>
    .create-user input[type=text], select {
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

<div class="create-user">
    <form action="{{ route('pilote.store') }}" method="post">
        {!! csrf_field() !!}
      <label for="fname">Full name</label>
      <input type="text" id="fname" name="fullname" placeholder="">
  
      <label for="lname">Username</label>
      <input type="text" id="uname" name="username" placeholder="">
  
      <label for="lname">Password</label>
      <input type="text" id="password" name="password" placeholder="">
  
      <label for="lname">Study Center</label>
      <input type="text" id="sc" name="studycenter" placeholder="">
  
      <label for="lname">Promotion / Assigned Promotion</label>
      <select id="country" name="promotion">
          <option value="none">None (for admins)</option>
          <option value="A1">A1</option>
          <option value="A2">A2</option>
          <option value="A3">A3</option>
          <option value="A4">A4</option>
          <option value="A5">A5</option>
      </select>
  
      <label for="country">User Role</label>
      <select id="country" name="ur">
        <option value="student">Student</option>
        <option value="pilote" selected>Pilote</option>
      </select>
    
      <input type="submit" value="Create pilote">
    </form>
  </div>
@endsection
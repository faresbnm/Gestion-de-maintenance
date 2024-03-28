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
    <form action="{{ route('student.update', ['id' => $students->id]) }}" method="POST">
        {!! csrf_field() !!}
        @method('PATCH')
      <label for="fname">Full name</label>
      <input type="text" id="fname" name="fullname" value="{{$students->fullName}}">
  
      <label for="lname">Username</label>
      <input type="text" id="uname" name="username" value="{{$students->user}}">
  
      <label for="lname">Password</label>
      <input type="text" id="password" name="password" value="{{$students->password}}">
  
      <label for="lname">Study Center</label>
      <input type="text" id="sc" name="studycenter" value="{{$students->StudyCenter}}">
  
      <label for="lname">Promotion / Assigned Promotion</label>
      <select id="country" name="promotion">
          <option value="none">None (for admins)</option>

          @foreach ($promo as $promotion)
          <option value="{{ $promotion }}" {{ $students->Promotion == $promotion ? 'selected' : '' }}>
              {{ $promotion }}
          </option>
        @endforeach    

      </select>
  
      <label for="country">User Role</label>
      <select id="country" name="ur">
        <option value="student">Student</option>
        <option value="pilote">Pilote</option>
      </select>
    
      <input type="submit" value="Edit User">
    </form>
  </div>
@endsection
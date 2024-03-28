<style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

  body{
      background-color: #91398B;
      font-family: poppins;
      color: white;
  }
.students table {
  border-collapse: collapse;
  width: 100%;
}

.students th, td:not(.action) {
  text-align: left;
  padding: 8px;
}

.students .action{
    text-align: center;
}

.students tr:nth-child(even) {background-color: #f2f2f2;color: black}

.create-btn {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-bottom: 10px;
    cursor: pointer;
}
.InputContainer {
    height: 40px;
    border: 1px solid black;
    width: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(255, 255, 255);
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    padding-left: 15px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.075);
  }
  
  .input {
    width: 170px;
    height: 100%;
    border: none;
    outline: none;
    font-size: 0.9em;
    caret-color: rgb(255, 81, 0);
  }
  
  .labelforsearch {
    cursor: text;
    padding: 0px 12px;
  }
  
  .searchIcon {
    width: 13px;
  }
  
  .border {
    height: 40%;
    width: 1.3px;
    background-color: rgb(223, 223, 223);
  }
  
  .micIcon {
    width: 12px;
  }
  
  .micButton {
    padding: 0px 15px 0px 12px;
    border: none;
    background-color: transparent;
    height: 40px;
    cursor: pointer;
    transition-duration: .3s;
  }
  
  .searchIcon path {
    fill: rgb(114, 114, 114);
  }
  
  .micIcon path {
    fill: rgb(255, 81, 0);
  }
  
  .micButton:hover {
    background-color: rgb(255, 230, 230);
    transition-duration: .3s;
  }
  button.subsearch {
      font-family: poppins;
      background-color: #11113A; /* Green background */
      border: none; /* Remove border */
      color: white; /* White text */
      padding: 10px 20px; /* Padding */
      text-align: center; /* Center text */
      text-decoration: none; /* Remove underline */
      display: inline-block; /* Make it inline block */
      font-size: 14px; /* Font size */
      cursor: pointer; /* Add cursor pointer */
      border-radius: 5px; /* Add rounded corners */
    }
    
    button.subsearch:hover {
      background-color: #45a049; /* Darker green background on hover */
    }
    div.searchbar{
      margin-top: 100px;
      display: flex;
      justify-content: center;
    }
    
    .searchbar input{
      width: 100%;
      max-width: 500px;
      height: 45px;
      padding: 12px;
      border-radius: 12px;
      border: 1.5px solid lightgrey;
      outline: none;
      transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
      box-shadow: 0px 0px 20px -18px;
      font-family: poppins;
      text-align: center;
    }
  
    
  
    .searchbar input:active{
      transform: scale(0.95);
    }
  
    .searchbar input:focus{
      border: 2px solid grey;
    }
    
    .searchbar i{
      font-size: 30px;
    }
    
    button.filter{
      background-color: transparent;
      border: none;
      cursor: pointer;
    }
    
    button.subsearch{
      margin-left: 20px;
      background-color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    @media only screen and (max-width: 1090px) {
      div.searchbar {
        flex-direction: column;
        align-items: center;
      }
    
      .searchbar input {
        width: calc(100% - 120px); /* Adjust width to leave space for the filter button and margin */
      }
    
      .searchbar button.filter {
        margin-bottom: 10px; /* Add space between filter button and input */
      }
    
      button.subsearch {
        margin-left: 0; /* Remove left margin */
      }
    }
</style>

@extends('admin.adminSideBar')
@section('admin')
<div class="content">
    <h2>Students</h2>
    <center>
      <form action="{{route('student.search')}}" method="GET">
        <div class="InputContainer">
            <input type="text" name="studentQuery" class="input" id="input" placeholder="Search Student">
          
            <label for="input" class="labelforsearch">
            <svg viewBox="0 0 512 512" class="searchIcon"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg>
            </label>
            <div class="border"></div>
  
            <button type="submit" class="micButton">
              Search
            </button>
        </div><br>
            <span>Search by promotion:</span>
            <select style="font-size:15px; padding:7px; cursor:pointer; background-color:#430086; border-radius:10px; color:white;" name="studentByPromo">
              <option value="" selected></option>
              @foreach ($promo as $item)
              <option value="{{$item}}">{{$item}}</option>
              @endforeach
            </select><br><br>
            <span>Search by center:</span>
            <input style="padding: 7px; font-size:15px; width:100px;" type="text" name="studentByCenter">
      </form>
    </center>
    <a style="text-decoration: none; color:white;" href=" {{route('student.create')}} "><button class="create-btn">Create User</button></a>
    <div class="students" style="overflow-x: auto;">
      @if($students->isEmpty())
      <p>No students found.</p>
      @else
        <table>
          <tr>
            <th>Full Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Study Center</th>
            <th>Promotion</th>
            <th class="action">Actions</th>
          </tr>
          @foreach ($students as $student)
          <tr>
            <td> {{$student->fullName}} </td>
            <td>{{$student->user}}</td>
            <td> {{$student->password}} </td>
            <td> {{$student->StudyCenter}} </td>
            <td> {{$student->Promotion}} </td>
            <td class="action" style="padding: 20px;">
              <a href="{{ url('admin/student/show/' . $student->id) }}" style="text-decoration: none; color: white;"><button style="background-color: blue; border: none; color: white;cursor: pointer; padding: 10px 20px; width:80px;">View</button></a>

              <a href="{{ url('admin/student/' . $student->id . '/edit') }}"><button  style="background-color: rgb(255, 255, 255);cursor: pointer; border: 1px solid black; color: black;padding: 10px 20px; width:80px;">Update</button></a>

              <form method="POST" action="{{ url('admin/student/delete'. '/' . $student->id) }}" accept-charset="UTF-8" style="display: inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button style="background-color: red; border: none; color: white;cursor: pointer; padding: 10px 20px; width:80px;" type="submit" title="Delete Student">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach

        </table>
        @endif
        @if(Session::has('flash_message'))
          <div id="flash-message" style="display: none;">{{ Session::get('flash_message') }}</div>
        @endif
      </div>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                alert(flashMessage.textContent);
            }
        });
     </script>
    
@endsection
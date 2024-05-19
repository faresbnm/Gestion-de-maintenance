@extends('admin.adminSideBar')
@section('admin')
<style>
  *{
    overflow-x: hidden;
  }
    .internships_table table {
      border-collapse: collapse;
      width: 100%;
    }
    
    .internships_table th, td:not(.action) {
      text-align: left;
      padding: 8px;
    }
    
    .internships_table .action{
        text-align: center;
    }
    
    .internships_table tr:nth-child(even) {background-color: #f2f2f2;color: black}


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

    .tableDescription{
      overflow: hidden;

      text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 4; 
        -webkit-box-orient: vertical;
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
    </style>
<body>
  <h2>Companies</h2>
  <center>      
    <form action="{{route('adminCompanySearch')}}" method="GET">
      <div class="InputContainer">
          <input type="text" name="companyQuery" class="input" id="input" placeholder="Search company">
        
          <label for="input" class="labelforsearch">
          <svg viewBox="0 0 512 512" class="searchIcon"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg>
          </label>
          <div class="border"></div>

          <button type="submit" class="micButton">
            Search
          </button>
      </div>   <br>
      <input placeholder="Search by Locality" style="padding: 7px; font-size:15px; width:200px;" type="text" name="companyByLocality">
    </form>

    </center>
  <a style="text-decoration: none; color:white;" href=" {{url('admin/company/create')}} "><button class="create-btn">Create Company</button></a>
    <div class="internships_table" style="overflow-x: auto;">
        <table>
          <tr>
            <th>Company Name</th>
            <th>Description</th>
            <th>Field of Work</th>
            <th>Country</th>
            <th>City</th>
            <th>Street</th>
            <th>Building</th>
            <th>Door</th>
            <th>Logo</th>
            <th class="action">Actions</th>
          </tr>
          @foreach ($company as $company)
          <tr>
            <td>{{$company->company_name}}</td>
            <td class="tableDescription">{{$company->description}}</td>
            <td>{{$company->field_of_work}}</td>

            @foreach ($company->Localization as $localization)
            <td>{{$localization->country}}</td>
            <td>{{$localization->city}}</td>
            <td>{{$localization->street}}</td>
            <td>{{$localization->building_number}}</td>
            <td>{{$localization->door_number}}</td>
            @endforeach
            <td><img src=" {{asset($company->company_logo)}} " width="150px" alt=""></td>
            <td class="action" style="padding: 20px;">

              <a href="{{route('companyDetails', ['id' => $company->id])}}" style="text-decoration: none; color: white;"><button style="background-color: blue; border: none; color: white;cursor: pointer; padding: 10px 20px; width:80px;">View</button></a>
    
              <a href="{{ url('admin/company/' . $company->id . '/edit') }}"><button  style="background-color: rgb(255, 255, 255);cursor: pointer; border: 1px solid black; color: black;padding: 10px 20px; width:80px;">Update</button></a>

              <form method="POST" action="{{ url('admin/company' . '/' . $company->id) }}" accept-charset="UTF-8" style="display: inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button style="background-color: red; border: none; color: white;cursor: pointer; padding: 10px 20px; width:80px;" type="submit" title="Delete Student">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>

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
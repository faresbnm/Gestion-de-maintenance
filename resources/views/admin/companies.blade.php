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
    </style>
<body>
  <h2>Companies</h2>
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
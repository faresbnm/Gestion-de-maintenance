@extends('admin.adminSideBar')
@section('admin')
<style>
  body{
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
  <h2>Internships</h2>
  <a style="text-decoration: none; color:white;" href=" {{url('admin/internship/create')}} "><button class="create-btn">Create Offer</button></a>
    <div class="internships_table" style="overflow-x: auto;">
        <table>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Skills</th>
            <th>Included Promotions</th>
            <th>Duration</th>
            <th>Based salary</th>
            <th>Date</th>
            <th>Avalaible Places</th>
            <th>Applies</th>
            <th>Company</th>
            <th>descriptive Image</th>
            <th class="action">Actions</th>
          </tr>
          @foreach ($offer as $offer)
          <tr>
            <td>{{$offer->title}}</td>
            <td class="tableDescription">{{$offer->description}}</td>
            <td>{{$offer->competences}}</td>
            <td>{{$offer->promo}}</td>
            <td>{{$offer->duration}}</td>
            <td>{{$offer->base_remuneration}}</td>
            <td>{{$offer->date}}</td>
            <td>{{$offer->places}}</td>
            <td>{{$offer->applies}}</td>
            <td>{{$offer->company_id}}</td>
            <td><img src=" {{asset($offer->descriptive_image)}} " width="150px" alt=""></td>
            <td class="action" style="padding: 20px;">
              <a href="{{route('offer.show', ['id' => $offer->id])}}" style="text-decoration: none; color: white;"><button style="background-color: blue; border: none; color: white;cursor: pointer; padding: 10px 20px; width:80px;">View</button></a>
    
              <a href="{{ url('admin/internship/' . $offer->id . '/edit') }}"><button  style="background-color: rgb(255, 255, 255);cursor: pointer; border: 1px solid black; color: black;padding: 10px 20px; width:80px;">Update</button></a>

              <form method="POST" action="{{ url('admin/internship' . '/' . $offer->id) }}" accept-charset="UTF-8" style="display: inline">
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
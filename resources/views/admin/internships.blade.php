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

  .filter-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        color: white;
        background-color: purple;
    }

    .filter-container select, .filter-container input[type="date"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .filter-container input[type="number"],  .filter-container input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .search-button {
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Styles for pop-up modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: transparent;
        margin: auto;
        padding: 20px;
        border-radius: 5px;
    }

    .close {
        color: #ffffff;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
  <h2>Internships</h2>
  <center>      
    <form action="{{route('offerSearch')}}" method="GET">
      <div class="InputContainer">
          <input value="" type="text" name="OfferQuery" class="input" id="input" placeholder="Search Internships">
        
          <label for="input" class="labelforsearch">
          <svg viewBox="0 0 512 512" class="searchIcon"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg>
          </label>
          <div class="border"></div>

          <button type="submit" class="micButton">
            Search
          </button>
      </div>
    </form><br>
    <button class="search-button" onclick="openModal()">Filter</button>

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="filter-container">
            <form id="filter-form" action="{{route('offerSearch')}}" method="GET">
        
                <input value="" name="offerByLocality" type="text" placeholder="Search by loclaity">
        
        
                <select name="offerByPromo" id="promotion">
                  <option value="" selected>Search by promotion</option>
                  @foreach ($promo as $item)
                  <option value="{{$item}}">{{$item}}</option>
                  @endforeach
                </select>
        
                <input value="" name="offerByDuration" type="number" id="duration" placeholder="Search by Duration (Months)">
        
                <input value="" name="offerByDate" type="date" id="date">
        
                <input value="" name="offerBySA" type="number" id="num_students" placeholder="students applies">

                <input value="" name="offerByPlace" type="number" id="num_students" placeholder="Avalaible places">
    
                <input style="padding: 10px; border:1px solid white; color: white; background-color: purple; cursor: pointer;" type="submit" value="Apply Filter">
            </form>
        </div>
      </div>
    </div>
    </center>
    <script>
      // Get the modal
      var modal = document.getElementById("myModal");
  
      // Get the button that opens the modal
      var btn = document.getElementsByClassName("search-button")[0];
  
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
  
      // When the user clicks the button, open the modal 
      function openModal() {
          modal.style.display = "block";
      }
  
      // When the user clicks on <span> (x), close the modal
      function closeModal() {
          modal.style.display = "none";
      }
  
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
  </script>
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
              <a href="{{url('admin/internship/offer/' . $offer->id)}}" style="text-decoration: none; color: white;"><button style="background-color: blue; border: none; color: white;cursor: pointer; padding: 10px 20px; width:80px;">View</button></a>
    
              <a href="{{ url('admin/internship/' . $offer->id . '/edit') }}"><button  style="background-color: rgb(255, 255, 255);cursor: pointer; border: 1px solid black; color: black;padding: 10px 20px; width:80px;">Update</button></a>

              <form method="POST" action="{{ url('admin/internship/delete/' . $offer->id) }}" accept-charset="UTF-8" style="display: inline">
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
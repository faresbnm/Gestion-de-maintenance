@extends('Layout.master')
@section('content')

<!--Pagination imports-->
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  
  
  body{
      background-color: #91398B;
      font-family: poppins;
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
    
    div.cardsContainer{
      margin: 100px 50px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 50px;
    }
    
    div.offre img{
      width: 100%;
      height: 200px;
      border-radius: 10px 10px 0 0;
    }
    
    div.offre{
      width: 300px;
      height: 400px;
      background-color: #11113A;
      color: white;
      border-radius: 10px;
      overflow-y: auto;
      margin-bottom: 50px;
  
    }
    
    
    .credentials{
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #E8AFF6;
    }
    
    .offre p{
      margin: 0 15px;
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
    
      div.cardsContainer {
        margin: 50px 10px;
      }
    
      div.offre {
        width: 300px; /* Adjust width to fit the container */
        margin-bottom: 50px; /* Add space between offer cards */
      }
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
    
    
    @media only screen and (max-width: 635px) {
      div.offre {
        margin-bottom: 20px; /* Add space between offer cards */
        margin-left: auto;
        margin-right: auto;
      }
    }
  
    @media only screen and (max-width: 992px){
      div.offre{
        width: 250px;
      }
    }
  
    @media only screen and (max-width: 850px){
      div.offre{
        display: block;
      }
    }
  
    .description {
    overflow: hidden;
    border: 1px solid black;
    height: 400px;
    position: relative;
    max-height: calc(3 * 1.2em); /* Approximate 3 lines based on line height */
    line-height: 1.2em;
    }
  
    .offre h2{
      font-size: 20px;
    }
  
  .ellipsis::after {
    content: '...';
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #11113A; /* Match background color */
    color: white;
    margin-right: 10px;
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

  .offre h2:hover{
    text-decoration: underline
  }


    
  </style>
  
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const cards = document.querySelectorAll('.offre');
    
      cards.forEach(card => {
        const description = card.querySelector('.description');
    
        // Check if the content overflows
        if (description.scrollHeight > description.clientHeight) {
          description.classList.add('ellipsis');
        }
      });
    });
    
    </script>
      <center>      
      <form action="{{route('offer.search') . '?' . http_build_query(request()->except('page')) }}" method="GET">
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
      </form>
      <button class="search-button" onclick="openModal()">Filter</button>

      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <div class="filter-container">
              <form id="filter-form" action="{{route('offer.search') . '?' . http_build_query(['offerByPromo' => request()->input('offerByPromo'), 'offerByDuration' => request()->input('offerByDuration'), 'offerByPlace' => request()->input('offerByPlace')])}}" method="GET">
          
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
      <!--offres-->
      <div class="cardsContainer">
        @if ($internship->isEmpty())
        <h2 style="color: white;">No offers found.</h2>
        @else
        @foreach ($internship as $internshipsData)
        <div class="offre offre1">

          <img src=" {{asset($internshipsData->descriptive_image)}} " alt="">
          <center><a style="text-decoration: none; color:white;"
                     href="{{route('offer.show', ['id' => $internshipsData->id])}}">
                     <h2> {{$internshipsData->title}} </h2></a></center>

          <p class="description">
            {{$internshipsData->description}}
          </p>         
          <div class="credentials">
            <p style="font-size: 13px; font-weight: bold;"><i class="fa-solid fa-user" style="color: #E8AFF6; padding-right: 10px;"></i> {{$internshipsData->company->company_name}} </p>
          </div>
        </div>
        @endforeach
        @endif
        <div>        
          {{$internship->links()}}
        </div>

        @endsection
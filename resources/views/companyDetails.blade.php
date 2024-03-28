@extends('Layout.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
body {
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    background-color: #91398B;
}

.container2 {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            background-color: aliceblue;
        }
        h1 {
            text-align: center;
        }
        .offer-image {
            width: 500px;
            max-height: 300px;
            object-fit: cover;
            border-radius: 5px;
        }
        .offer-description {
            margin-top: 20px;
            font-size: 18px;
        }
        .statistics {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .stat {
            background-color: #f0f0f0;
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
            text-align: start;
        }
        .publisher {
            margin-top: 20px;
            text-align: center;
        }

        .buttons-details{
          text-align: center;
          margin-top:30px; 
        }

        .button-comp{
            background-color: #502779;
            border: none;
            padding:20px 30px;
            border-radius: 50px;
            transition: .5s;
            margin: 20px;
        }

        .button-comp:hover{
            background-color: #c491f7;
        }

        .button-comp a{
            text-decoration: none;
            color: white;
        }

        #checkboxInput {
  display: none;
}
.bookmark {
  float: right;
  cursor: pointer;
  background-color: #502779;
  width: 55px;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
}



@media (max-width: 715px) {
    .buttons-details {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 30px;
    }
    .buttons-details button {
        margin-bottom: 10px;
    }
    .statistics {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 500px) {

  .offer-image{
    width: 200px;
  }
    .statistics {
        grid-template-columns: 1fr;
    }
}

div.cardsContainer{
      margin: 100px 50px;
      display: flex;
      flex-wrap: wrap;
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


  /* rating */
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
    color: #b4afaf;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }

/* End of Star Rating */

</style>
<div class="container2">
    <h1> {{$companyData->company_name}} </h1>
    <center><img class="offer-image" src="{{asset($companyData->company_logo)}}" alt="Offer Image"></center>
    <div class="offer-description">
        <p>{{$companyData->description}}</p>
    </div>
    <div class="statistics">
        <div class="stat">Field of work: {{$companyData->field_of_work}} </div>
        <div class="stat">Total offers: {{$internshipsCount}} </div>
        <div class="stat">Rating: {{$ratingResult}} </div>

        @foreach ($local as $Localisation)
        <div class="stat">country: {{$Localisation->country}}</div>
        <div class="stat">city: {{$Localisation->city}}</div>
        <div class="stat">street: {{$Localisation->street}}</div>
        <div class="stat">building: {{$Localisation->building_number}}</div>
        <div class="stat">door: {{$Localisation->door_number}}</div>
        @endforeach

    </div>
    <div class="publisher">Rate {{ $companyData->company_name }}</div>

    <div class="rating-css">
        <div class="star-icon">
            <form action="{{route('companyRating', ['id' => $companyData->id])}}" method="POST">
                @csrf
            @if($StudentRating)
            <input type="radio" value="1" name="product_rating" id="rating1" {{ $StudentRating->rating == 1 ? 'checked' : '' }}>
            <label for="rating1" class="fa fa-star"></label>
            <input type="radio" value="2" name="product_rating" id="rating2" {{ $StudentRating->rating == 2 ? 'checked' : '' }}>
            <label for="rating2" class="fa fa-star"></label>
            <input type="radio" value="3" name="product_rating" id="rating3" {{ $StudentRating->rating == 3 ? 'checked' : '' }}>
            <label for="rating3" class="fa fa-star"></label>
            <input type="radio" value="4" name="product_rating" id="rating4" {{ $StudentRating->rating == 4 ? 'checked' : '' }}>
            <label for="rating4" class="fa fa-star"></label>
            <input type="radio" value="5" name="product_rating" id="rating5" {{ $StudentRating->rating == 5 ? 'checked' : '' }}>
            <label for="rating5" class="fa fa-star"></label>
            @else
            <input type="radio" value="1" name="product_rating" id="rating1" checked>
            <label for="rating1" class="fa fa-star"></label>
            <input type="radio" value="2" name="product_rating" id="rating2">
            <label for="rating2" class="fa fa-star"></label>
            <input type="radio" value="3" name="product_rating" id="rating3">
            <label for="rating3" class="fa fa-star"></label>
            <input type="radio" value="4" name="product_rating" id="rating4">
            <label for="rating4" class="fa fa-star"></label>
            <input type="radio" value="5" name="product_rating" id="rating5">
            <label for="rating5" class="fa fa-star"></label>
            @endif
                <br>
            <center><button style="margin-top: 50px; cursor:pointer;padding:10px 30px;background-color:#91398B;border:none;color:white;" type="submit">Submit Rating</button></center>
        </form>
        </div>
    </div>
</div>


<h1 style="color: white;">Company Offers:</h1>
<div class="cardsContainer">
    @foreach ($internships as $internshipsData)
    <div class="offre offre1">

      <img src=" {{asset($internshipsData->descriptive_image)}} " alt="">
      <center><a style="text-decoration: none; color:white;"
                 href="{{route('offer.show', ['id' => $internshipsData->id])}}">
                 <h2> {{$internshipsData->title}} </h2></a></center>

      <p class="description">
        {{$internshipsData->description}}
      </p>         
      <div class="credentials">
        <p style="font-size: 13px; font-weight: bold;"><i class="fa-solid fa-user" style="color: #E8AFF6; padding-right: 10px;"></i> {{$companyData->company_name}} </p>
      </div>
    </div>
    @endforeach

    @if(Session::has('success'))
    <div id="flash-message" style="display: none;">{{ Session::get('success') }}</div>
  @endif
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            Swal.fire({
              title: "Done!",
              text: flashMessage.textContent,
              icon: "success"
            });
        }
    });
  </script>

@endsection

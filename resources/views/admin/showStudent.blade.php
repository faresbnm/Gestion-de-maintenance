@extends('admin.adminSideBar')
@section('admin')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  
  
  body{
      background-color: #91398B;
      font-family: poppins;
      color: white;
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
<body>
  <h1>Full Name: {{$student->fullName}}</h1>
  <div>
    <h2>Student Applies: </h2>
    @if(count($applications) > 0)

    <div class="cardsContainer">
          
        @foreach ($applications as $internshipsData)
        <div class="offre offre1">

          <img src=" {{asset($internshipsData->offer->descriptive_image)}} " alt="">
          <center><a style="text-decoration: none; color:white;"
                     href="{{route('offer.show', ['id' => $internshipsData->offer->id])}}">
                     <h2> {{$internshipsData->offer->title}} </h2></a></center>

          <p class="description">
            {{$internshipsData->offer->description}}
          </p>         
          <div class="credentials">
            <p style="font-size: 13px; font-weight: bold;"><i class="fa-solid fa-user" style="color: #E8AFF6; padding-right: 10px;"></i> {{$internshipsData->offer->company->company_name}} </p>
            <p style="font-size: 13px; font-weight: bold;"><i class="fa-solid fa-user" style="color: #E8AFF6; padding-right: 10px;"></i><a style="text-decoration: underline; color:white;" href="{{asset($internshipsData->cv)}}" download>Click to download attached cv</a> </p>
          </div>
        </div>
        @endforeach
        @else
        <p>No applies for this student</p>

        @endif
  </div>
  

  
        <div>
          <h2>Student Wishlist: </h2>

          @if(count($wishlistItems) > 0)
          <div class="cardsContainer">
              @foreach ($wishlistItems as $internshipsData)
      
              <div class="offre offre1">
      
                <img src=" {{asset($internshipsData->offer->descriptive_image)}} " alt="">
                <center><a style="text-decoration: none; color:white;"
                           href="{{route('offer.show', ['id' => $internshipsData->offer->id])}}">
                           <h2> {{$internshipsData->offer->title}} </h2></a></center>
      
                <p class="description">
                  {{$internshipsData->offer->description}}
                </p>         
                <div class="credentials">
                  <p style="font-size: 13px; font-weight: bold;"><i class="fa-solid fa-user" style="color: #E8AFF6; padding-right: 10px;"></i> {{$internshipsData->offer->company->company_name}} </p>
                </div>
                <center>
                  <form method="POST" action="{{route('wishlist.delete', ['id' => $internshipsData->offer->id])}}" accept-charset="UTF-8" style="display: inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button style="background: none; border:none;margin-top:20px;cursor:pointer;" type="submit"><i class="fa-solid fa-trash" style="color: #ffffff;font-size:25px;"></i></button>
                  </form>
                </center>
              </div>
              @endforeach
              @else
              <p>No Offers in the wishlist</p>
              @endif
        </div>  

@endsection

@extends('Layout.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .links-container {
    text-align: center; 
}

.accLink {
    display: inline-block; 
    text-decoration: none;
    color: white;
    background-color: #430086;
    padding: 20px;
    border-radius: 20px;
    margin: 0 10px; 
}

@media (max-width: 768px) {
    .accLink {
        display: block; 
        margin: 10px auto; 
    }
}
 
    
    div.cardsContainer{
      margin: 40px 50px;
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
 
      div.cardsContainer {
        margin: 50px 10px;
      }
    
      div.offre {
        width: 300px; /* Adjust width to fit the container */
        margin-bottom: 50px; /* Add space between offer cards */
      }
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
  
  
  .offre h2:hover{
    text-decoration: underline
  }


</style>
<center><h1 style="color: white">Welcome, {{ $userDisplayData->fullName }}!</h1></center>

    @if ($userDisplayData->UserRole === 'admin')
        <center><a class="accLink" href="{{route('dashboard')}}">Dashboard</a></center>
    @endif

    @if ($userDisplayData->UserRole === 'pilote')
    <div class="links-container">
        <a class="accLink" href="{{url('admin/internship')}}">Manage Internships</a>
        <a class="accLink" href="{{url('admin/company')}}">Manage Companies</a>  
        <a class="accLink"  href="{{url('admin/student')}}">Manage Students</a>
    </div>
    @endif

    <h2 style="color: white; margin-left:40px;">Your Wishlist: </h2>
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
        <p style="color:white; margin-left:40px;">No Offers in the wishlist</p>
        @endif
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
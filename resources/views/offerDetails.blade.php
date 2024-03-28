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

</style>

    <div class="container2">
        <h1> {{$offer->title}} </h1>
        <center><img class="offer-image" src="{{asset($offer->descriptive_image)}}" alt="Offer Image"></center>
        <div class="offer-description">
            <p>{{$offer->description}}</p>
        </div>
        <div class="statistics">
            <div class="stat">Skills: {{$offer->competences}} </div>
            <div class="stat">Avalaible Places: {{$offer->places}} </div>
            <div class="stat">Date: {{$offer->date}} </div>
            <div class="stat">Duration: {{$offer->duration}} </div>
            <div class="stat">Based Salary: {{$offer->base_remuneration}} </div>
            <div class="stat">Promotions: {{$offer->promo}} </div>
            <div class="stat">Interns applied: {{$offer->applies}}</div>

            @foreach ($offer->company->localization as $Localisation)
            <div class="stat">country: {{$Localisation->country}}</div>
            <div class="stat">city: {{$Localisation->city}}</div>
            <div class="stat">street: {{$Localisation->street}}</div>
            <div class="stat">building: {{$Localisation->building_number}}</div>
            <div class="stat">door: {{$Localisation->door_number}}</div>
            @endforeach

        </div>
        <div class="publisher">Published by: {{ $offer->company->company_name }}</div>


          @if ($userDisplayData->UserRole != 'pilote')

          <div class="buttons-details">
            <button class="button-comp"><a href="{{route('offer.apply', ['id' => $offer->id])}}" class="apply-button">Apply Now</a></button>

            <form action="{{route('wishlist.add', ['id' => $offer->id])}}" method="POST">
              @csrf
              <button style="cursor:pointer;" class="button-comp"><a class="apply-button">Add To Wishlist</a></button>

            </form>
          </div>

          @endif
    </div>
    @if(Session::has('success'))
    <div id="flash-message" style="display: none;">{{ Session::get('success') }}</div>
  @endif

  @if(Session::has('error'))
  <div id="flash-error" style="display: none;">{{ Session::get('error') }}</div>
@endif
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      var flashMessage = document.getElementById('flash-message');
      var flashMessageError = document.getElementById('flash-error');
      if (flashMessage) {
          Swal.fire({
            title: "Done!",
            text: flashMessage.textContent,
            icon: "success"
          });
      }else if(flashMessageError){
        Swal.fire({
            title: "Oops!",
            text: flashMessageError.textContent,
            icon: "info"
          });
      }
  });
</script>

    @endsection

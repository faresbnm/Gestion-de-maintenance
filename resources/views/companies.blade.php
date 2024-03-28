@extends('Layout.master')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    body {
        margin: 0;
        padding: 0;
      background-color: #91398B;
      font-family: poppins;
    }
    .container3 {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        min-width: 100%;
    }
    .card2 {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin: 10px;
        overflow: hidden;
        height: 180px;
        width: 700px; 
    }
    .card2 img {
        width: 200px; 
        height: auto;
        float: left; 
        margin-right: 20px; 
        height: 100%;
    }
    .card2-content {
        padding: 20px;
        overflow: hidden;
    }
    .company-name {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .company-description {
        font-size: 0.9em;
        color: #666;
        margin-bottom: 10px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2; 
        -webkit-box-orient: vertical;
    }
    .company-rating {
        font-size: 0.9em;
        color: #333;
        margin-top: auto; 
    }

    @media (max-width:768px){
        .card2{
            width: 500px;
        }

 
    }

    @media (max-width:579px){
        .card2{
            width: 300px;
        }

        .company-name{
            font-size: 0.9em;
        }

        .company-description{
            font-size: 0.8em;
        }

        .company-rating{
            font-size: 0.8em;
        }

        .card2{
            height: 120px;
        }

        .card2 img{
            width: 130px;
        }
    }

    @media (max-width:284px){
        .card2{
            width: 270;
        }

        .company-name{
            font-size: 0.8em;
        }

        .company-description{
            font-size: 0.7em;
        }

        .company-rating{
            font-size: 0.7em;
        }
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
<center>      
    <form action="{{route('companySearch')}}" method="GET">
      <div class="InputContainer">
          <input type="text" name="companyQuery" class="input" id="input" placeholder="Search company">
        
          <label for="input" class="labelforsearch">
          <svg viewBox="0 0 512 512" class="searchIcon"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path></svg>
          </label>
          <div class="border"></div>

          <button type="submit" class="micButton">
            Search
          </button>
      </div>
    </form>

    </center>
<div class="container3">
    @foreach ($companyData as $company)
        
    <div class="card2">
        <img src="{{asset($company->company_logo)}}" alt="Company 1">
        <div class="card2-content">
            <div class="company-name"><a style="text-decoration: none; color: black;" href="{{route('companyDetails', ['id' => $company->id])}}"> {{$company->company_name}} </a></div>
            <div class="company-description"> {{$company->description}} </div>
            <div class="company-rating">Field of work: {{ $company->field_of_work }}</div>
            <div class="company-rating">Rating: {{ $company->averageRating() }}</div>


        </div>
    </div>
    @endforeach

</div>

@endsection
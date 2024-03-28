@extends('admin.adminSideBar')
@section('admin')
<style>
.create-user input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.create-user input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.create-user input[type=submit]:hover {
  background-color: #45a049;
}

</style>
<body>


<div class="create-user">
  <form action="{{ url('admin/internship/' .$offer->id) }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    @method('PATCH')
    <label for="fname">Title</label>
    <input type="text" id="fname" name="title" value="{{$offer->title}}">

    <label for="lname">Description</label>
    <input type="text" id="uname" name="description" value="{{$offer->description}}">

    <label for="lname">Skills</label>
    <input type="text" id="password" name="skills" value="{{$offer->competences}}">

    <label for="lname">Included promotion</label>
    <select id="country" name="promo">
      @foreach ($promo as $promotion)
      <option value="{{ $promotion }}" {{ $offer->promo == $promotion ? 'selected' : '' }}>
          {{ $promotion }}
      </option>
    @endforeach   
    </select>

    <label for="lname">Duration</label>
    <input type="text" id="password" name="duration" value="{{$offer->duration}}">

    <label for="lname">Based Salary</label>
    <input type="text" id="password" name="salary" value="{{$offer->base_remuneration}}">

    <label for="lname">Date</label>
    <input type="date" id="password" name="date" value="{{$offer->date}}">
    
    <label for="lname">Places</label>
    <input style="width: 100px;" type="number" name="places" value="{{$offer->places}}" min="0" step="1">
    <br>
    <label for="lname">Applies</label>
    <input style="width: 100px;" type="number" name="applies" value="{{$offer->applies}}" min="0" step="1"><br>

    <label for="country">Company</label>
    <select id="country" name="company_id">
      @foreach ($companies as $item)
      <option value="{{$item->id}}" {{ $offer->company_id == $item->id ? 'selected' : '' }}> {{$item->company_name}} </option>
      @endforeach
    </select>

    <label for="">Upload Image</label>
    <input type="file" name="image" value="{{$offer->descriptive_image}}">
  
    <input type="submit" value="Edit Offer">
  </form>
</div>
@endsection


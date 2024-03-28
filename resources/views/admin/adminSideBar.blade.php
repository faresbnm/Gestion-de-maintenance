<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body{
    background-color: #91398B;
    font-family: poppins;
    color: white;
}

div.create-user {
  border-radius: 5px;
  background-color: #502779;
  padding: 20px;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #430086;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 20px 8px 8px 20px;
  text-decoration: none;
  font-size: 25px;
  color: #c8c8c8;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #ffffff;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.activeSideLink{
  background-color: #2a0627;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a  class = "{{ 'admin/dashboard' == request()->path() ? 'activeSideLink' : ''}}" style="text-decoration: none;" href="{{route('dashboard')}}">Dashboard</a>
  <a class = "{{ 'admin/student' == request()->path() ? 'activeSideLink' : ''}}" style="text-decoration: none; " href="{{route('student.index')}}">Students</a>
  <a class = "{{ 'admin/pilote' == request()->path() ? 'activeSideLink' : ''}}" style="text-decoration: none; " href="{{route('pilote.index')}}">Pilots</a>
  <a class = "{{ 'admin/internship' == request()->path() ? 'activeSideLink' : ''}}" style="text-decoration: none; " href="{{url('admin/internship')}}">Internships</a>
  <a class = "{{ 'admin/company' == request()->path() ? 'activeSideLink' : ''}}" style="text-decoration: none; " href="{{url('admin/company')}}">Companies</a>
  <a style="text-decoration: none; " href="{{url('/home')}}">Exit</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Dashboard</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

@yield('admin')
   
</body>
</html> 

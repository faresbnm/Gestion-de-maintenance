<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CESI EXIA</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body{
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    background-color: #91398B;
    max-height: 100vh;
    overflow-x: hidden;
}

.Login-container{
    display: flex;
}

.Login-image{
    position: relative;
    border: 1px solid white;
    width: 100vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow-y:hidden;

}

.Login-image img{
    position: absolute;
    width: 100%;
    height: 100%;
}

    .group {
  position: relative;
  margin: 20px;
}

.form {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  padding-top: -70px;
  padding-right: 40px;
  padding-left: 40px;
  background-color: #502779;
  position: relative;
  width: 600px;
  max-height: 100vh;
}

.form p {
  padding-bottom: 40px;
  font-size: 30px;
  font-weight: bold;
  letter-spacing: .5px;
  color: white;
}

.form h1{
    color: white;
}

.container-1 {
  padding-top: 10px;
}

.main-input {
  font-size: 25px;
  padding: 20px 10px 10px 5px;
  display: block;
  width: 200px;
  border: none;
  border-bottom: 1px solid #6c6c6c;
  background: transparent;
  color: #ffffff;
}

.main-input:focus {
  outline: none;
  border-bottom-color: #ffcfe6;
}

.lebal-email {
  color: #999999;
  font-size: 19px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  top: 10px;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
}

.main-input:focus ~ .lebal-email,
.main-input:valid ~ .lebal-email {
  top: -20px;
  font-size: 14px;
  color: #ffcfe6;
}

.highlight-span {
  position: absolute;
  height: 60%;
  width: 0px;
  top: 25%;
  left: 0;
  pointer-events: none;
  opacity: 0.5;
}

.main-input:focus ~ .highlight-span {
  -webkit-animation: input-focus 0.3s ease;
  animation: input-focus 0.3s ease;
}

@keyframes input-focus {
  from {
    background: #ffcfe6;
  }

  to {
    width: 185px;
  }
}

button {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 5px;
  background: #ffffff;
  box-shadow: 0px 6px 24px 0px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  cursor: pointer;
  border: none;
  padding: 15px 30px;
  margin-top: 50px;
  font-size: 15px;
  font-weight: bold;
}

button:after {
  content: "";
  width: 0%;
  height: 100%;
  background: #91398B;
  position: absolute;
  transition: all 0.4s ease-in-out;
  right: 0;
}

button:hover::after {
  right: auto;
  left: 0;
  width: 100%;
}

button span {
  text-align: center;
  text-decoration: none;
  width: 100%;
  padding: 5px 10px;
  color: black;
  font-size: 1.125em;
  font-weight: 700;
  z-index: 20;
  transition: all 0.3s ease-in-out;
}

button:hover span {
  color: #fdfeff;
  animation: scaleUp 0.3s ease-in-out;
}

@keyframes scaleUp {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(0.95);
  }

  100% {
    transform: scale(1);
  }
}

@media (max-width:832px) {
  button{
    margin-bottom: 30px;
  }
    .Login-image{
        display: none;
    }
    .form{
        width: 100%;
        min-height: 100vh;  
        margin-bottom: 0;
    }
}

@media (max-width:322px) {
    .form{
        width: 100%;
        min-height: 100vh;  
    }
}

</style>
<body>
    <div class="Login-container">
        <form action="{{ route('auth.check') }}" method="post" class="form">
            @csrf
            <h1>CESI EXIA</h1>
            <p>Login</p>
            <div class="group">
              <input name="user" required="true" class="main-input" type="text">
              <span class="highlight-span"></span>
              <label class="lebal-email">Username</label>

            </div>
            <div class="container-1">
              <div class="group">
                <input name="password" required="true" class="main-input" type="password">
                <span class="highlight-span"></span>
                <label class="lebal-email">password</label>
                @if(Session::get('fail'))
                <div style="color: red;" class="error">
                   {{ Session::get('fail') }}
                </div>
                @endif
              </div>
            </div>
            <button class="submit2"><span>Log in</span></button>
          </form>
          <div class="Login-image">
            <img src="{{asset('assets/images/login.jpg')}}" alt="">
          </div>
    </div>

</body>
</html>
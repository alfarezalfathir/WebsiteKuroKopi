<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Kuro Kopisthetic</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#0F0F0F;
color:#fff;
}

/* NAVBAR */
.navbar{
position:fixed;
width:100%;
top:0;
padding:25px 0;
background:rgba(0,0,0,0.85);
backdrop-filter:blur(12px);
z-index:999;
}

.container{
width:90%;
max-width:1200px;
margin:auto;
}

.nav-wrapper{
display:flex;
justify-content:space-between;
align-items:center;
}

.logo{
font-family:'Playfair Display',serif;
font-size:24px;
letter-spacing:2px;
}

.logo span{
color:#D4A373;
}

.nav-links a{
color:#fff;
text-decoration:none;
margin-left:30px;
font-size:14px;
}

/* LOGIN SECTION */
.login-section{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.login-box{
background:rgba(255,255,255,0.05);
padding:50px;
border-radius:25px;
width:400px;
backdrop-filter:blur(10px);
}

.login-box h2{
font-family:'Playfair Display',serif;
margin-bottom:20px;
text-align:center;
}

.login-box input{
width:100%;
padding:12px;
margin-bottom:20px;
border-radius:50px;
border:none;
background:#1A1A1A;
color:#fff;
}

.login-box button{
width:100%;
padding:12px;
border-radius:50px;
border:none;
background:#8B5E3C;
color:#fff;
cursor:pointer;
transition:.3s;
}

.login-box button:hover{
background:#D4A373;
}

.register-link{
text-align:center;
margin-top:15px;
font-size:14px;
}

.register-link a{
color:#D4A373;
text-decoration:none;
}

/* ERROR BOX */
.error-box{
background:#5c1f1f;
padding:12px;
border-radius:10px;
margin-bottom:20px;
font-size:13px;
}
.error-box ul{
list-style:none;
padding-left:0;
}
.error-box li{
margin-bottom:5px;
}

</style>
</head>
<body>

<div class="navbar">
<div class="container nav-wrapper">
<div class="logo">KURO <span>KOPISTHETIC</span></div>
<div class="nav-links">
<a href="{{ url('/') }}">Home</a>
</div>
</div>
</div>

<div class="login-section">
<div class="login-box">
<h2>Login</h2>

{{-- ERROR MESSAGE --}}
@if ($errors->any())
<div class="error-box">
<ul>
@foreach ($errors->all() as $error)
<li>• {{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form method="POST" action="{{ route('login') }}">
@csrf

<input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>
</form>

<div class="register-link">
Belum punya akun?
<a href="{{ route('register') }}">Register</a>
</div>

</div>
</div>

</body>
</html>
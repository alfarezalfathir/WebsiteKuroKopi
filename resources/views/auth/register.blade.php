<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - Kuro Kopisthetic</title>

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

/* REGISTER SECTION */
.register-section{
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding-top:100px;
}

.register-box{
background:rgba(255,255,255,0.05);
padding:50px;
border-radius:25px;
width:400px;
backdrop-filter:blur(10px);
}

.register-box h2{
font-family:'Playfair Display',serif;
margin-bottom:30px;
text-align:center;
}

.register-box input{
width:100%;
padding:12px;
margin-bottom:20px;
border-radius:50px;
border:none;
background:#1A1A1A;
color:#fff;
}

.register-box button{
width:100%;
padding:12px;
border-radius:50px;
border:none;
background:#8B5E3C;
color:#fff;
cursor:pointer;
transition:.3s;
}

.register-box button:hover{
background:#D4A373;
}

.login-link{
text-align:center;
margin-top:15px;
font-size:14px;
}

.login-link a{
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
}
.error-box li{
margin-bottom:5px;
}

.password-info{
display:block;
margin-top:-15px;
margin-bottom:15px;
color:#aaa;
font-size:12px;
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

<div class="register-section">
<div class="register-box">
<h2>Register</h2>

<form method="POST" action="{{ route('register') }}">
@csrf

@if ($errors->any())
<div class="error-box">
<ul>
@foreach ($errors->all() as $error)
<li>• {{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<input type="text" name="name" placeholder="Full Name" required value="{{ old('name') }}">
<input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">

<input type="password" name="password" placeholder="Password" required>
<small class="password-info">
Password minimal 8 karakter dan harus mengandung huruf & angka.
</small>

<input type="password" name="password_confirmation" placeholder="Confirm Password" required>

<button type="submit">Create Account</button>
</form>

<div class="login-link">
Sudah punya akun?
<a href="{{ route('login') }}">Login</a>
</div>

</div>
</div>

</body>
</html>
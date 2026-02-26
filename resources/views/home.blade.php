<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kuro Kopisthetic</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
scroll-behavior:smooth;
}

body{
font-family:'Poppins',sans-serif;
background:#0F0F0F;
color:#fff;
line-height:1.7;
overflow-x:hidden;
}

.container{
width:90%;
max-width:1200px;
margin:auto;
}

section{
padding:140px 0;
opacity:0;
transform:translateY(60px);
transition:1s ease;
}

section.show{
opacity:1;
transform:translateY(0);
}

/* NAVBAR */
.navbar{
position:fixed;
width:100%;
top:0;
padding:25px 0;
z-index:999;
transition:.4s;
}

.navbar.scrolled{
background:rgba(0,0,0,0.85);
backdrop-filter:blur(12px);
box-shadow:0 5px 20px rgba(0,0,0,0.4);
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

.nav-links{
display:flex;
align-items:center;
}

.nav-links a{
color:#fff;
text-decoration:none;
margin-left:30px;
font-size:14px;
}

/* HERO */
.hero{
height:100vh;
background:
linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.7)),
url('{{ asset("images/hero.jpg") }}') center/cover no-repeat;
display:flex;
align-items:center;
justify-content:center;
text-align:center;
}

.hero h1{
font-family:'Playfair Display',serif;
font-size:70px;
margin-bottom:20px;
}

.hero p{
color:#ddd;
margin-bottom:40px;
}

.btn{
padding:12px 30px;
background:#8B5E3C;
border-radius:50px;
text-decoration:none;
color:#fff;
transition:.3s;
display:inline-block;
border:none;
cursor:pointer;
}

.btn:hover{
background:#D4A373;
transform:translateY(-3px);
}

/* ABOUT */
.about{
background:#F5EFE6;
color:#111;
}

.about-wrapper{
display:flex;
gap:60px;
align-items:center;
}

.about img{
width:100%;
border-radius:20px;
}

/* ================= MENU ================= */
.menu-title{
text-align:center;
font-size:40px;
margin-bottom:70px;
font-family:'Playfair Display',serif;
}

.menu-wrapper{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
gap:35px;
}

.menu-card{
background:rgba(255,255,255,0.05);
border-radius:25px;
overflow:hidden;
transition:.4s;
backdrop-filter:blur(8px);
}

.menu-card:hover{
transform:translateY(-10px);
background:rgba(255,255,255,0.08);
}

.menu-img{
width:100%;
height:230px;
object-fit:cover;
transition:.4s;
}

.menu-card:hover .menu-img{
transform:scale(1.05);
}

.menu-content{
padding:25px;
text-align:center;
}

.menu-content h3{
margin-bottom:10px;
font-size:20px;
}

.menu-content p{
color:#ccc;
font-size:14px;
min-height:50px;
}

.menu-content span{
display:block;
margin-top:15px;
color:#D4A373;
font-weight:600;
font-size:16px;
}

/* LOCATION */
.location{
text-align:center;
background:#111;
}

.map-wrapper{
margin-top:40px;
border-radius:20px;
overflow:hidden;
}

.map-wrapper iframe{
width:100%;
height:400px;
border:0;
}

footer{
background:#000;
padding:40px;
text-align:center;
color:#aaa;
font-size:14px;
}

@media(max-width:900px){
.about-wrapper{
flex-direction:column;
}
.hero h1{
font-size:42px;
}
}
</style>
</head>
<body>

<div class="navbar" id="navbar">
<div class="container nav-wrapper">
<div class="logo">KURO <span>KOPISTHETIC</span></div>

<div class="nav-links">
<a href="#home">Home</a>
<a href="#about">About</a>
<a href="#menu">Menu</a>
<a href="#visit">Visit</a>

@auth
@if(auth()->user()->role === 'admin')
<a href="{{ route('menu.index') }}">Admin</a>
@endif

<form action="{{ route('logout') }}" method="POST" style="display:inline;">
@csrf
<button class="btn" style="margin-left:20px;">Logout</button>
</form>
@else
<a href="{{ route('login') }}" class="btn" style="margin-left:20px;">Login</a>
@endauth

</div>
</div>
</div>

<section class="hero" id="home">
<div class="container">
<h1>Where Coffee Meets Aesthetic</h1>
<p>Modern minimalist coffee experience with bold personality.</p>
<a href="#menu" class="btn">Explore Menu</a>
</div>
</section>

<section class="about" id="about">
<div class="container about-wrapper">
<div style="flex:1">
<img src="{{ asset('images/about.jpg') }}">
</div>
<div style="flex:1">
<h2>About Kuro</h2>
<p>
Kuro Kopisthetic is a premium aesthetic coffee space inspired by Japanese minimalism and urban cafe culture.
</p>
</div>
</div>
</section>

<!-- MENU -->
<section id="menu">
<div class="container">
<h2 class="menu-title">Signature Menu</h2>

@php
$menus = \App\Models\Menu::all();
@endphp

<div class="menu-wrapper">

@forelse($menus as $item)
<div class="menu-card">

@if($item->foto)
<img src="{{ asset('uploads/'.$item->foto) }}" class="menu-img">
@else
<img src="https://via.placeholder.com/400x300?text=No+Image" class="menu-img">
@endif

<div class="menu-content">
<h3>{{ $item->name }}</h3>
<p>{{ $item->description }}</p>
<span>Rp {{ number_format($item->price,0,',','.') }}</span>
</div>

</div>
@empty
<p style="text-align:center;">No menu available yet.</p>
@endforelse

</div>
</div>
</section>

<section class="location" id="visit">
<div class="container">
<h2>Visit Us</h2>
<p>Jl. maribaya No. 88, Lembang</p>

<div class="map-wrapper">
<iframe src="https://www.google.com/maps?q=Lembang&output=embed"></iframe>
</div>

<br>

<a href="https://www.google.com/maps/search/?api=1&query=Lembang" 
target="_blank" 
class="btn">
Open in Google Maps
</a>

</div>
</section>

<footer>
© 2026 Kuro Kopisthetic. All Rights Reserved.
</footer>

<script>
window.addEventListener("scroll", function(){
let navbar = document.getElementById("navbar");
navbar.classList.toggle("scrolled", window.scrollY > 50);
});

const sections = document.querySelectorAll("section");
window.addEventListener("scroll", () => {
sections.forEach(sec => {
const top = sec.getBoundingClientRect().top;
if(top < window.innerHeight - 100){
sec.classList.add("show");
}
});
});
</script>

</body>
</html>
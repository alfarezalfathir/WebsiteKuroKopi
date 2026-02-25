<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - Kuro</title>

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

.btn{
padding:10px 25px;
background:#8B5E3C;
border-radius:50px;
text-decoration:none;
color:#fff;
transition:.3s;
border:none;
cursor:pointer;
}

.btn:hover{
background:#D4A373;
transform:translateY(-3px);
}

/* DASHBOARD */
.dashboard{
padding-top:140px;
padding-bottom:80px;
}

.title{
font-family:'Playfair Display',serif;
font-size:40px;
margin-bottom:40px;
}

.card-grid{
display:grid;
grid-template-columns:repeat(auto-fill,minmax(250px,1fr));
gap:30px;
}

.menu-card{
background:rgba(255,255,255,0.05);
padding:30px;
border-radius:25px;
transition:.4s;
backdrop-filter:blur(8px);
}

.menu-card:hover{
transform:translateY(-10px);
background:rgba(255,255,255,0.08);
}

.menu-card h3{
margin-bottom:10px;
}

.price{
color:#D4A373;
margin-top:10px;
font-weight:500;
}

.actions{
margin-top:15px;
display:flex;
gap:10px;
}

.delete-btn{
background:#aa2e2e;
}

.stats{
margin-bottom:50px;
background:rgba(255,255,255,0.05);
padding:30px;
border-radius:25px;
text-align:center;
}

.stats h2{
font-family:'Playfair Display',serif;
font-size:32px;
}

</style>
</head>
<body>

<div class="navbar">
<div class="container nav-wrapper">
<div class="logo">KURO <span>KOPISTHETIC</span></div>
<div>
<a href="{{ url('/') }}" class="btn">Back to Site</a>
<form action="{{ route('logout') }}" method="POST" style="display:inline;">
@csrf
<button class="btn">Logout</button>
</form>
</div>
</div>
</div>

<div class="container dashboard">

<h1 class="title">Admin Dashboard</h1>

<div class="stats">
<h2>Total Menu: {{ $menus->count() }}</h2>
</div>

<a href="{{ route('menu.create') }}" class="btn" style="margin-bottom:30px;display:inline-block;">
+ Tambah Menu
</a>

<div class="card-grid">

@foreach($menus as $menu)
<div class="menu-card">
<h3>{{ $menu->name }}</h3>
<p>{{ $menu->description }}</p>
<div class="price">Rp {{ number_format($menu->price) }}</div>

<div class="actions">
<a href="{{ route('menu.edit', $menu->id) }}" class="btn">Edit</a>

<form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
@csrf
@method('DELETE')
<button class="btn delete-btn">Delete</button>
</form>
</div>

</div>
@endforeach

</div>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Menu - Kuro Kopisthetic</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{
font-family:'Poppins',sans-serif;
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
box-shadow:0 5px 20px rgba(0,0,0,0.4);
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

/* FORM SECTION */
.form-section{
padding:160px 0 100px 0;
}

.form-wrapper{
max-width:600px;
margin:auto;
}

.form-title{
font-family:'Playfair Display',serif;
font-size:42px;
margin-bottom:10px;
text-align:center;
}

.form-sub{
text-align:center;
color:#aaa;
margin-bottom:50px;
}

.form-card{
background:rgba(255,255,255,0.05);
padding:50px;
border-radius:25px;
}

.form-input{
width:100%;
padding:15px 20px;
margin-bottom:20px;
border-radius:50px;
border:1px solid rgba(255,255,255,0.1);
background:#1a1a1a;
color:#fff;
font-size:14px;
transition:.3s;
}

.form-input:focus{
outline:none;
border:1px solid #D4A373;
box-shadow:0 0 10px rgba(212,163,115,0.4);
}

textarea.form-input{
border-radius:20px;
resize:none;
}

.submit-btn{
width:100%;
padding:14px;
border-radius:50px;
border:none;
background:#8B5E3C;
color:#fff;
font-weight:600;
cursor:pointer;
transition:.3s;
}

.submit-btn:hover{
background:#D4A373;
transform:translateY(-3px);
}

.error-box{
background:#3a1f1f;
padding:12px 15px;
border-radius:12px;
margin-bottom:20px;
font-size:13px;
}
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
<div class="container nav-wrapper">
<div class="logo">KURO <span>KOPISTHETIC</span></div>

<div class="nav-links">
<a href="{{ route('menu.index') }}">Admin</a>
<a href="{{ url('/') }}">Home</a>
</div>
</div>
</div>

<!-- FORM -->
<section class="form-section">
<div class="container form-wrapper">

<h1 class="form-title">Tambah Menu ☕</h1>
<p class="form-sub">Tambahkan menu baru ke Kuro Kopisthetic</p>

<div class="form-card">

@if ($errors->any())
<div class="error-box">
<ul style="margin:0;padding-left:15px;">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input type="text"
name="name"
placeholder="Nama Menu"
class="form-input"
value="{{ old('name') }}"
required>

<textarea name="description"
rows="4"
placeholder="Deskripsi Menu"
class="form-input"
required>{{ old('description') }}</textarea>

<input type="number"
name="price"
placeholder="Harga"
class="form-input"
value="{{ old('price') }}"
required>

<!-- INPUT FOTO -->
<input type="file"
name="foto"
class="form-input"
style="padding:12px;border-radius:20px;">

<button type="submit" class="submit-btn">
Simpan Menu
</button>

</form>

</div>
</div>
</section>

</body>
</html>
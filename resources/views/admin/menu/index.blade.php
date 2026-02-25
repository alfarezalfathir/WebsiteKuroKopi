<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Menu - Kuro Kopisthetic</title>

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
}

.container{
width:90%;
max-width:1200px;
margin:auto;
}

/* ================= NAVBAR ================= */
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
position:relative;
}

.nav-links a::after{
content:"";
position:absolute;
left:0;
bottom:-5px;
width:0%;
height:2px;
background:#D4A373;
transition:.4s;
}

.nav-links a:hover::after{
width:100%;
}

/* ================= ADMIN SECTION ================= */
.admin-section{
padding:160px 0 100px 0;
}

.admin-title{
text-align:center;
font-size:42px;
margin-bottom:15px;
font-family:'Playfair Display',serif;
}

.admin-sub{
text-align:center;
color:#aaa;
margin-bottom:50px;
}

.add-btn{
display:inline-block;
padding:12px 28px;
background:#8B5E3C;
border-radius:50px;
text-decoration:none;
color:#fff;
transition:.3s;
margin-bottom:40px;
}

.add-btn:hover{
background:#D4A373;
transform:translateY(-3px);
}

/* ================= TABLE ================= */
.table-wrapper{
background:rgba(255,255,255,0.05);
padding:40px;
border-radius:25px;
}

table{
width:100%;
border-collapse:collapse;
}

th{
text-align:left;
padding:15px;
background:#8B5E3C;
font-weight:500;
}

td{
padding:18px 15px;
border-bottom:1px solid rgba(255,255,255,0.1);
}

tr:hover{
background:rgba(255,255,255,0.05);
}

.action-btn{
padding:7px 16px;
border-radius:30px;
font-size:13px;
border:none;
cursor:pointer;
text-decoration:none;
color:#fff;
margin-right:5px;
}

.edit-btn{
background:#D4A373;
color:#000;
}

.delete-btn{
background:#333;
}

.delete-btn:hover{
background:#8b0000;
}
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
<div class="container nav-wrapper">
<div class="logo">KURO <span>KOPISTHETIC</span></div>

<div class="nav-links">
<a href="{{ url('/') }}">Home</a>
<a href="{{ url('/') }}#menu">Menu</a>

<form action="{{ route('logout') }}" method="POST" style="display:inline;">
@csrf
<button style="background:none;border:none;color:white;margin-left:30px;cursor:pointer;">
Logout
</button>
</form>
</div>
</div>
</div>

<!-- ADMIN CONTENT -->
<section class="admin-section">
<div class="container">

<h1 class="admin-title">Admin Menu ☕</h1>
<p class="admin-sub">Kelola daftar menu KURO Kopi</p>

<div style="text-align:center;">
<a href="{{ route('menu.create') }}" class="add-btn">+ Tambah Menu</a>
</div>

<div class="table-wrapper">

<table>
<thead>
<tr>
<th style="width:60px;">#</th>
<th>Nama Menu</th>
<th style="width:180px;">Harga</th>
<th style="width:200px;">Aksi</th>
</tr>
</thead>

<tbody>
@forelse($menus as $menu)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $menu->name }}</td>
<td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
<td>
<a href="{{ route('menu.edit',$menu->id) }}" class="action-btn edit-btn">
Edit
</a>

<form action="{{ route('menu.destroy',$menu->id) }}"
method="POST"
style="display:inline;">
@csrf
@method('DELETE')
<button type="submit"
class="action-btn delete-btn"
onclick="return confirm('Yakin hapus menu ini?')">
Hapus
</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="4" style="text-align:center;padding:40px;color:#aaa;">
Belum ada menu yang ditambahkan.
</td>
</tr>
@endforelse
</tbody>
</table>

</div>
</div>
</section>

</body>
</html>
<h1>Tambah Menu</h1>

<form action="{{ route('menu.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama Menu">
    <input type="number" name="price" placeholder="Harga">
    <textarea name="description" placeholder="Deskripsi"></textarea>
    <button type="submit">Simpan</button>
</form>
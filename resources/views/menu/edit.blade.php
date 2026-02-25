<h1>Edit Menu</h1>

<form action="{{ route('menu.update',$menu->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $menu->name }}">
    <input type="number" name="price" value="{{ $menu->price }}">
    <textarea name="description">{{ $menu->description }}</textarea>
    <button type="submit">Update</button>
</form>
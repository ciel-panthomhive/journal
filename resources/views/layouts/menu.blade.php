@role('admin')
<div class="sidenav">
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    <a href="{{ route('kategori') }}" class="btn btn-primary">Rubik</a>
    <a href="{{ route('subkategori') }}" class="btn btn-primary">Kategori</a></td>
    <a href="{{ route('user') }}" class="btn btn-primary">User</a></td>
</div>
@endrole

@role('redaktur')
<div class="sidenav">
    <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
    <a href="{{ route('publish') }}" class="btn btn-primary">Publish</a></td>
    <a href="{{ route('myartikel') }}" class="btn btn-primary">My Artikel</a></td>
    <a href="{{ route('headline') }}" class="btn btn-primary">Headline</a></td>
</div>
@endrole

@role('jurnalis')
<div class="sidenav">
    <a href="{{ route('kategori') }}" class="btn btn-primary">Home</a>
    <a href="{{ route('subkategori') }}" class="btn btn-primary">Publish</a></td>
    <a href="{{ route('user') }}" class="btn btn-primary">Add Artikel</a></td>
</div>
@endrole

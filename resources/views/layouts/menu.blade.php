@role('admin')
<li>
    <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('kategori') }}">{{ __('Rubik') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('subkategori') }}">{{ __('Kategori') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('user') }}">{{ __('User') }}</a>
</li>
@endrole

@role('redaktur')
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('publish') }}">{{ __('Publish') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('myartikel') }}">{{ __('My Artikel') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('video') }}">{{ __('Video') }}</a>
</li>
@endrole

@role('jurnalis')
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('publish.jurnalis') }}">{{ __('Publish') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('artikelredaktur.add') }}">{{ __('Add Artikel') }}</a>
</li>
@endrole

{{-- <li class="nav-item">
    <a class="nav-link" href="{{ route('change') }}">{{ __('Ubah Pass') }}</a>
</li> --}}

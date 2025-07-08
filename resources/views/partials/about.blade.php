@props(['community' => collect([])])

<div class="container py-5">
    <h1 class="text-center mb-5 border-bottom border-dark border-2 pb-3">Tentang {{ $community->name ?? 'Simpul' }}</h1>
    <div class="row my-3 align-items-center mb-5">
        <div class="col-md-5">
            <img src="{{ asset('assets/img/1.jpg') }}" alt="" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            {!! $community->description !!}
        </div>
    </div>

    <h2 class="text-center mb-3">Visi dan Misi</h2>
    <div class="row my-3 align-items-center">
        <div class="col-md-6">
            <h3 class="text-center">Visi</h3>
            {!! $community->vision !!}
        </div>
        <div class="col-md-6">
            <h3 class="text-center">Misi</h3>
            {!! $community->mission !!}
        </div>
    </div>
</div>

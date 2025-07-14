@extends('layouts.app')

@section('content')
<div class="container py-5">
    {{-- HERO --}}
    <div class="text-center mb-5">
        <h1 class="display-5">Hubungi Kami</h1>
        <p class="lead text-muted">Kami siap mendengar pertanyaan, saran, atau kolaborasi dari Anda.</p>
    </div>

    {{-- INFORMASI KONTAK --}}
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <strong>Kontak Komunitas</strong>
                </div>
                <div class="card-body">
                    @foreach ($contacts as $contact)
                        <div class="mb-3 d-flex align-items-center">
                            @if ($contact->icon)
                                <i class="{{ $contact->icon }} me-2 fs-5 text-dark"></i>
                            @endif
                            <strong class="me-2">{{ $contact->label }}:</strong>

                            @if ($contact->type === 'email')
                                <a href="mailto:{{ $contact->value }}">{{ $contact->value }}</a>
                            @elseif($contact->type === 'whatsapp')
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->value) }}" target="_blank">
                                    {{ $contact->value }}
                                </a>
                            @elseif($contact->type === 'instagram')
                                <a href="https://instagram.com/{{ ltrim($contact->value, '@') }}" target="_blank">
                                    {{ $contact->value }}
                                </a>
                            @else
                                <span>{{ $contact->value }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- FORM KONTAK EMAIL --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h4 class="mb-3">Kirim Pesan Langsung</h4>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Anda</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn btn-dark">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>
@endsection

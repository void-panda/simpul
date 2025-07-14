@extends('layouts.app')

@section('content')
    <div class="container py-5">

        {{-- Hero --}}
        <div class="text-center mb-5">
            <h1 class="display-5">Bantu Gerakan Kami</h1>
            <p class="lead">Dukung komunitas ini dengan berdonasi. Setiap kontribusi Anda sangat berarti.</p>
        </div>
        
        
        <div class="row">
            {{-- Informasi Rekening --}}
            <div class="col-md-5">
                <h3 class="mb-4">Rekening Tujuan Donasi</h3>
    
                @forelse($accounts as $account)
                    <div class="border p-3 rounded mb-3">
                        <strong>{{ $account->bank_name }}</strong><br>
                        {{ $account->account_number }} a.n {{ $account->account_holder }}
                        @if ($account->note)
                            <br><small class="text-muted">{{ $account->note }}</small>
                        @endif
                    </div>
                @empty
                    <p class="text-muted">Belum ada informasi rekening tersedia.</p>
                @endforelse
            </div>
            
            {{-- Form Donasi Manual --}}
            <div class="col-md-7">
                @session('success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('success') }}
                </div>
                @endsession
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="mb-4">Catat Donasi Anda</h3>
                <form method="POST" action="{{ route('donation.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="donor_name" class="form-label">Nama Donatur*</label>
                            <input type="text" name="donor_name" class="form-control" value="{{ old('donor_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="donor_whatsapp" class="form-label">Whatsapp Number*</label>
                            <input type="tel" name="donor_whatsapp" class="form-control" value="{{ old('donor_whatsapp') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="amount" class="form-label">Jumlah Donasi (Rp)*</label>
                            <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="proof" class="form-label">Bukti Transfer*</label>
                            <input type="file" name="proof" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan (Opsional)</label>
                        <textarea name="note" class="form-control" rows="5">{{ old('note') }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark">Kirim Donasi</button>
                    </div>
                </form>
            </div>
        </div>

        <hr class="mt-5">

        {{-- Histori Donasi --}}
        @include('partials.donation-history', ['donations' => $donations])

    </div>
@endsection

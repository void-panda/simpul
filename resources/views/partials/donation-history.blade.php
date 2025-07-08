@props([
    'donation' => collect([])
])

<div class="row mt-5">
    <h3 class="mb-4">Histori Donasi</h3>
    <div class="row">

        @forelse($donations as $donation)
            <div class="col-md-6">
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>{{ $donation->donor_name ?? 'Anonim' }}</h4>
                        <span class="badge bg-success">Rp{{ number_format($donation->amount, 0, ',', '.') }}</span>
                    </div>

                    @if ($donation->note)
                        <p class="mt-2 mb-1 text-muted" style="font-size: 0.9rem;">
                            “{{ $donation->note }}”
                        </p>
                    @endif

                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($donation->donated_at)->translatedFormat('d F Y, H:i') }}
                    </small>

                    @if ($donation->proof)
                        <div class="mt-2">
                            <a href="{{ Storage::url($donation->proof) }}" target="_blank"
                                class="btn btn-sm btn-outline-secondary">
                                Lihat Bukti Transfer
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada donasi yang tercatat.</p>
        @endforelse

        {{ $donations instanceof \Illuminate\Pagination\LengthAwarePaginator ? $donations->links('vendor.pagination.bootstrap-5') : '' }}

    </div>
</div>

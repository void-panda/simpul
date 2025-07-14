<style>
.partner-slider {
    height: 100px;
    position: relative;
}

.slider-track {
    display: flex;
    width: max-content;
    animation: scrollLeft 30s linear infinite;
}

.partner-item {
    min-width: 200px;
    transition: all 0.3s ease-in-out;
}

.partner-item:hover {
    background-color: #f8f9fa !important;
    animation-play-state: paused;
}

.partner-item:hover img {
    filter: none;
    transform: scale(1.05);
}

.partner-item img {
    filter: grayscale(100%);
    transition: filter 0.3s ease, transform 0.3s ease;
}

@keyframes scrollLeft {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
</style>


<section class="py-5 bg-light border-top border-bottom">
    <div class="container">
        <h4 class="text-center mb-4">Kemitraan & Kolaborasi</h4>

        <div class="partner-slider position-relative">
            <div class="slider-track d-flex align-items-center">
                @foreach ($partners as $partner)
                    <div class="partner-item d-flex justify-content-center align-items-center overflow-hidden mx-2 bg-secondary bg-opacity-10 rounded shadow-sm transition p-2" style="aspect-ratio: 16/9; width: 200px; opacity: 0.8">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" style="height: 100%; width: 100%; object-fit: cover" class="img-fluid grayscale">
                    </div>
                @endforeach

                {{-- Duplicate for infinite effect --}}
                @foreach ($partners as $partner)
                    <div class="partner-item d-flex justify-content-center align-items-center overflow-hidden mx-2 bg-secondary bg-opacity-10 rounded shadow-sm transition p-2" style="aspect-ratio: 16/9; width: 200px; opacity: 0.8">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" style="height: 100%; width: 100%; object-fit: cover" class="img-fluid grayscale">
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

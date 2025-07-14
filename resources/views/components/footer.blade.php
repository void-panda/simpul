@php
$community = DB::table('communities')->get();
@endphp


<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-8 footer-about">
          <div class="d-flex align-items-center gap-5">
            <a href="index.html" class="logo d-flex align-items-center">
              <span class="text-sm border border-white px-1">{{ $community->first()->name ?? 'Simpul' }}</span>
            </a>
            <div class="footer-contact">
              <p>{{ $community->first()->address ?? 'Jl. Cendrawasih Sumbawa' }}</p>
              <p>{{ $community->first()->city ?? 'Sumbawa Besar, Nusa Tenggara Barat' }}</p>
            </div>
            <div class="footer-contact">
              <p><strong>Phone:</strong> <span>{{ $community->first()->phone ?? '+62 5589 55488 55' }}</span></p>
              <p><strong>Email:</strong> <span>{{ $community->first()->email ?? 'admin@simpul.com' }}</span></p>
            </div>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="{{ route('about') }}">Tentang</a></li>
            <li><a href="{{ route('donation.index') }}">Donasi</a></li>
            <li><a href="{{ route('news.index') }}">Berita</a></li>
            <li><a href="{{ route('events.index') }}">Events</a></li>
            <li><a href="{{ route('contact.index') }}">Kontak</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Kategori</h4>
          <ul>
            @foreach (['press-release', 'event-report', 'announcement'] as $ctg)
              <li><a href="{{ route('news.index', ['category' => $ctg]) }}" class="text-capitalize">{{ $ctg }}</a></li>
            @endforeach
          </ul>
        </div>


      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <h1 style="max-width: max-content;" class="sitename border border-white px-1 m-auto">Simpul</h1>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">Void Panda</a>
      </div>
    </div>

  </footer>
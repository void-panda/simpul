<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <h4 class="sitename border border-dark px-1">Simpul</h4>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('about') }}">Tentang</a></li>
          <li><a href="{{ route('donation.index') }}">Donasi</a></li>
          <li class="dropdown"><a href="#"><span>Kategori</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              @foreach (['press-release', 'event-report', 'announcement'] as $ctg)
                <li><a href="{{ route('news.index', ['category' => $ctg]) }}" class="text-capitalize">{{ $ctg }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{ route('news.index') }}">Berita</a></li>
          <li><a href="{{ route('events.index') }}">Events</a></li>
          <li><a href="{{ route('contact.index') }}">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>
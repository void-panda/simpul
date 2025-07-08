@props([
    'news' => collect([])
])

<section id="slider" class="slider section dark-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">

            <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

            <div class="swiper-wrapper">
                @foreach ($news as $n)
                    <div class="swiper-slide" style="background-image: url('{{ Str::startsWith($n->cover_image, 'https://') ? $n->cover_image : Storage::url($n->cover_image)  }}');">
                        <div class="content">
                            <h1 class="display-5">
                                <a href="{{ route('news.show', $n->slug) }}">
                                    {{ $n->title }}
                                </a>
                            </h1>
                            <p>
                                {{ $n->excerpt }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>

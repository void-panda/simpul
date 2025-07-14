
<style>
  .org-node {
    position: absolute;
    background-color: #ffffff;
    border: 2px solid #4A90E2;
    border-radius: 8px;
    padding: 8px 12px;
    text-align: center;
    font-size: 14px;
    font-weight: 500;
    min-width: 130px;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
  }
</style>


<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Struktur Organisasi</h2>

        <div id="org-chart" class="p-4 border bg-light" style="overflow-x: auto;">
        <div id="diagram" class="position-relative" style="height: 500px; min-width: 1000px;"></div>
        </div>


        <h3 class="mt-5 text-center fw-bold">Anggota</h3>
        <p class="text-center">Total Anggota Aktif: <strong>25 Orang</strong></p>
        <p class="text-center mb-5 mx-auto">
            Mereka adalah pemuda dan pemudi <strong>Tana Samawa</strong> yang memiliki semangat kepedulian tinggi terhadap masyarakat dan lingkungan sekitar.
        </p>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-star-fill fs-1 text-primary"></i>
                        </div>
                        <h5 class="card-title">Pembina</h5>
                        <p class="card-text">Penasehat utama yang mendampingi dan memberi arahan strategis bagi komunitas.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-people-fill fs-1 text-success"></i>
                        </div>
                        <h5 class="card-title">Tim Inti</h5>
                        <p class="card-text">Pengurus utama yang menjalankan program dan operasional komunitas.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-person-heart fs-1 text-danger"></i>
                        </div>
                        <h5 class="card-title">Relawan</h5>
                        <p class="card-text">Pemuda/i yang tergabung dalam kegiatan komunitas secara sukarela dan aktif.</p>
                    </div>
                </div>
            </div>
        </div>


        <h3 class="mt-5 mb-4 text-center fw-bold">Pengurus Inti</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @php
                $pengurusInti = [
                    ['nama' => 'Rafly Akbar Hikmawan', 'jabatan' => 'Ketua'],
                    ['nama' => 'Nunung Darwati', 'jabatan' => 'Sekretaris'],
                    ['nama' => 'Rahmi Syalmiati', 'jabatan' => 'Bendahara'],
                    ['nama' => 'Supriady', 'jabatan' => 'Koordinator Program'],
                    ['nama' => 'Agus Setiawan', 'jabatan' => 'Koordinator Relawan'],
                    ['nama' => 'Febriana Nurhikmah', 'jabatan' => 'Koordinator Funding'],
                    ['nama' => 'Muhammad Alip', 'jabatan' => 'Koordinator Media'],
                    ['nama' => 'Fitri Sona Purnama', 'jabatan' => 'Koordinator PSDM'],
                ];
            @endphp

            @foreach ($pengurusInti as $p)
                <div class="col">
                    <div class="card text-center h-100 shadow-sm">
                        <div class="card-body">
                            <img 
                                src="https://ui-avatars.com/api/?name={{ urlencode($p['nama']) }}&background=0D8ABC&color=fff&size=128" 
                                alt="{{ $p['nama'] }}" 
                                class="rounded-circle mb-3" 
                                width="100" height="100">
                            <h5 class="card-title">{{ $p['nama'] }}</h5>
                            <p class="card-text text-muted">{{ $p['jabatan'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>



    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jsPlumb/2.15.6/js/jsplumb.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("diagram");

    const instance = window.jsPlumb.getInstance({
      Container: container,
      Connector: ["Flowchart"],
      PaintStyle: { stroke: "#4A90E2", strokeWidth: 2 },
      Endpoint: "Dot",
      EndpointStyle: { fill: "#4A90E2", radius: 5 },
      Anchors: ["Bottom", "Top"],
      Overlays: [["Arrow", { width: 10, length: 10, location: 1 }]],
    });

    const nodes = [
      { id: "pembina", text: "Pembina", top: 10, left: 440 },
      { id: "ketua", text: "Ketua", top: 90, left: 440 },
      { id: "sekretaris", text: "Sekretaris", top: 170, left: 320 },
      { id: "bendahara", text: "Bendahara", top: 170, left: 560 },

      { id: "funding", text: "Koordinator Funding", top: 270, left: 100 },
      { id: "relawan", text: "Koordinator Relawan", top: 270, left: 260 },
      { id: "program", text: "Koordinator Program", top: 270, left: 420 },
      { id: "psdm", text: "Koordinator PSDM", top: 270, left: 580 },
      { id: "media", text: "Koordinator Media", top: 270, left: 740 },
    ];

    nodes.forEach((node) => {
      const div = document.createElement("div");
      div.id = node.id;
      div.textContent = node.text;
      div.className = "org-node";
      div.style.top = node.top + "px";
      div.style.left = node.left + "px";
      container.appendChild(div);
      instance.setDraggable(div, false);
      instance.makeTarget(div, {
        anchor: "Top",
        allowLoopback: false,
      });
    });

    // Connectors
    instance.connect({ source: "pembina", target: "ketua" });
    instance.connect({ source: "ketua", target: "sekretaris" });
    instance.connect({ source: "ketua", target: "bendahara" });

    ["funding", "relawan", "program", "psdm", "media"].forEach((id) => {
      instance.connect({ source: "sekretaris", target: id });
      instance.connect({ source: "bendahara", target: id });
    });
  });
</script>

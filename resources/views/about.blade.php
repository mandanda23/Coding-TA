@extends("layouts.main")

@section("container")

<section id="manda">
  
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/1.jpg" id="satu" class="d-block w-100" alt="anjay1" style="height: 450px">
        <div class="carousel-caption d-md-block" >
          <h1>About Sirakaja</h1>
          <p>Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia.</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="assets/img/2.jpg" id="satu" class="d-block w-100" alt="anjay2" style="height: 450px">
        <div class="carousel-caption d-md-block">
          <h1>About Sirakaja</h1>
          <p>Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia.</p>
        </div>
      </div>
    
      <div class="carousel-item">
        <img src="assets/img/3.jpg" id="satu" class="d-block w-100" alt="anjay3" style="height: 450px">
        <div class="carousel-caption d-md-block">
          <h1>About Sirakaja</h1>
          <p>Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section><!--end silde-->

<div id="keterangan" class="container bg-light">
<section id="penjelasan">
  <ul><img src="assets/img/logo1.png" class="rounded mx-auto d-block " alt="logo" ></ul>
  <div class="container mt-3 bg-light">
  
      <div class="container" style="text-align: justify">
        <p>Selamat datang di Sirikaya (Sistem Informasi Pura Kahyanan Jagat) merupakan hasil pelestarian pura Kahyangan Jagat dengan memanfaatkan teknologi informasi yang dilakukan di pulau Bali, Indonesia. Sistem Informasi ini berfungsi sebagai alat untuk mendokumentasikan pengetahuan warisan budaya sehingga pemahaman dan pengetahuan yang tersimpan didalamnya dapat dipelajari, dikembangkan, dan diteruskan oleh generasi muda berikutnya.
        Sistem Informasi ini memiliki fitur yaitu penelusuran (browsing) dan pencarian (searching). penelusuran (browsing) diambil melalui hirarki ontology Pura Kahyangan Jagat yang telah dikerjakan, dan pencarian (searching) berdasarkan hubungan semantik antar satu konsep dengan konsep lainnya di dalam domain Pura Kahyangan Jagat.</p>
      </div>
  
    
    <div id="rdf" class="container-fluid">
        <ul><img src="assets/img/ontograf.PNG" class="rounded mx-auto d-block"  alt="gambarRDF"></ul>
        <ul><h3>GAMBAR RDF DIAGRAM</h3></ul>
      
    </div>
  </div>
</section>  
</div>
@endsection
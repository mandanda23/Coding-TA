@extends("layouts.main")

@section("container")

@foreach ($result as $dtl)
<section id="" style="margin-top: 59px">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('/assets/img/pura/'.$dtl['cover'])}}" class="d-block w-100" alt="anjay3" style="height: 400px">
      </div>
    </div>
  </div>
</section>
<div id="keterangan" class="container">
<section id="penjelasan">
  <div class="container mt-3 bg-light">
   <div class="container">
    <div class="row">
      <div id="wes" class="col">
        <img src="{{ asset('/assets/img/pura/'.$dtl['gambar'])}}" class="col-md-12"  alt="pura">
      </div>
      <div class="col mt-2 ms-2 bg-light">
        <div class="row-md-center" style="text-align: center"> 
          <h2>
            Data Pura{{ str_replace('Pura',' ',$dtl['nama'])}}
          </h2>
        </div>
          <div class="row">
            <div class="col"><h3>Status Pura</h3></div>
            <div class="col"><h3>: {{ $dtl['Setatus']}} </h3></div>
          </div>
          <div class="row">
            <div class="col"><h3>Lokasi / Alamat Pura</h3></div>
          </div>
          <div class="row">
            <div class="col"><h3>Desa</h3></div>
            <div class="col"><h3>: {{ str_replace('Desa','',$dtl['Desa'])}}</h3></div>
          </div>
          <div class="row">
            <div class="col"><h3>Banjar</h3></div>
            <div class="col"><h3>: {{ str_replace('Banjar','',$dtl['Banjar'])}}</h3></div>
          </div>
          <div class="row">
            <div class="col"><h3>Kecamatan</h3></div>
            <div class="col"><h3>: {{ str_replace('Kecamatan','',$dtl['Kecamatan'])}}</h3></div>
          </div>
          <div class="row">
            <div class="col"><h3>Kabupaten</h3></div>
            <div class="col"><h3>: {{ $dtl['Kabupaten']}}</h3></div>
          </div>
          <div class="row">
            <div class="col"><h3>Hari Piodalan</h3></div>
            <div class="col"><h3>: {{ $dtl['HariPiodalan']}} </h3></div>
          </div>
      </div>
    </div>
    <section>
      <div class="container" style="text-align: justify">
        {!! $dtl['Pengertian']!!}
      </div>
    </section>
   </div>
    
    <section id="maps">
      <div class="container">
        <hr />
        <h2>maps</h2>
        <div class="embed-responsive-item mb-2" style="width: auto">
          {!! $dtl['map']!!}
        </div>
      </div>
    </section>
  </div>
  <a href="/detailpura/{{ str_replace(' ', '_', $dtl['nama']) }}">
  <div class="btn shadow-sm mb-2 bg-body rounded">
   
      <h5 style="color: black"> <i class='bx bx-arrow-back'></i>  Back</h5>
    
  </div>
</a>
</div>
</section>
@endforeach
@endsection
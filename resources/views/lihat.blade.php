<?php use App\Http\Controllers\lihat; ?>
@extends("layouts.main")

@section("container")

<section id="dada" style="margin-top: 62px">
 
  <div class="container-fluid">
    <div class="row text-center fs-6">
      <div class="col my-2">
        <h1>
          Pura Kahyangan Jagat
        </h1>
      </div>
    </div>
    
    <div class="row ms-2 me-2">
      @foreach ($result as $item)
        <div class="col-lg-3 mb-3" style="width: 350px">
          <div class="card">
            <img src="{{ asset('/assets/img/pura/'.$item['cover'])}}" class="card-img-top" alt="Foto Pura" width="100%" height="225">
            <div class="card-body">
              <h6 class="card-title">{{ $item['nama']}}</h6>
              <div class="row">
                <div class="col">
                  <h6>Status Pura : {{ str_replace('Setatus','',$item['Setatus'])}}</h6>
                  <h6>Kabupaten : {{ str_replace('Kabupaten','',$item['Kabupaten'])}}</h6>
                </div>
              </div>
             
              <a href="/detailpura/{{ str_replace(' ', '_', $item['nama']) }}" class="btn btn-primary"> Read Moree</a>
              
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    
  </div>
  
</section><!--end browsing-->
@endsection
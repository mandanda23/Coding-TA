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
    
    <div class="card border-left-primary shadow h-100 ms-4 mt-3 " style="width: fit-content;">
      <div class="card-body">
          <div class="row no-gutters px-3">
              <div class="col container">
                  <div class="text-xs text-bold mb-1">
                      Total Data :</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
              <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300" style="color: indigo;">{{ count($result) }}</i>
              </div>
          </div>
      </div>
    </div>

    <div class="row mt-3 ms-2 me-2">
      @foreach ($result as $item)
        <div class="col-lg-3 mb-3" style="width: 350px">
          <div class="pura shadow h-100" id="pura1">
            
             <img src="{{ asset('/assets/img/pura/'.$item['cover'])}}" class="card-img-top" alt="Foto Pura" width="100%" height="225">
              <div class="card-body">
                <h6 class="card-title">{{ $item['nama']}}</h6>
                <div class="row">
                  <div class="col">
                    <h6>Status Pura : {{ str_replace('Setatus','',$item['Setatus'])}}</h6>
                    <h6>Kabupaten : {{ str_replace('Kabupaten','',$item['Kabupaten'])}}</h6>
                  </div>
                </div>
              
                <a href="/readmore/{{ str_replace(' ', '_', $item['nama']) }}" class="btn btn-primary"> Read More</a>
                
              </div>
            
          </div>
        </div>
        @endforeach
    </div>
    
  </div>
  
</section><!--end browsing-->
@endsection
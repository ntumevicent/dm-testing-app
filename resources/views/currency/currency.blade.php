@extends('layouts.admin-master')

@section('title')
{{ $pageTitle }} 
@endsection

@section('content')
<section class="section">
    <h2>{{ $pageTitle }}</h2>
    <div class="float-right">
      <a href="" class="btn btn-sm btn-primary">
        Logout
      </a>
    </div>


  <div class="section-body">
  <div class="row mt-4">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h3>{{ showprice($balance, $currency) }}</h3>
                      </div>
                    </div>
                  </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection

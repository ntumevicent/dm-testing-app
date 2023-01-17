@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>


  <div class="section-body">

  <div class="row mt-4">
  @foreach($get_bills as $bill)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('metercheck.detail', $bill->payee_code) }}">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas {{ $bill->bill_icon }}"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h3>{{ $bill->bill_name }}</h3>
                  </div>
                </div>
              </div>
              </a>
            </div>
            @endforeach

            
</div>

  </div>
</section>
@endsection

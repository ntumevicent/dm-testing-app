@extends('layouts.admin-master')

@section('title')
PayBills
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>
    
  <div class="section-body">
  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-lg-8">
                        <div class="wizard-steps">
                        <a href="{{ route('airtime.form') }}">
                            <div class="wizard-step">
                              <div class="wizard-step-icon">
                                <i class="fas fa-credit-card text-warning"></i>
                              </div>
                              <div class="wizard-step-label"> Airtime</div>
                            </div>
                          </a>
                          <a href="{{ route('data.form') }}">
                            <div class="wizard-step">
                              <div class="wizard-step-icon">
                                <i class="fas fa-credit-card text-warning"></i>
                              </div>
                              <div class="wizard-step-label"> Data</div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
  </div>
</section>
@endsection

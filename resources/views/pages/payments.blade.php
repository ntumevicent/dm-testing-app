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
                        <a href="{{ route('payment.bills') }}">
                            <div class="wizard-step">
                              <div class="wizard-step-icon">
                                <i class="fas fa-credit-card text-warning"></i>
                              </div>
                              <div class="wizard-step-label"> Pay Bills</div>
                            </div>
                          </a>
                          <a href="{{ route('payment.airtime') }}">
                            <div class="wizard-step">
                              <div class="wizard-step-icon">
                                <i class="fas fa-credit-card text-warning"></i>
                              </div>
                              <div class="wizard-step-label"> Airtime & Data</div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
  </div>
</section>
@endsection

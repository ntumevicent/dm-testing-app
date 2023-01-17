@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
    <h2>{{ $pageTitle }}</h2>


  <div class="section-body">
  <div class="row mt-4">
              <div class="col-12 col-md-6 col-lg-6">
                
                <div class="card">
                  <form method="POST" action="{{ route('check.meternumber') }}">
                  @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>Payee Code</label>
                        <input type="text" name="payee_code" class="form-control{{ $errors->has('payee_code') ? ' is-invalid' : '' }}" value={{ $payeecode }}>
                        @if ($errors->has('payee_code'))
                        <span class="invalid-feedback"> {{ $errors->first('payee_code') }} </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Enter Meter Number</label>
                        <input type="text" name="account_number" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" value="{{ old('account_number') }}">
                        @if ($errors->has('account_number'))
                        <span class="invalid-feedback"> {{ $errors->first('account_number') }} </span>
                        @endif
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary">Check Meter</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection

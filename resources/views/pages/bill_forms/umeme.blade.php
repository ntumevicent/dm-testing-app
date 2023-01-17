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
                  <form method="POST" action="{{ route('pay.umemeyaka') }}">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="payee_code" class="form-control" value="UMEME" readonly >
                      </div>
                      <div class="form-group">
                        <label>Meter Number</label>
                        <input type="text" name="account_number" class="form-control" value="04230658124" readonly>
                      </div>

                      <div class="form-group">
                        <label>Balance</label>
                        <input type="text" name="customer_balance" class="form-control" value="500" readonly>
                      </div>
                      <div class="form-group">
                        <label>Enter Phone Number</label>
                        <input type="text" name="customer_phone" class="form-control{{ $errors->has('customer_phone') ? ' is-invalid' : '' }}" value="{{ old('customer_phone') }}">
                        @if ($errors->has('customer_phone'))
                        <span class="invalid-feedback"> {{ $errors->first('customer_phone') }} </span>
                        @endif
                      </div>

                      <div class="form-group">
                        <label>Enter Amount</label>
                        <input type="text" name="customer_amount" class="form-control{{ $errors->has('customer_amount') ? ' is-invalid' : '' }}" value="{{ old('customer_amount') }}">
                        @if ($errors->has('customer_amount'))
                        <span class="invalid-feedback"> {{ $errors->first('customer_amount') }} </span>
                        @endif
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary">Pay Bill</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection

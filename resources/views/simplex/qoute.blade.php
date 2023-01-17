
@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>


  <div class="section-body">
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <form  action=" {{ route('pesapal.payform_submit') }} " method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" >
                        <div class="invalid-feedback">
                          {{ $errors->first('first_name') }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" >
                        <div class="invalid-feedback">
                          {{ $errors->first('last_name') }}
                        </div>
                      </div>
              
                    <div class="form-group">
                      <label for="email_address">Email</label>
                      <input id="email_address" type="email" class="form-control{{ $errors->has('email_address') ? ' is-invalid' : '' }}"  name="email_address">
                      <div class="invalid-feedback">
                        {{ $errors->first('email_address') }}
                      </div>
                    </div>
              
                    <div class="form-group">
                      <label for="amount" class="control-label">Amount</label>
                      <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid': '' }}"  name="amount">
                      <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                      </div>
                    </div>
              
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Submit Now
                      </button>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
  </div>
</section>
@endsection

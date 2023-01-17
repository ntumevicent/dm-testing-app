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
                  <form action="{{ route('ajax.ajaxform_submit') }}" method="POST" id="ajaxxform" >
                      @csrf
                      <div class="form-group">
                        <label for="name">Names</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" >
                        <span class="text-danger name_error" id="named_error"> </span>
                      </div>
              
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email">
                      <span class="text-danger email_error" id="emailc_error"> </span>
                      <span id="emnail_error"></span>

                      <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                      </div>
                    </div>
              
                    <div class="form-group">
                      <label for="amount" class="control-label">Amount</label>
                      <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid': '' }}"  name="amount">
                      <span class="text-danger amount_error" id="amounvt_error"> </span>

                      <span class="text-danger error-text amount_err"></span>
                      <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                      </div>
                    </div>
              
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block ajaxSubmit">
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

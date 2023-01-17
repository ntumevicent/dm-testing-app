@extends('layouts.admin-master')

@section('title')
PayBills
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>
    
  <div class="section-body">
    <div class="card">
        <div class="card-body">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">TxnID</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Bill Details</th>
              </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
              <tr>
                <th scope="row">1</th>
                <td>{{ $transaction->sctrxn_id }}</td>
                <td>{{ $transaction->user_phone_number }}</td>
                <td>{{ $transaction->bill_details }}</td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
  </div>
</section>
@endsection

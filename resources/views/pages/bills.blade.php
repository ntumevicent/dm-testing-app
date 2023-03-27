@extends('layouts.admin-master')

@section('title')
PayBills
@endsection

@section('content')
<section class="section">
  <div class="section-body">
  <div class="card-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md">
                <tr>
                  <th>#</th>
                  <th>Bill Name</th>
                  <th>Payee Code</th>
                  <th>Bill Status</th>
                </tr>
                @php $i = 0; @endphp
                @foreach ($bills as $bill)
                @php $i++; @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$bill->bill_name}}</td>
                    <td>{{$bill->payee_code}}</td>

                    <td>
                      
                    @if ($bill->bill_status == 1)
                    <label class="custom-switch">
                        <input type="checkbox" name="bill_status" onChange="billStatus(this)" value="0" data-id="{{$bill->id}}" class="custom-switch-input" checked>
                        <span class="custom-switch-indicator"></span>
                      </label>
                    @else
                      <label class="custom-switch">
                        <input type="checkbox" name="bill_status" onChange="billStatus(this)" value="1" data-id="{{$bill->id}}" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                      </label>
                    @endif
                    
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
                    
</div>
  </div>
</section>
@endsection

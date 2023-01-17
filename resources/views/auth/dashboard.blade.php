@extends('layouts.admin-master')

@section('title')
User Dashboard
@endsection

@section('content')
<section class="section">
    <h2>{{ $pageTitle }} for {{auth()->user()->name}}</h2>
    <div class="float-right">
      <a href="{{route('user.logout')}}" class="btn btn-sm btn-primary">
        Logout
      </a>
    </div>


  <div class="section-body">
  <div class="row mt-4">
              <div class="col-12 col-md-6 col-lg-6">
                
                <div class="card">
                    <div class="card-body">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" id="myInputref"  value="{{url('/')}}/register/{{auth()->user()->referral_token}}">
                            <div class="input-group-append">
                                <button class="btn btn-secondary myrefButtonFunction" type="button" onclick="myrefButtonFunction()"><i class="fas fa-copy"></i></button>
                            </div>
                          </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection

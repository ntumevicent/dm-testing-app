<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Stisla Laravel') &mdash; {{ env('APP_NAME') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  <script>
    window.simplexAsyncFunction = function () {
        Simplex.init({public_key: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXJ0bmVyIjoiZGlnaXRhbG1vbmV5YXBpIiwiaXAiOlsiMS4yLjMuNCJdLCJzYW5kYm94Ijp0cnVlfQ.E95secL3hQF9GnFzvjFSxDdhDFR0EXv069K1r_FdY_4' })
    };
  </script>
  <script src="https://cdn.test-simplexcc.com/sdk/v1/js/sdk.js" async></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}?{{ uniqid() }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    $(document).ready(function(){
      $('form input[type=text]').focus(function(){
        $(this).siblings(".invalid-feedback").hide();
        $(this).removeClass('is-invalid');
      });

      $("#ajaxxform").on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: $(this).attr("action"),
                method: 'POST',
                data: $("#ajaxxform").serialize(),
                dataType: 'json',
                beforeSend: function() {
                  $('.ajaxSubmit').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Submitting...');
                  $(this).find('.ajaxSubmit').prop('disabled', true);

                },
                
                success: function(response){ 
                  $(this).find('.ajaxSubmit').prop('disabled', false);
                  console.log(response);
                },
                error: function(response){ 
                  $(this).find('.ajaxSubmit').prop('disabled', false);
                  $('.ajaxSubmit').html('Submit Now');
                  $.each(response.responseJSON.errors, function(key, value) {
                    $('.'+key+'_error').text(value);
                  });
                }

                
            })

            function printErrorMsg (msg) {
                $.each( msg, function( key, value ) {
                    console.log(key);
                    $('.'+key+'_err').text(value);
                });
            }
        });

    });
  </script>

  

  @yield('scripts')
</body>
</html>

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
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">

  <style>
    
  </style>

<style>
  .whatsapp-ico{
    fill: white;
    width: 50px;
    height: 50px;
    padding: 3px;
    background-color: #4dc247;
    border-radius: 50%;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.4);
    /* box-shadow: 2px 2px 11px rgba(0,0,0,0.7); */
    position: fixed;
    bottom: 20px;
    right : 20px;
    z-index: 10;
}

.whatsapp-ico:hover{
    box-shadow: 2px 2px 11px rgba(0,0,0,0.7);
}
</style>



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

        <div id="whatsapp-buttonn">
          <a href="whatsapp://send?phone=0000000000"><svg viewBox="0 0 32 32" class="whatsapp-ico"><path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></svg></a>
      </div>
      
      </div>
    </div>
  </div>
<script>
  let mainurl = '{{ url('/') }}';
</script>
  <script src="{{ asset('js/app.js') }}?{{ uniqid() }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>
  <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    'use strict';

    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif
  
    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.error("{{ session('error') }}");
    @endif
  
    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.info("{{ session('info') }}");
    @endif
  
    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.warning("{{ session('warning') }}");
    @endif

    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('success') }}");
    @endif
</script>


<script>
  $('.delete-photo').click(function (e) {
    e.preventDefault();
    var photo_id = $(this).data('id');
    swal({
      title: 'Are you sure?',
      icon: 'warning',
      buttons: true,
      buttons: ["No, Cancel", "Yes, Delete"],
      dangerMode: true,
    }).then((result) => {
        if (result) {
            $.ajax({
                url: `${mainurl}/photo/delete/${photo_id}`,
                type: 'DELETE',
                dataType: 'JSON',
                data: {
                    "id": photo_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                  iziToast.success({
                    message: response.success,
                    position: 'topRight'
                  })
                  .then((result) => {
                     location.reload();
                  });
                }/*,
                error: function (response) {
                    swal(
                        'Error!',
                        'An error occurred while deleting the data.',
                        'error'
                    );
                }*/
            });
        }
    });
});

</script>

<script>
  'use strict';
  
  $('input[type="radio"]').on('click',function(){
    var id = $(this).val();
    let mainurl = '{{ url('/') }}';
    let url = `${mainurl}/tabs/${id}`;
    
    $.get(url, function(response){
      $("#result").html(response);
    });
  })
</script>

  <script>			
    function billStatus(radio) {
       var  bill_id = radio.getAttribute('data-id');
       var bill_status = radio.value;

       $.ajax({
        type: 'POST',
        url: '{{ route('bill.status') }}',
        dataType: 'JSON',
        data: {
          "bill_id": bill_id,
          "bill_status": bill_status,
          "_token": "{{ csrf_token() }}",
        },
        success: function(response) {
            iziToast.success({
              message: response.success,
              position: 'topRight'
            });
            window.location.reload();
        },
        error: function(response) {
            console.log('Error updating radio status');
        }
    });
  }
	</script>

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



 


        $('.selectOption').change(function() {
          $('.radio-btnWrapper').show();
          showContents();
        });



    });
  </script>

 

  

  @yield('scripts')
</body>
</html>

<script>
    jQuery( document ).ready(function() {
        // event for click on input (also you can use click)
        //better to change form to .yourFormClass
        $('form input[type=text]').focus(function(){
        // get selected input error container
          $(this).siblings(".invalid-feedback").hide();
          $(this).removeClass('is-invalid');
        });
    });
    </script>
    <script>
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
      @if(Session::has('message'))
      swal('Invalid Meter Number', 'Try Again', 'error');
      @endif
      </script>
    
    <script>
      
      (function($) {
         "use strict";
         $(document).ready(function () {
             $(document).on('click', '.myrefButtonFunction', function() {
                 var copyText = document.getElementById("myInputref");
                 copyText.select();
                 copyText.setSelectionRange(0, 99999);
             })
         });
      })(jQuery);
     </script>
    
    <script type="text/javascript">
      $(document).ready(function() {
          $(".btn-submit").click(function(e){
              e.preventDefault();
    
              var _token = $("input[name='_token']").val();
              var email = $("#email").val();
              var password = $("#password").val();
              var address = $("#address").val();
    
              $.ajax({
                  url: "{{ route('ajax.request.store') }}",
                  type:'POST',
                  data: {_token:_token, email:email, password:password,address:address},
                  success: function(msg) {
                    if($.isEmptyObject(msg.error)){
                        console.log(msg.success);
                        $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
                    }else{
                      $.each( msg.error, function( key, value ) {
                        $('.'+key+'_err').text(value);
                      });
                    }
                  }
              });
          }); 
    
          function printddMsg (msg) {
            if($.isEmptyObject(msg.error)){
                console.log(msg.success);
                $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
            }else{
              $.each( msg.error, function( key, value ) {
                $('.'+key+'_err').text(value);
              });
            }
          }
      });
    </script>
    
    
    <script>
      $(document).ready(function(){
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        /*$('.submitform').on('submit', function(e) {
        $(this).find('.submitbtn').prop('disabled', true)
        $(this).find('.submitbtn').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>')
    });
    
    $('.form').on('submit', function() {
        $('.submitbtn').text('Please wait...');
        $('.submitbtn').prop('disabled', true);
    });*/
    
          $('#ajaxSubmit').click(function(e){
            e.preventDefault();
              $.ajax({
               url: $(this).attr("action"),
               method: 'post',
               data: $("#ajax-form").serialize(),
               dataType: 'json',
               beforeSend: function() {
                $('#ajaxSubmit').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
                $('#ajaxSubmit').attr('disabled','');
              },
              success: function(response){
                  //alert(JSON.stringify(response.errors));
                   //$(this).find('.ajaxSubmit').prop('disabled', true);
                   $('.ajaxSubmit').attr('disabled', 'disabled');
    
                 
              },
                    error:function (response){
                  $('#name').html(response.errors.name[0]);
                
    
                        //$.each(response.responseJSON.errors,function(fielrd_name,error){
                         //   $(document).find('[name='+field_name+']').after('<span class="text-strong textdanger">' +error+ '</span>')
                       // })
                    }
              });
          });
    
              
      });
    </script>
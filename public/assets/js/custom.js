(function ($) {
 "use strict";

        $("#ajaxxform").on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var basicbtnhtml=$('.basicbtn').html();
            $.ajax({
                type: 'POST',
                url: $(this).attr("action"),
                data: $("#ajaxxform").serialize(),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                    
                    $('#ajaxSubmit').html('<div class="spinner-border text-light spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div> Please Wait....');
                    $('#ajaxSubmit').attr('disabled','');
    
                },
                
                success: function(response){ 
                    $('#ajaxSubmit').removeAttr('disabled')
                    Sweet('success',response);
                    $('#ajaxSubmit').html(basicbtnhtml);
                    //$('.basicform_with_reset').trigger('reset');
                },
                error: function(xhr, status, error) 
                {
                    $('#ajaxSubmit').html(basicbtnhtml);
                    $('#ajaxSubmit').removeAttr('disabled')
                   // $('#ajaxSubmit').show();
                    $.each(xhr.responseJSON.errors, function (key, item) 
                    {
                       // Sweet('error',item)
                        //$("#errors").html("<li class='text-danger'>"+item+"</li>")
                        console.log(item);
                    });
                    errosresponse(xhr, status, error);
                }
            })
        });


})(jQuery);	
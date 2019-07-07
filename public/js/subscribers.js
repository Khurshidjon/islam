$(function () {
    $('.subscribers-form').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url = $(this).attr('action');
        var subscribers = $(this).find('input[type="email"]').val();

        $.ajax({
           url: url,
           type:'POST',
           data: {
               subscribers:subscribers,
           },
           success:function (data) {
               if (data == 'ok'){
                   toastr.success('Thank you for your subscribe');
                   $('.subscribers').val('');
               }else if(data == 'error'){
                   toastr.error('You have any errors');
               }else if (data == 'exist'){
                   toastr.warning('This email has already subscribed');
               }
           }
        });
    });

});

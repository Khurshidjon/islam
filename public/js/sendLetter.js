$(function () {
    $('.comment-form').on('submit', function (e) {
        e.preventDefault();
        var firstname = $(this).find('.firstname');
        var lastname = $(this).find('.lastname');
        var email = $(this).find('.email');
        var message = $(this).find('.message');
        var url = $(this).attr('action');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
        });
        obj = {
            'Firstname':firstname,
            'Lastname':lastname,
            'Email': email,
            'Message': message,
        };
        $.each(obj, function (index, value) {
            if (value.val() == ''){
                value.css({'border':'1px solid red'});
                value.prev().find('.input-group-text').css({'border':'1px solid red'});
                value.on('focus', function () {
                    value.css({'border':'1px solid #ff8000'});
                });
                value.on('focusout', function () {
                    value.css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
                    value.prev().find('.input-group-text').css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
                });

                // console.log(value);
                toastr.error(index + ' is required');
            }else{
                value.css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
                value.prev().find('.input-group-text').css({'border':'1px solid rgba(0, 0, 0, 0.1)'});
            }
        });
        if (firstname.val() != '' && lastname.val() != '' && email.val() != '' && message.val() != '') {
            $.ajax({
                url:url,
                dataType:'text',
                type:'post',
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData(this),
                success:function (data) {
                    json = JSON.parse(data);
                    if (json.alert_type == 'danger'){
                        toastr.error(json.message);
                    }else{
                        toastr.success(json.message);
                        $('input').val('');
                        $('textarea').val('');
                    }
                }
            });
        }
    });
});

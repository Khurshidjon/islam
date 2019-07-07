$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#post1').on('change', function (e) {
        e.preventDefault();
        var val = $(this).val();
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type:'POST',
            data:{
                val:val
            },
            success:function (data) {
                if (data == 'ok'){
                    toastr.success('Endi yangliklar siz tanlagan kategoriya bo\'yicha chiqadi')
                    location.reload();
                }
            }
        })
    });
    $('#post2').on('change', function (e) {
        e.preventDefault();
        var val = $(this).val();
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type:'POST',
            data:{
                val:val
            },
            success:function (data) {
                if (data == 'ok'){
                    toastr.success('sizni tabrilaymiz siz 100 mln yutib oldingiz')
                    location.reload();

                }
            }
        })
    });
    $('#post3').on('change', function (e) {
        e.preventDefault();
        var val = $(this).val();
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type:'POST',
            data:{
                val:val
            },
            success:function (data) {
                if (data == 'ok'){
                    toastr.success('sizni tabrilaymiz siz 100 mln yutib oldingiz')
                    location.reload();

                }
            }
        })
    });
});

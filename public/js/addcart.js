$(document).ready(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $(".cart").click(function(){
        let id = $(this).attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: "/cart",
            method: 'POST',
            data: {'watch_id': id},
            success: function (data) {
                console.log(data);
                alert('Bạn đã thêm sản phẩm vào giỏ hàng');
            },
            error: function (xhr, status, error) { 
                if(error == 'Unauthorized') {
                    window.location = '/login';
                }
            }
        })
    });
  });
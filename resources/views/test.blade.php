<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Ajax Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form action="/api/get/provinces" method="post">
        @csrf 
        <button>Click here</button>
    </form>  
    <select id="dynamicSelect" style="width:150px"></select>
    <select id="dynamicSelectDistrict" style="width:150px"></select> 
    <select id="dynamicSelectWards" style="width:150px"></select> 
   


    <script>
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                url: "/brand/getall",
                type: "GET",
                success: function (data) {
                    console.log(data);
                }
            })
            $('#dynamicSelect').click(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/api/get/provinces', // Thay thế bằng URL của bạn
                    success: function (data, textStatus, xhr) {
                        var select = document.getElementById('dynamicSelect'); // Hiển thị phản hồi trong phần tử HTML có id là 'result'
                        data.forEach(function(item) {
                            var option = document.createElement('option');
                            option.value = item.gso_id;
                            option.text = item.name;
                            select.appendChild(option);
                        });
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr);
                    }
                });
            });
            // call api district
            $('#dynamicSelect').click(function () {
            var provinceId = $(this).val(); // Lấy ID của tỉnh/thành phố được chọn
            console.log(provinceId);
            $.ajax({
                type: 'post',
                url: '/api/get/districts', // Thay thế bằng URL của bạn
                data: {
                    'province_id': provinceId // Truyền ID tỉnh/thành phố cho API
                },
                success: function (data, textStatus, xhr) {
                    var select = document.getElementById('dynamicSelectDistrict');
                    select.innerHTML = ''; // Xóa tất cả các lựa chọn trước đó
                    data.forEach(function(item) {
                        var option = document.createElement('option');
                        option.value = item.id;
                        option.text = item.name;
                        select.appendChild(option);
                    });
                },
                error: function (xhr) {
                    console.error('Error:', xhr);
                }
            });
            //call api wards
            $('#dynamicSelectDistrict').click(function () {

            var districtId = $(this).val(); // Lấy ID của tỉnh/thành phố được chọn
            $.ajax({
                type: 'post',
                url: '/api/get/wards', // Thay thế bằng URL của bạn
                data: {
                    'district_id': districtId // Truyền ID tỉnh/thành phố cho API
                },
                success: function (data, textStatus, xhr) {
                    var select = document.getElementById('dynamicSelectWards');
                    select.innerHTML = ''; // Xóa tất cả các lựa chọn trước đó
                    data.forEach(function(item) {
                        var option = document.createElement('option');
                        option.value = item.id;
                        option.text = item.name;
                        select.appendChild(option);
                    });
                },
                error: function (xhr) {
                    console.error('Error:', xhr);
                }
            });
            // call api address
            $('#dynamicSelectDistrict').click(function () {
            var districtId = $(this).val(); // Lấy ID của tỉnh/thành phố được chọn
            $.ajax({
                type: 'post',
                url: '/api/get/wards', // Thay thế bằng URL của bạn
                data: {
                    'district_id': districtId // Truyền ID tỉnh/thành phố cho API
                },
                success: function (data, textStatus, xhr) {
                    var select = document.getElementById('dynamicSelectWards');
                    select.innerHTML = ''; // Xóa tất cả các lựa chọn trước đó
                    data.forEach(function(item) {
                        var option = document.createElement('option');
                        option.value = item.id;
                        option.text = item.name;
                        select.appendChild(option);
                    });
                },
                error: function (xhr) {
                    console.error('Error:', xhr);
                }
                });
            });
        });
    });
});

</script>
</body>
</html>
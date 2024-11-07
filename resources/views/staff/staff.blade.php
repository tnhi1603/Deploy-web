<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Staff</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Logo_UIT_updated.svg/1200px-Logo_UIT_updated.svg.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/staff.css')}}">
    <link rel="stylesheet" href="{{asset('icon/fontawesome-free-6.4.2-web/css/all.css')}}">
</head>
<body>
    <div class="cartier">
         <!-- header start -->
        <div class="header">
            <div class="header-left-wrap">
                <div class="logo-merchant">
                    <img class="logo-img" src="{{asset('/img/Screenshot_2023-10-16_121457-removebg.png')}}" alt="">
                    <div class="logo-content">FOR STAFF</div>
                </div>
                <button class="icon-bars">
                    <img class="bars-img" src="{{asset('/img/bars.png')}}" alt="">
                </button>
            </div>
            
            <div class="header-right-wrap">
               <p class="email-contact">
                    <i class="fa fa-phone"></i>
                    <span class="name">Email for assistance : 
                        <strong>theuitersmerchant@gmail.com</strong>
                    </span>
                    <span class="name">Staff's name: 
                        <strong>{{auth()->user()->name}}</strong>
                    </span>
               </p>
            </div>
        </div>
        <!-- header end -->

        <div class="main-content">
            <div class="main-left">
                <div class="selection">
                    <div class="select-click active">Trang chủ</div>
                    <div class="select-click">Quản lí đơn hàng</div>
                    <div class="select-click">Quản lí sản phẩm</div>
                    <div class="select-click">Chương trình khuyến mãi</div>
                    <div class="select-click">Chăm sóc khách hàng</div>
                </div>
            </div>

            <div class="main-right">
                <div class="overlay"></div>
                <!--Trang chủ-->
                <div class="select-container active">
                    <div content-todo>
                        <h2>Danh sách cần làm</h2>
                        <p class="content-text">Những việc bạn sẽ phải làm.</p>
                        <div class="grid-container">
                            <div class="grid-item-count add-modal">
                                0
                                <div class="grid-item-text">Chờ xác nhận</div>
                            </div>
                            <div class="grid-item-count add-modal">
                                {{ count($pOrders) }}
                                <div class="grid-item-text">Chờ lấy hàng</div>
                            </div>
                            <div class="grid-item-count add-modal" >{{ count($sOrders) + count($successOrders) }}
                                <div class="grid-item-text">Đã xử lí</div>
                            </div>
                            <div class="grid-item-count add-modal">0
                                <div class="grid-item-text">Đơn hủy</div>
                            </div>
                            <div class="grid-item-count add-modal" >0
                                <div class="grid-item-text">Trả hàng/Hoàn tiền chờ xử lý</div>
                            </div>
                            <div class="grid-item-count add-modal"> {{ count($trashed) }}
                                <div class="grid-item-text">Sản phẩm bị tạm khóa</div>
                            </div>
                            <div class="grid-item-count add-modal" >0
                                <div class="grid-item-text">Khiếu nại</div>
                            </div>
                            <div class="grid-item-count add-modal" >{{count($activeVoucher)}}
                                <div class="grid-item-text">Chương trình khuyến mãi chờ xử lí</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quản lí đơn hàng -->
                <div class="select-container">
                    <div class="content">
                        <div class="menu">
                            <button id="Tat ca">Tất cả</button>
                            <button id="Cho xac nhan">Chờ xác nhận</button>
                            <button>Chờ đóng gói</button>
                            <button>Chờ lấy hàng</button>
                            <button>Đã giao cho đơn vị vận chuyển</button>
                            <button>Hết hàng</button>
                            <button>Đơn Hủy</button>
                        </div>
                        <div class="search-container">
                            <input type="text" class="search-bar" placeholder="Nhập id đơn hàng">
                        </div>
                        @php 
                            $orders = $pOrders->merge($sOrders)->merge($successOrders);
                        @endphp
                        
                        <div class="table-field">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Mã Đơn hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Cập nhật</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <p class="oID">HD{{$order->id}}</p>
                                        </td>
                                        <td>
                                            <p>{{$order->total_prices}}</p>
                                        </td>
                                        <td class="status">
                                            @if ($order->status == 'Pending') 
                                            Chờ xác nhận
                                            @elseif ($order->status == 'Shipping')
                                            Đang giao hàng
                                            @elseif ($order->status == 'Success')
                                            Thành công
                                            @endif
                                        </td>
                                        <td>
                                            <p>{{ $order->created_at }}</p>
                                            <p>Đã thanh toán</p>
                                        </td>
                                        <td>
                                            <p> {{$order->user->name}}</p>
                                        </td>
                                        <td>
                                            <p>
                                                {{$order->address->phone_number}}
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $order->address->address . ', '. $order->address->ward . ", " . $order->address->district . ", " . $order->address->province }}</p>
                                        </td>
                                        <td>
                                            @if ($order->status == 'Pending')
                                            <button name="update" class="update">
                                                Đã gửi hàng
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <button data-id='{{$order->id}}' class="viewdetail" onclick='openSub(this)'>Xem</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="9">
                                            <div id="sub-processed-modal-{{$order->id}}" class="sub-modal">
                                                <div class="modal-content">
                                                    <table class="sub-modal-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Mã sản phẩm</th>
                                                                <th>Hình Ảnh</th>
                                                                <th>Tên SP</th>
                                                                <th>Số lượng</th>
                                                                <th>Tổng tiền</th>
                                                                <th>Giảm giá</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($order->watches as $watch)
                                                            <tr>
                                                                <td class="smaller">{{$watch->id}}</td>
                                                                <td class="img-tag"><img class="img-sp" src="{{ $watch->img1 }}" alt=""></td>
                                                                <td>{{$watch->name}}</td>
                                                                <td class="smaller">{{$watch->pivot->quantity}}</td>
                                                                <td>{{$watch->pivot->price * $watch->pivot->quantity}}</td>
                                                                <td class="smaller">0</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <button data-id='{{$order->id}}' class="close-sub-modal" onclick='hideSub(this)'>Trở lại</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        
</div>

                     
                    </div>
                    
                </div>

                <!-- Quản lí sản phẩm -->
                <div class="select-container">
                    <div class="content">
                        <div class="menu">
                            <button id="Tat ca">All</button>
                            <button id="Cho xac nhan">Active</button>
                            <button>Sold Out</button>
                        </div>
                        <div class="search-container">
                            <input type="text" class="search-bar" placeholder="Enter product ID">
                            <div class="search-icon">&#128269;</div>
                        </div>
                        <div class="table-field">
                            <table>
                                <!-- <tbody>
                                    <tr>
                                        <td width="350px">Sản Phẩm</td>
                                        <td></td>
                                        <td width="140px">Tổng tiền</td>
                                        <td width="120px">Trạng thái</td>
                                        <td width="130px">Ngày đặt hàng</td>
                                        <td width="180px">Mã đơn hàng</td>
                                        <td width="120">Cập nhập</td>
                                    </tr>
                                </tbody>
                            </table> -->
            
                                <table>
                                    <tr>
                                        <th>Sản Phẩm</td>
                                        <th></th>
                                        <th></th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Cập nhập</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{asset('/img/h2.webp')}}" alt="" width="95px">
                                        </td>
                                        <td>
                                            <p>TANK LOUIS CARTIER WATCH </p>
                                        </td>
                                        <td>
                                            x1
                                        </td>
                                        <td>
                                            <p>$10,200.00 </p>
                                            <p>Đã thanh toán </p>
                                        </td>
                                        <td>
                                            <p>Đang giao cho đơn vị vận chuyển</p>
                                        </td>
                                        <td>
                                            <p>
                                                1/10/2023
                                            </p>
                                        </td>
                                        <td>
                                            <p>123456789</p>
                                        </td>
                                        <td>
                                            <select name="update" id="update">
                                                <option value="Het hang">Hết hàng</option>
                                                <option value="Xac nhan">Xác nhận</option>
                                                <option value="Dong Goi">Đã đóng gói</option>
                                                <option value="Da giao">Đã giao</option>
                                                <option value="Huy don">Hủy đơn</option>
                                            </select>
                                        </td>
                                    </tr>
            
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>

                <!-- Chương trình khuyến mãi -->
                <div class="select-container">
                    <div class="content">
                        <div class="creatediscount">
                            <form>
                                <h2>THÔNG TIN KHUYẾN MÃI</h2>
                                <label for="namediscount">Tên chương trình:</label>
                                <input type="text" id="namediscount" name="namediscount">
                                <br>
                                <label for="percent">Phần trăm giảm giá:</label>
                                <input type="text" id="percent" name="percent">
                                <br>
                                <label for="startprice">Áp dụng cho sản phẩm từ:</label>
                                <input type="number" id="startprice" name="startprice">
                                <label for="endtprice">Đến</label>
                                <input type="number" id="endprice" name="endprice">
                                <br>
                                <label for="startDateTime">Ngày bắt đầu:</label>
            
                                <input type="datetime-local" id="startDateTime" name="startDateTime" required>
            
                                <label for="endDateTime">Ngày kết thúc:</label>
                                <input type="datetime-local" id="endDateTime" name="endDateTime" required>
                                <br>
                            </form>
                            <button class="Save-bt">Save</button>
                        </div>
                        <div class="detaildiscount">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tên chương trình khuyến mãi</th>
                                        <th>Áp dung cho sản phẩm từ</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Phầm trăm giảm</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Chương trình A</td>
                                        <td>100000-2000000000
                                        </td>
                                        <td>2023-12-31</td>
                                        <td>10</td>
                                        <td class="action-buttons">
                                            <button class="delete-btn">Xóa</button>
                                            <button class="edit-btn">Sửa</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Chăm sóc khách hàng -->
                <div class="select-container">
                    <div class="chat-assist">
                        <h3 class="chat-assist_header">Chat Assistant</h3>

                        <div class="chat-assist_choices">
                            <button class="chat-assist_auto">Automation Chat</button> 
                            <button class="chat-assist_quick">Quick Chat</button>
                        </div>

                        <div class="chat-assist_auto-content">

                            <div class="auto-content_standard">
                                <h4 class="standard_header">Standard automation chat</h4>
                                <h6 class="standard_subheader">Sau khi kích hoạt, tin nhắn sẽ được tự động gửi đến Người mua khi họ bắt đầu chat với bạn.</h6>
                                <label for="auto_mess">Automation message</label>
                                <form action="" name="auto_mess" id="standard_automess">
                                    <input type="text" name="" id="standard_automess-ip"> <br>
                                    <input type="button" value="Save" id="standard_automess-btn">
                                </form>
                            </div>

                            <br>
                            <hr>

                            <div class="auto-content_off">
                                <h4 class="off_header">Offline automation chat</h4>
                                <h6 class="off_subheader">Sau khi kích hoạt, tin nhắn sẽ được tự động gửi đến Người mua khi họ bắt đầu chat với bạn.</h6>
                                <label for="off_mess">Automation message</label>
                                <form action="" name="off_mess" id="standard_automess">
                                    <input type="text" name="" id="standard_automess-ip"> <br>
                                    <!-- Giờ làm việc của từng ngày trong tuần, ngoài những giờ này, tin nhắn tự động sẽ được kích hoạt -->
                                    <div class="work-day">
                                        <input type="button" value="M" id="word-day_btn" class="js-work-day">
                                        <input type="button" value="T" id="word-day_btn" class="js-work-day">
                                        <input type="button" value="W" id="word-day_btn" class="js-work-day">
                                        <input type="button" value="T" id="word-day_btn" class="js-work-day">
                                        <input type="button" value="F" id="word-day_btn" class="js-work-day">
                                        <input type="button" value="S" id="word-day_btn" class="js-work-day">
                                        <input type="button" value="S" id="word-day_btn" class="js-work-day">
                                    </div>

                                    <div class="work-times">
                                        <div class="work-time monday">
                                            <label for="monday1">Monday</label>
                                            <input type="time" name="monday1" id="monday">
                                            <label for="monday2">To</label>
                                            <input type="time" name="monday1" id="monday">
                                        </div>

                                        <div class="work-time tue">
                                            <label for="monday1">Tuesday</label>
                                            <input type="time" name="monday1" id="monday">
                                            <label for="monday2">To</label>
                                            <input type="time" name="monday1" id="monday">
                                        </div>

                                        <div class="work-time web">
                                            <label for="monday1">Webnesday</label>
                                            <input type="time" name="monday1" id="monday">
                                            <label for="monday2">To</label>
                                            <input type="time" name="monday1" id="monday">
                                        </div>

                                        <div class="work-time thur">
                                            <label for="monday1">Thursday</label>
                                            <input type="time" name="monday1" id="monday">
                                            <label for="monday2">To</label>
                                            <input type="time" name="monday1" id="monday">
                                        </div>

                                        <div class="work-time fri">
                                            <label for="monday1">Friday</label>
                                            <input type="time" name="monday1" id="monday">
                                            <label for="monday2">To</label>
                                            <input type="time" name="monday1" id="monday">
                                        </div>

                                        <div class="work-time sat">
                                            <label for="monday1">Saturday</label>
                                            <input type="time" name="monday1" id="monday">
                                            <label for="monday2">To</label>
                                            <input type="time" name="monday1" id="monday">
                                        </div>

                                        <div class="work-time sun">
                                            <label for="monday1">Sunday</label>
                                            <input type="time" name="monday1" id="monday">
                                            <label for="monday2">To</label>
                                            <input type="time" name="monday1" id="monday">
                                        </div>

                                    </div>

                                    <input type="button" value="Save" id="standard_automess-btn">
                                </form>
                            </div>
                        </div>

                        <div class="chat-assist_quick-content">
                            <div class="quick_head">
                                <h3 class="quick_header">Your quick chat</h3>
                                <button class="quick-head-btn"><i class="fa-solid fa-plus"></i>Quick Chat</button>
                            </div>

                            <h5 class="quick_subheader">Tin nhắn nhanh cho phép bạn tạo và sử dụng các mẫu tin nhắn mà bạn thường xuyên gửi cho Người mua.</h5>

                            <div class="quick_chat-group">
                                <div class="quick_chat-group_head">
                                    <div class="chat-group_head-left">
                                        <button><i class="fa-solid fa-chevron-down"></i></button>
                                        <h4>Group 1</h4>
                                    </div>

                                    <div class="chat-group_head-right">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>

                                        <i class="fa-solid fa-pen fix-btn"></i>

                                        <i class="fa-solid fa-trash"></i>

                                    </div>
                                </div>

                                <div class="quick_chat-group_cnts">
                                    <p class="chat-group_cnt">Thank you!</p><hr>
                                    <p class="chat-group_cnt">Thank you!</p><hr>
                                    <p class="chat-group_cnt">Thank you!</p><hr>
                                    <p class="chat-group_cnt">Thank you!</p><hr>
                                    <p class="chat-group_cnt">Thank you!</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="chat-dashboard">
                        <h3 class="chat-dashboard_header">Chat Overview</h3>

                        <div class="chat-dashboard_choices">
                            <button class="chat-dashboard_auto">Overview</button> 
                            <button class="chat-dashboard_quick">Chat List</button>
                        </div>

                        <div class="chat-dashboard_overview">
                            <label for="choose-time">Choose Time: </label>
                            <input type="datetime-local" name="choose-time" id="overview_time">

                            <table border="1" align ="center" cellpadding = "20">
                                <tr>
                                    <td colspan="2">
                                        <h5>Hỏi - Đáp đã hiển thị</h5>
                                        <p>0</p>
                                        <p>so với hôm qua</p>
                                        <p>0%</p>
                                    </td>

                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <h5>Hỏi - Đáp đã hiển thị</h5>
                                        <p>0</p>
                                        <p>so với hôm qua</p>
                                        <p>0%</p>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <h5>Hỏi - Đáp đã hiển thị</h5>
                                        <p>0</p>
                                        <p>so với hôm qua</p>
                                        <p>0%</p>
                                    </td>

                                    <td>
                                        <h5>Hỏi - Đáp đã hiển thị</h5>
                                        <p>0</p>
                                        <p>so với hôm qua</p>
                                        <p>0%</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5>Hỏi - Đáp đã hiển thị</h5>
                                        <p>0</p>
                                        <p>so với hôm qua</p>
                                        <p>0%</p>
                                    </td>

                                    <td>
                                        <h5>Hỏi - Đáp đã hiển thị</h5>
                                        <p>0</p>
                                        <p>so với hôm qua</p>
                                        <p>0%</p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="chat-dashboard_list">
                            <table border="1" align = "center">
                                <th>
                                    <td>Phần FAQ</td>
                                    <td>Tên nhóm FAQ</td>
                                    <td>Câu Hỏi - Đáp</td>
                                    <td>Hỏi - Đáp đã được nhấn</td>
                                    <td>CTR</td>
                                    <td>Câu hỏi đã được giải quyết</td>
                                    <td>Tỉ lệ giải quyết</td>
                                    <td>Đánh giá hữu ích</td>
                                    <td>Tỉ lệ hữu ích</td>
                                </th>

                                <tr>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- Modal  -->
<!-- cho xac nhan -->

<div id="confirm-modal" class="modal">
    <h3 class="modal-heading">Chờ xác nhận</h3>
    <table class="modal-table">
        <thead>
            <tr >

                <th>Mã đơn hàng</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Giảm giá</th>
                <th>Ngày đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>SĐT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MDH01</td>
                <td>2</td>
                <td>100000</td>
                <td>10%</td>
                <td>10-12-2023</td>
                <td>Nguyễn Dương Tùng</td>
                <td>012348374</td>
            </tr>
        </tbody>
    </table>
   <button class="close-modal">close</button>
</div>


<!-- Chờ lấy hàng -->

<div id="pickup-modal" class="modal">
    <h3 class="modal-heading">Chờ lấy hàng</h3>
    <table class="modal-table">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
            </tr>
        </thead>
        
        <tbody>
        @foreach ($pOrders as $porder)
            <tr>
                <td>HĐ{{$porder->id}}</td>
                <td>{{$porder->total_prices}}</td>
                <td>{{$porder->created_at}}</td>
                <td>{{$porder->user->name}}</td>
                <td>{{$porder->address->getAddress()}}</td>
                <td>{{$porder->address->getPhone()}}</td>
            </tr>
        @endforeach
        </tbody>
        
    </table>
    <button class="close-modal">close</button>

</div>

<!-- da xu ly -->
<div id="processed-modal" class="modal">
    <h3 class="modal-heading">Đã xử lý</h3>
    <table class="modal-table">
        <thead>
            <tr >
                <th>Mã đơn hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ đặt hàng</th>
                <th>SĐT</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($sOrders as $sorder)
            <tr>
                <td>HĐ{{$sorder->id}}</td>
                <td>{{$sorder->total_prices}}</td>
                <td>{{$sorder->created_at}}</td>
                <td>{{$sorder->user->name}}</td>
                <td>{{$sorder->address->getAddress()}}</td>
                <td>{{$sorder->address->getPhone()}}</td>
            </tr>
        @endforeach
          
        </tbody>
    </table>
    <button class="close-modal">close</button>

</div>

<!-- don huy -->
<div id="cancel-modal" class="modal">
    <h3 class="modal-heading">Đơn hủy</h3>
    <table class="modal-table">
        <thead>
            <tr >
                <th>Mã đơn hàng</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Giảm giá</th>
                <th>Ngày đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>SĐT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MDH01</td>
                <td>2</td>
                <td>100000</td>
                <td>10%</td>
                <td>10-12-2023</td>
                <td>Nguyễn Dương Tùng</td>
                <td>012348374</td>
            </tr>
           
        </tbody>
    </table>
    <button class="close-modal">close</button>
</div>

<!-- hoan tra -->
<div id="return-modal" class="modal">
    <h3 class="modal-heading">Đơn trả hàng/Hoàn tiền chờ xử lý </h3>
    <table class="modal-table">
        <thead>
            <tr >
                
                <th>Mã đơn hàng</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Giảm giá</th>
                <th>Ngày đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>SĐT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MDH01</td>
                <td>2</td>
                <td>100000</td>
                <td>10%</td>
                <td>10-12-2023</td>
                <td>Nguyễn Dương Tùng</td>
                <td>012348374</td>
            </tr>
        </tbody>
    </table>
    <button class="close-modal">close</button>
</div>

<!-- tạm khóa  -->
<div id="locked-modal" class="modal">
    <h3 class="modal-heading">Sản phẩm bị tạm khóa </h3>
    <table class="modal-table">
        <thead>
            <tr >
                <th>Mã sản phẩm</th>
                <th>Hình Ảnh</th>
                <th>Tên SP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trashed as $trash)
            <tr>
                <td class="smaller">{{$trash->id}}</td>
                <td class="img-tag">
                    <img class="img-sp" src="{{ $trash->img1 }}" alt="">
                </td>
                <td>{{ $trash->name }}</td>
              
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="close-modal">close</button>
</div>

<!-- Khiếu nại  -->
<div id="complain-modal" class="modal">
    <h3 class="modal-heading">Khiếu nại</h3>
    <table class="modal-table">
        <thead>
            <tr>
                <th>Mã khiếu nại</th>
                <th>Tên khách hàng</th>
                <th>Loại khiếu nại</th>
                <th>Nội dung</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MKN01</td>
                <td>Nguyễn Dương Tùng</td>
                <td>Giao Hàng</td>
                <td>Giao hàng 1 tuần mới nhận hàng là sao mấy ní ?</td>

            </tr>
        </tbody>
    </table>
    <button class="close-modal">close</button>
</div>
<!--  Chương trình khuyến mãi chờ xử lí -->
<div id="discount-modal" class="modal">
    <h3 class="modal-heading">Chương trình khuyến mãi chờ xử lí</h3>
    <table class="modal-table">
        <thead>
            <tr >
                <th>Mã giảm giá</th>
                <th>Gía trị</th>
                <th>Số lượng</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Yêu cầu</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($activeVoucher as $aV)
            <tr>
                <td>{{$aV->code}}</td>
                <td>{{$aV->discount}}</td>
                <td>{{$aV->quantity}}</td>
                <td>{{$aV->start_date}}</td>
                <td>{{$aV->start_date}}</td>
                <td>{{$aV->minimum}}</td>
            </tr>
            @endforeach
            @foreach ($awaitVoucher as $aV)
            <tr>
                <td>{{$aV->code}}</td>
                <td>{{$aV->discount}}</td>
                <td>{{$aV->quantity}}</td>
                <td>{{$aV->start_date}}</td>
                <td>{{$aV->start_date}}</td>
                <td>{{$aV->minimum}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="close-modal">close</button>
</div>



<div class="quick-modal">
    <div class="quick-modal_container">
        <div class="quick-modal_header">
            <h3>QUICK CHAT</h3>
            <i class="fa-solid fa-xmark modal_close"></i>
        </div>
    
        <div class="quick-modal_body">
            <form action="" class="body_form">
                <label for="group-name">Group name</label>
                <input type="text" name="group-name" id="body_form-group">
                <div class="body_form-chatcnt">
                    <div class="chatcnt">
                        <div class="chatcnt_number"><p>1</p></div>
                        <input type="text" id="chatcnt_input">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>
            </form>
        </div>
    
        <button class="quick-modal_btn"><i class="fa-solid fa-plus"></i> Add New Chat</button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{asset('js/staff.js')}}"></script>
</html>
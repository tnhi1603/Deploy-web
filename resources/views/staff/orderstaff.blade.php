<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="/Resources/css/staffprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/icon/fontawesome-free-6.4.2-web/css/regular.min.css">
</head>

<body>
    <div class="header">
        <div class="logo">
            <img class="logo-img" src="/Public/img/Screenshot_2023-10-16_121457-removebg.png" alt="">
            <div class="logo-content">FOR STAFF</div>
        </div>
    </div>
    <div class="body">
        <div class="side">
            <a href="#">Trang chủ</a>
            <a href="#">Quản lí đơn hàng</a>
            <a href="#">Quản lí sản phẩm</a>
            <a href="#">Chương trình khuyến mãi</a>
            <a href="#">Chăm sóc khách hàng</a>
        </div>
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
                <div class="search-icon">&#128269;</div>
            </div>
            <div class="table-field">
                <table>
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
                                <img src="/./public/img/h2.webp" alt="" width="95px">
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
                    <div>
                        <button class="Save-bt">Save</button>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>
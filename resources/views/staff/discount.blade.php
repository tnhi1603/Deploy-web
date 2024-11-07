<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="staffprofile.css">
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
            <div class="creatediscount">
                <form>
                    <h2>THÔNG TIN KHUYẾN MÃI</h2>
                    <label for="namediscount">Tên chương trình:</label>
                    <input type="text" id="namediscount" name="namediscount">
                    <br>
                    <label for="percent">Phần trăm giảm giá:</label>
                    <input type="text" id="percent" name="percent">
                    <br>
                    <label for="price">Áp dụng cho sản phẩm :</label>
                    <input type="number" id="price" name="price">
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
                            <th>Áp dụng cho sản phẩm có giá từ</th>
                            <th>Ngày kết thúc</th>
                            <th>Phầm trăm giảm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chương trình A</td>
                            <td>100000
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
                <div>
                    <button class="Save-bt">Save</button>
                </div>
            </div>
        </div>
    </div>
</body>
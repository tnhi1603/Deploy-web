<form action="/test/img" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name">
    <input type="number" name="price">
    <input type="number" name="storage">
    <input type="text" name="description">
    <input type="text" name="gender">
    <input type="number" name="brand_id">
    <input type="number" name="category_id">
    <input type="file" name="img1">
    <input type="file" name="img2">
    <input type="submit" value="clickk">
</form>


<!-- 
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
                                            <p>Đã thanh toán </p>
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
                                            <buttonn>
                                            @endif
                                        </td>
                                        <td>
                                            <button data-id='{{$order->id}}' class="viewdetailwatch">Xem</button>
                                        </td>
                                        <div id="sub-processed-modal-{{$order->id}}" class="sub-modal-w" style="display:none;">
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
                                                            <td class="img-tag">
                                                                <img class="img-sp" src="{{ $watch->img1 }}" alt="">
                                                            </td>
                                                            <td>{{$watch->name}}</td>
                                                            <td class="smaller">{{$watch->pivot->quantity}}</td>
                                                            <td>{{$watch->pivot->price * $watch->pivot->quantity}}</td>
                                                            <td class="smaller">0</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                </table>
                                                <button class="close-sub-modal">Trở lại</button>
                                            </div>
                                            </div>
                                    </tr>
            @endforeach 
    -->

<!-- <div id="sub-processed-modal-{{$order->id}}" class="sub-modal" style="display:none;">
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
            <button class="close-sub-modal">Trở lại</button>
        </div>
    </div> -->
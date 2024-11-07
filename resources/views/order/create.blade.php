<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <title>The UITERs</title>
    <link rel="stylesheet" href="{{ asset('/icon/fontawesome-free-6.4.2-web/css/regular.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/payment.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/home.css')}}">

</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-logo">
                <img src="{{ asset('/img/Screenshot_2023-10-16_121457-removebg.png')}}" alt="" style=" max-height: 50px;">
            </div>
        </div>

        <div class="content">
            <div class="ship">
                <div class="address_header"><h2>PROCEED WITH YOUR ORDER</h2></div>
                <div class="ship-address">

                    <div class="address_subheader"><h4>SHIPPING ADDRESS</h4></div>
    
                    <div class="address_change">
                        <label for="address-option">Phone Number</label><br>
                        @if (auth()->user()->defaultAddress)
                        <p type="text" name="phoneNumber">{{auth()->user()->defaultAddress->address->getPhone()}}</p>
                        @endif
                        <br>
                        <label for="address-option">Shipping To</label><br>
                        <select name="address-option" id="address-choose">
                            @if (auth()->user()->defaultAddress)
                            <option phone-number="{{auth()->user()->defaultAddress->address->getPhone()}}" value="{{auth()->user()->defaultAddress->address_id}}">{{auth()->user()->defaultAddress->address->getAddress()}}</option>
                            @foreach(auth()->user()->address as $address)
                            <option phone-number="{{$address->getPhone()}}" value="{{$address->id}}">{{$address->getAddress()}}</option>
                            @endforeach 
                            @endif
                        </select>
                        
                        <div class="address_change-opt">
                            <button class="address-btn js-address">Update Address</button>
                            <button class="address-btn js-address">Add New</button>
                        </div>
                    </div>
                </div>

                <div class="ship_info js-form">
                    <label for="ship_form" id="form-label">Required field *</label>
                    <form action="/address" name="address-info" id="ship_form" method="POST">
                        @csrf
                        <input type="text" value="" name="address" placeholder="Address *" id="information"> <br>
                        <select name="" id="ship_country">
                            <option value="">Viet Nam</option>
                        </select><br>
                        <select placeholder="Province *" id="province" name="province" style="width: 400px">
                        </select> <br>
                        <select placeholder="District *" id="district" name="district" style="width: 400px">
                        </select> <br>
                        <select name="ward" id="ward" placeholder="Ward *" style="width: 400px"></select> <br>
                        <input type="text" placeholder="Phone Number *" name="phone" id="information"> <br>
                        <input type="submit" value="Thêm">
                    </form>
                </div>

                <hr>

                <div class="ship_method">
                    <h4 class="ship_method-header">Payment method</h4>
                    <p>Choose Payment Method</p>
                    <form>
                        <input type="radio" name="pay-opt" id="method_type" value="COD">
                        <label for="ship-opt">COD</label> <br> <br>
                        <input type="radio" name="pay-opt" id="method_type" value="Momo">
                        <label for="ship-opt">Momo</label>
                    </form>
                </div>

                <hr>
            </div>

            <div class="pay">
                <div class="pay_header">
                    <h4>ORDER SUMMARY</h4>
                    <a href="" class="pay_header-btn">Modify</a>
                </div>
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($watches as $watch)
                <div class="pay_items">
                    <div class="pay_item">
                        <div class="pay_item-img"><img src="{{$watch->img1}}" alt="" width="180px"></div>

                        <div class="pay_item-cnt" id="{{$watch->id}}">
                            <h5 class="item-header">{{$watch->name}}</h5>
                            @php
                                $totalPrice += $watch->price;
                            @endphp
                            <p class="item-dsc">{{$watch->description}}</p>
                            <strong class="item-price">{{number_format($watch->price * (1 - $watch->discount), 0, ',', '.')}} đ</strong>
                            <p class="quantity">{{$watch->quantity}}</p>
                        </div>
                    </div>
                </div>
                @endforeach 

                <div class="pay_total">
                    <div class="subtotal">
                        <h5 class="subtotal-header">SUBTOTAL</h5>
                        <p class="subtotal-price">{{number_format($totalPrice, 0, ',', '.')}} đ</p>
                    </div>

                    <div class="delivery">
                        <h6 class="delivery-header">STANDARD DELIVERY</h6>
                        <p class="delivery-price"></p>
                    </div>

                    <hr>

                    <div class="tax">
                        <h6 class="tax-header">Sales tax</h6>
                        <p class="tax-price">$0.00</p>
                    </div>

                    <div class="total">
                        <h5 class="total-header">TOTAL</h5>
                        <p class="total-price"></p>
                    </div>
                </div>

                <button class="pay_btn js-proceed">PROCEED TO PAYMENT DETAILS</button>
            </div>
        </div>

        <hr>

        <div class="footer">
            <div class="policy">
                <h3 class="policy_header">COMPLIMENTARY SHIPPING & RETURNS</h3>
                <p class="policy_cnt">We offer you several shipping options and the possibility to return or exchange your purchased creations.</p>
                <div class="policy_btns">
                    <a href="" class="policy_btn effect-3">View Shipping</a>
                    <a href="" class="policy_btn effect-3">View Shipping</a>
                </div>
            </div>

            <div class="policy">
                <h3 class="policy_header">100% SECURE PAYMENT</h3>
                <img src="{{asset('/img/Screenshot 2023-11-08 024449.png')}}" alt="" class="polic_img">
                <p class="policy_cnt">All transactions are safe and secure.</p>
                <a href="" class="policy_btn effect-3">View Shipping</a>
            </div>

            <div class="policy">
                <h3 class="policy_header">AUTHENTIC GUARANTEE</h3>
                <p class="policy_cnt">Cartier guarantees the authenticity of all products purchased through Cartier online.</p>
                <a href="" class="policy_btn effect-3">View Shipping</a>
            </div>
            
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{asset('/js/payment.js')}}"></script>
</html>
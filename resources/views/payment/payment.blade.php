<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The UITERs</title>
    <link rel="stylesheet" href="{{ asset('/icon/fontawesome-free-6.4.2-web/css/regular.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/payment.css')}}">
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
                        <label for="address-option">Shipping To</label><br>
                        <select name="address-option" id="address-choose">
                            <option value="">New Address</option>
                            <option value="">Users</option>
                        </select>
                        
                        <div class="address_change-opt">
                            <button class="address-btn js-address">Update Address</button>
                            <button class="address-btn js-address">Add New</button>
                        </div>
                    </div>
                </div>

                <div class="ship_info js-form">
                    <label for="ship_form" id="form-label">Required field *</label>
                    <form action="" name="address-info" id="ship_form">
                        <label for="ship_gender" id="gender-label">Title *</label> <br>
                        <form name="genders" id="ship_gender">
                            <input type="radio" value="Mr" name="gender" id="mr">
                            <label for="mr">Mr</label>
                            <input type="radio" value="Mrs" name="gender" id="mrs">
                            <label for="mrs">Mrs</label>
                            <input type="radio" value="Miss" name="gender" id="miss">
                            <label for="miss">Miss</label>
                            <input type="radio" value="Mx" name="gender" id="mx">
                            <label for="mx">Mx</label>
                        </form>
    
                        <input type="text" value="" placeholder="First Name *" id="information"> <br>
                        <input type="text"  value="" placeholder="Last Name *" id="information"> <br>
                        <input type="text" value="" placeholder="Address *" id="information"> <br>
                        <select name="" id="ship_country">
                            <option value="">Viet Nam</option>
                            <option value="">Viet Nam</option>
                            <option value="">Viet Nam</option>
                            <option value="">Viet Nam</option>
                            <option value="">Viet Nam</option>
                        </select><br>
                        <input type="text" placeholder="City *" id="information"> <br>
                        <input type="text" placeholder="State *" id="information"> <br>
                        <input type="number" placeholder="Phone Number *" id="information"> <br>
                    </form>
                </div>

                <hr>

                <div class="ship_method">
                    <h4 class="ship_method-header">SHIPPING METHOD</h4>
                    <p>Cartier offers complimentary secure delivery on all orders. A signature from an adult 21+ will be required for all delivery methods.</p>
                    <form action="">
                        <input type="radio" name="ship-opt" id="method_type">
                        <label for="ship-opt">SATURDAY DELIVERY OPTION</label> <br> <br>
                        <input type="radio" name="ship-opt" id="method_type">
                        <label for="ship-opt">STANDARD DELIVERY</label>
                    </form>
                </div>

                <hr>
            </div>

            <div class="pay">
                <div class="pay_header">
                    <h4>ORDER SUMMARY</h4>
                    <a href="" class="pay_header-btn">Modify</a>
                </div>

                <div class="pay_items">
                    <div class="pay_item">
                        <div class="pay_item-img"><img src="{{ asset('/img/h3.webp')}}" alt="" width="180px"></div>

                        <div class="pay_item-cnt">
                            <h5 class="item-header">CHAIN BAG SMALL, PANTHÈRE DE CARTIER</h5>
                            <p class="item-dsc">Black calfskin, golden finish</p>
                            <strong class="item-price">$3,800.00</strong>
                        </div>
                    </div>
                </div>

                <div class="pay_total">
                    <div class="subtotal">
                        <h5 class="subtotal-header">SUBTOTAL</h5>
                        <p class="subtotal-price">$3,800.00</p>
                    </div>

                    <div class="delivery">
                        <h6 class="delivery-header">STANDARD DELIVERY</h6>
                        <p class="delivery-price">$0.00</p>
                    </div>

                    <hr>

                    <div class="tax">
                        <h6 class="tax-header">Sales tax</h6>
                        <p class="tax-price">$0.00</p>
                    </div>

                    <div class="total">
                        <h5 class="total-header">TOTAL</h5>
                        <p class="total-price">$3,800.00</p>
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

    <div class="modal-address">
        <div class="modal_container">
            <div class="modal_header">
                <i class="modal_header-ic"><i class="fa-solid fa-xmark"></i></i>
                <h1 class="modal_header-heading">VERIFY YOUR ADDRESS</h1>
                <h3 class="modal_header-subheading">Select one of the following recommended addresses</h3>
            </div>

            <div class="modal_body">
                <button class="body_address-box">
                    <h4 class="body_address-box_head">Address 1</h4>
                    <p class="body_address-box_dsc">01 Linh Trung, Thủ Đức, HCM, Viet Nam</p>
                </button>
                
                <button class="body_address-box">
                    <h4 class="body_address-box_head">Address 1</h4>
                    <p class="body_address-box_dsc">01 Linh Trung, Thủ Đức, HCM, Viet Nam</p>
                </button>
            </div>

            <button class="modal_btn js-address-btn">CONTINUE</button>
        </div>
    </div>

    <div class="modal-method show">
        <div class="modal-method_container">
            <div class="modal_header">
                <i class="modal-method_header-ic"><i class="fa-solid fa-xmark"></i></i>
                <h1 class="modal_header-heading">PAYMENT METHOD</h1>
                <h3 class="modal_header-subheading">Select one of the following method</h3>
            </div>

           <form action="" class="modal_form">
                <input type="image" src="{{asset('/img/Screenshot 2023-11-08 202848.png')}}" alt="" id="pay_method">
                <input type="image" src="{{asset('/img/Screenshot 2023-11-08 202904.png')}}" alt="" id="pay_method">
                <input type="image" src="{{asset('/img/Screenshot 2023-11-08 202848.png')}}" alt="" id="pay_method">
                <input type="image" src="{{asset('/img/Screenshot 2023-11-08 202904.png')}}" alt="" id="pay_method">
           </form>

            <!-- <button class="modal-method_btn">PAY</button> -->
        </div>
    </div>
</body>

<script src="{{asset('/js/payment.js')}}"></script>
</html>
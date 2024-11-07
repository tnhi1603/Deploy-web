<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <!-- <link rel="stylesheet" href="{{asset('css/home.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/cart.css')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">


<body>
    <div class="cartier">
        <!-- header start -->
        <div class="header">
            <div class="header-notice">
                <p>Enjoy wrap-gift standard shipping. <span class=""><a class="has-link return-link">Click here to learn
                            more about returns and exchanges.</a></span></p>
            </div>

            <div class="main-header">
                <ul class="nav-left">
                    <li class="nav-left--item"><a href="" class="has-link nav-hover">Home</a></li>
                    <li class="nav-left--item"><a href="" class="has-link nav-hover">Contact Us</a></li>
                </ul>

                <div class="logo">
                    <a href="/"><img class="logo-img" src="{{ asset('img/Screenshot_2023-10-16_121457-removebg.png')}}" alt=""></a>
                </div>

                <div class="nav-right">
                    <div class="nav-right--item"><i class="fa fa-heart"></i></div>
                    @if (Route::has('login'))
                    @auth
                        <div class="nav-right--item isUser">
                            <a href="{{ url('/profile') }}" style="margin: 0">
                                    <i class="fa fa-user"></i>
                            </a>
                            <div class="logout">
                                <form action="{{ Route('logout')}}" method="POST">
                                        @csrf
                                    <a class="watch-collection--item"><button class="menu-bt">LOG OUT</button></a>
                                </form>
                            </div>
                        </div>
                        
                        <a href="{{Route('cart.index')}}" style="margin: 0"><div class="nav-right--item"><i class="fa fa-cart-plus"></i></div></a>
                    @else
                        <a href="{{ url('/login') }}" style="margin: 0"><div class="nav-right--item"><i class="fa fa-user"></i></div></a>
                        <a href="{{ url('/login') }}" style="margin: 0"><div class="nav-right--item"><i class="fa fa-cart-plus"></i></div></a>
                    @endauth
                @endif
                </div>
            </div>
        </div>
        <div class="sub-navbar">
             <div class="dropdown">
                <button class="dropbtn">Brand</button>
                <div class="dropdown-content">
                @foreach ($brand as $data)
                    <a href="/collection?brand={{$data->id}}">{{$data->name}}</a>
                @endforeach
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Category</button>
            <div class="dropdown-content">
                @foreach ($category as $data)
                    <a href="/collection?brand={{$data->id}}">{{$data->name}}</a>
                @endforeach
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Gender</button>
            <div class="dropdown-content">
                <a href="/collection?gender=male">Male</a>
                <a href="/collection?gender=female">Female</a>
            </div>
        </div>
    </div> 
        <!-- header end -->
        <!--welcom-->
        <div class="banner">
                <div class="banner-introduction">
                    <img class="pagination-img" src="{{ asset('img/leather.png') }}" alt="">
                    <h5>WELCOME</h5>
                    <div>Manage your personal data and the newsletter subscription.</div>
                </div>
            </div>
        <!--body-->
        <div class="body">
            <div class="slidebar">
                <h2>MY UITER</h2>
                <ul class="menu">
                    <li class="watch-collection--item" id="show_overview">OVERVIEW</li>
                    <li class="watch-collection--item"id="show_profile">MY PROFILE</li>
                    <li class="watch-collection--item" id="show_password">MY PASSWORD</li>
                    <li class="watch-collection--item" id="show_order">MY ORDERS</li>
                    <li class="watch-collection--item" id="show_wishlist">MY WISH LIST</li>
                    <li class="watch-collection--item" id="show_address">MY ADDRESSES</li>
                    <li class="watch-collection--item" id="show_collection">MY COLLECTION</li>
                    <li class="watch-collection--item" id="show_subscription">MY SUBSCRIPTIONS & INTERESTS</li>
                    <form action="{{ Route('logout')}}" method="POST">
                        @csrf
                        <li class="watch-collection--item"><button class="menu-bt">LOG OUT</button></li>
                    </form>
                </ul>
            </div>
            <div class="bd-content">
                <div class="grid-container" id="overview">
                    <div class="grid-item">
                        <h3 class="content" style="text-shadow: 0 0 3px #FFFFFF">MY PROFILE</h3>
                        <div class="content">{{$user->name}}</div>
                        <div class="content">{{$user->email}}</div>
                    </div>
                    <div class="grid-item">
                        <h3 class="content">MY ORDERS</h3>
                        <div class="content">You have not previously ordered as a registered customer.</div>
                    </div>
                    <div class="grid-item">
                        <h3 class="content">MY WISH LIST</h3>
                        <div class="content">
                            <div class="count">
                            <p>*Count item here</p>
                        </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <h3 class="content">MY ADDRESSES</h3>
                        <div class="content">Default Address</div>
                        <div><a href="" class="content">View all addresses</a></div>
                    </div>
                </div>
                <div id="profile">@include('profile.partials.profile')</div>
                <div id="password">@include('profile.partials.password')</div>
                <div id="order">@include('profile.partials.orders')</div>
                <div id="wishlist">@include('profile.partials.wishlist')</div>
                <div id="address"> @include('profile.partials.address')</div>
                <div class="bd-content" id="collection">@include('profile.partials.collection')</div>
                <div class="bd-content" id="subscription">@include('profile.partials.subcription')</div>
            </div>
        </div>
        @include('chatbox.chatbox');
        <!-- footer start -->
        <div class="footer">
            <ul class="footer-list">
                <li class="footer-list--item">
                    <h3>CUSTOMER CARE</h3>
                </li>
                <li class="footer-list--item">Contact Us</li>
                <li class="footer-list--item">Call Now : 800 227 8437</li>
                <li class="footer-list--item">FAQ</li>
                <li class="footer-list--item"> TRACK YOUR ORDER</li>
            </ul>
            <ul class="footer-list">
                <li class="footer-list--item">
                    <h3>CUSTOMER CARE</h3>
                </li>
                <li class="footer-list--item">Contact Us</li>
                <li class="footer-list--item">Call Now : 800 227 8437</li>
                <li class="footer-list--item">FAQ</li>
                <li class="footer-list--item"> TRACK YOUR ORDER</li>
            </ul>
            <ul class="footer-list">
                <li class="footer-list--item">
                    <h3>CUSTOMER CARE</h3>
                </li>
                <li class="footer-list--item">Contact Us</li>
                <li class="footer-list--item">Call Now : 800 227 8437</li>
                <li class="footer-list--item">FAQ</li>
                <li class="footer-list--item"> TRACK YOUR ORDER</li>
            </ul>
            <div class="footer-list hasnt-flex">
                <h3 class="footer-list--item">FOLLOW US</h3>
                <div class="icon-link">
                    <a href="" class="footer-list--item icon-link-item"><i class="fa fa-facebook-f"></i></a>
                    <a href="" class="footer-list--item icon-link-item"><i class="fa fa-youtube-play"></i></a>
                    <a href="" class="footer-list--item icon-link-item"><i class="fa fa-instagram"></i></a>
                    <a href="" class="footer-list--item icon-link-item"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <!-- footer end -->
    </div>

    <div class="evaluate-modal">
        <div class="evaluate-modal_container">
            <div class="evaluate-modal_header">
                <h3>EVALUATE</h3>
                <i class="fa-solid fa-xmark modal_close"></i>
            </div>
        
            <div class="evaluate-modal_body">
                <form action="" class="body_form">
                    <label for="evluate-cnt">Your evaluation</label><br>
                    <input type="text" name="evluate-cnt" id="evluate-cnt" autofocus style="word-wrap:break-word" size="50"><br>
                    <label for="evaluate-number">From worst to best</label><br>
                    <input type="number" name="evaluate-number" id="evaluate-number" min="1" max="5">
                </form>
            </div>
        
            <div class="add_modal_btn"><button class="evaluate-modal_btn">ADD</button></div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const deleteitems = document.querySelectorAll(".delete");
    const cartitems = document.querySelectorAll(".product-container");

    deleteitems.forEach(deleteitem => {
        deleteitem.addEventListener('click', () => {
            confirm('Bạn có chắc chắn xóa hay không ?');
        })
    })

    const productObjects = document.querySelectorAll('.product-object');
    const counter= document.querySelector('.count');
    counter.innerHTML = productObjects.length +" "+ "items";
    console.log(productObjects.length)
</script>

<script>
    $(document).ready(function() {
        // Ẩn tất cả các mục khi trang tải
        $('#password, #wishlist, #profile, #order, #collection, #subscription, #address').hide();

        // Xử lý sự kiện khi click nút "Hiển thị Password"
        $('#show_password').click(function() {
            $('#password').show();
            $('#wishlist').hide(); // Ẩn các mục khác nếu cần
            $('#profile').hide();
            $('#order').hide();
            $('#collection').hide();
            $('#subscription').hide();
            $('#address').hide();
            $('#overview').hide();
        });
        $('#show_wishlist').click(function() {
            $('#password').hide();
            $('#wishlist').show(); // Ẩn các mục khác nếu cần
            $('#profile').hide();
            $('#order').hide();
            $('#collection').hide();
            $('#subscription').hide();
            $('#address').hide();
            $('#overview').hide();
        });

        $('#show_profile').click(function() {
            $('#password').hide();
            $('#wishlist').hide(); // Ẩn các mục khác nếu cần
            $('#profile').show();
            $('#order').hide();
            $('#collection').hide();
            $('#subscription').hide();
            $('#address').hide();
            $('#overview').hide();
        });
        $('#show_order').click(function() {
            $('#password').hide();
            $('#wishlist').hide(); // Ẩn các mục khác nếu cần
            $('#profile').hide();
            $('#order').show();
            $('#collection').hide();
            $('#subscription').hide();
            $('#address').hide();
            $('#overview').hide();
        });
        $('#show_collection').click(function() {
            $('#password').hide();
            $('#wishlist').hide(); // Ẩn các mục khác nếu cần
            $('#profile').hide();
            $('#order').hide();
            $('#collection').show();
            $('#subscription').hide();
            $('#address').hide();
            $('#overview').hide();
        });
        $('#show_subscription').click(function() {
            $('#password').hide();
            $('#wishlist').hide(); // Ẩn các mục khác nếu cần
            $('#profile').hide();
            $('#order').hide();
            $('#collection').hide();
            $('#subscription').show();
            $('#address').hide();
            $('#overview').hide();
        });
        $('#show_address').click(function() {
            $('#password').hide();
            $('#wishlist').hide(); // Ẩn các mục khác nếu cần
            $('#profile').hide();
            $('#order').hide();
            $('#collection').hide();
            $('#subscription').hide();
            $('#address').show();
            $('#overview').hide();
        });
        $('#show_overview').click(function() {
            $('#password').hide();
            $('#wishlist').hide(); // Ẩn các mục khác nếu cần
            $('#profile').hide();
            $('#order').hide();
            $('#collection').hide();
            $('#subscription').hide();
            $('#address').hide();
            $('#overview').show();
        });
    });
</script>

<script>
const statuses = document.querySelectorAll('.orders-status');
const orders = document.querySelectorAll('.orders__list');

statuses.forEach((status, i) => {
    const order = orders[i];

    status.onclick = function () {
        // Xóa lớp 'next' khỏi tất cả các phần tử có class '.orders-status'
        document.querySelectorAll('.orders-status.next').forEach(el => {
            el.classList.remove('next');
        });

        // Xóa lớp 'nextto' khỏi tất cả các phần tử có class '.orders__list'
        document.querySelectorAll('.orders__list.nextto').forEach(el => {
            el.classList.remove('nextto');
        });

        // Thêm lớp 'next' cho phần tử đang được click có class '.orders-status'
        this.classList.add('next');

        // Thêm lớp 'nextto' cho phần tử tương ứng có class '.orders__list'
        order.classList.add('nextto');
    };
});

</script>

<script>
        const modal = document.querySelector('.evaluate-modal');
        const modalContainer = document.querySelector('.evaluate-modal_container');
        const modalClose = document.querySelector('.modal_close');
        const modalAddBtns = document.querySelectorAll('.evaluate_btn');

        function showQuickForm() {
            modal.classList.add('modal_show')
        }

        function hideQuickForm() {
            modal.classList.remove('modal_show')
        }

        modalAddBtns.forEach(modalAddBtn => {
            modalAddBtn.addEventListener('click', showQuickForm)
        });

        modalClose.addEventListener('click', hideQuickForm)

        modal.addEventListener('click',  hideQuickForm)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
</script>
<script src="{{asset('/js/user')}}"></script>
</html>
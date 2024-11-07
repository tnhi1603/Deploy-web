<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>For Manager</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Logo_UIT_updated.svg/1200px-Logo_UIT_updated.svg.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.relative{position:relative}.mx-auto{margin-left:auto;margin-right:auto}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.ml-4{margin-left:1rem}.mt-16{margin-top:4rem}.mt-6{margin-top:1.5rem}.mt-4{margin-top:1rem}.-mt-px{margin-top:-1px}.mr-1{margin-right:0.25rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.h-16{height:4rem}.h-7{height:1.75rem}.h-6{height:1.5rem}.h-5{height:1.25rem}.min-h-screen{min-height:100vh}.w-auto{width:auto}.w-16{width:4rem}.w-7{width:1.75rem}.w-6{width:1.5rem}.w-5{width:1.25rem}.max-w-7xl{max-width:80rem}.shrink-0{flex-shrink:0}.scale-100{--tw-scale-x:1;--tw-scale-y:1;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.items-center{align-items:center}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.self-center{align-self:center}.rounded-lg{border-radius:0.5rem}.rounded-full{border-radius:9999px}.bg-white-100{background-color: #F7FAFC;}.bg-gray-100{--tw-bg-opacity:1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-red-50{--tw-bg-opacity:1;background-color:rgb(254 242 242 / var(--tw-bg-opacity))}.bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")}.from-gray-700\/50{--tw-gradient-from:rgb(55 65 81 / 0.5);--tw-gradient-to:rgb(55 65 81 / 0);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-transparent{--tw-gradient-to:rgb(0 0 0 / 0);--tw-gradient-stops:var(--tw-gradient-from), transparent, var(--tw-gradient-to)}.bg-center{background-position:center}.stroke-red-500{stroke:#ef4444}.stroke-gray-400{stroke:#9ca3af}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.text-center{text-align:center}.text-right{text-align:right}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.font-semibold{font-weight:600}.leading-relaxed{line-height:1.625}.text-gray-600{--tw-text-opacity:1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-2xl{--tw-shadow:0 25px 50px -12px rgb(0 0 0 / 0.25);--tw-shadow-colored:0 25px 50px -12px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.shadow-gray-500\/20{--tw-shadow-color:rgb(107 114 128 / 0.2);--tw-shadow:var(--tw-shadow-colored)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.selection\:bg-red-500 *::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-red-500::selection{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.focus\:rounded-sm:focus{border-radius:0.125rem}.focus\:outline:focus{outline-style:solid}.focus\:outline-2:focus{outline-width:2px}.focus\:outline-red-500:focus{outline-color:#ef4444}.group:hover .group-hover\:stroke-gray-600{stroke:#4b5563}.z-10{z-index: 10}@media (prefers-reduced-motion: no-preference){.motion-safe\:hover\:scale-\[1\.01\]:hover{--tw-scale-x:1.01;--tw-scale-y:1.01;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}}@media (prefers-color-scheme: dark){.dark\:bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:bg-gray-800\/50{background-color:rgb(31 41 55 / 0.5)}.dark\:bg-red-800\/20{background-color:rgb(153 27 27 / 0.2)}.dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}.dark\:bg-gradient-to-bl{background-image:linear-gradient(to bottom left, var(--tw-gradient-stops))}.dark\:stroke-gray-600{stroke:#4b5563}.dark\:text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:shadow-none{--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.dark\:ring-inset{--tw-ring-inset:inset}.dark\:ring-white\/5{--tw-ring-color:rgb(255 255 255 / 0.05)}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.group:hover .dark\:group-hover\:stroke-gray-400{stroke:#9ca3af}}@media (min-width: 640px){.sm\:fixed{position:fixed}.sm\:top-0{top:0px}.sm\:right-0{right:0px}.sm\:ml-0{margin-left:0px}.sm\:flex{display:flex}.sm\:items-center{align-items:center}.sm\:justify-center{justify-content:center}.sm\:justify-between{justify-content:space-between}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width: 768px){.md\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}}@media (min-width: 1024px){.lg\:gap-8{gap:2rem}.lg\:p-8{padding:2rem}}
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('/icon/fontawesome-free-6.4.2-web/css/regular.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/manager.css') }}">
</head>
<body>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="cartier">
         <!-- header start -->
        <div class="header">
            <div class="header-left-wrap">
                <div class="logo-merchant">
                    <img class="logo-img" src="{{ asset('/img/manager.png') }}" alt="">
                </div>
                <button class="icon-bars">
                    <img class="bars-img" src="{{ asset('/img/bars.png') }}" alt="">
                </button>
            </div>
            
            <div class="header-right-wrap">
               <p class="email-contact">
                    <i class="fa fa-phone"></i>
                    <span>Email for assistance : 
                        <strong>theuitersmerchant@gmail.com</strong>
                    </span>
                    <span>Manager's name: 
                        <strong>{{auth()->user()->name}}</strong>
                    </span>
               </p>
            </div>
        </div>
        <!-- header end -->

        <div class="main-content">
            <div class="main-left">
                <div class="input-space">
                    <div class="img-btn"><img class="span-search" src="/Public_FE/img/search.png" alt=""></div>
                    <input class="input-box" type="text" placeholder="Typing here ....">
                </div>
                <div class="selection">
                    <div class="select-click active">Dashboard</div>
                    <div class="select-click subpage-click " >
                        Product Management
                        <div class="subpage-product-appear">
                          <div class="subpage-product-item-click click">Add product</div>  
                          <div class="subpage-product-item-click">Modify product</div>
                          <div class="subpage-product-item-click">Delete product</div>  
                        </div>
                    </div>
                    <div class="select-click subpage-human">
                        Account Management
                        <div class="subpage-human-appear">
                          <div class="subpage-human-item-click click">Add account</div>  
                          <div class="subpage-human-item-click">Modify account</div>
                          <div class="subpage-human-item-click">Delete account</div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-right">
               <div class="main-right-content">
                    <div class="select-container active">
                        <div id="monthSelected" class="flex items-center justify-center mt-5">
                            <select id="monthSelect" class="monthSelected">
                                <option value="" class="month">Chọn tháng</option>
                                <option value="{{date('y/m')}}" class="month" id="12">{{date('F')}}</option>
                                <option value="{{date('y/m', strtotime('-1 month'))}}" class="month">{{date('F', strtotime('-1 month'))}}</option>
                                <option value="{{date('y/m', strtotime('-2 month'))}}" class="month">{{date('F', strtotime('-2 month'))}}</option>
                            </select>
                        </div>

                        <div class="row">
                            <div id="monthRevenue" class="col ">
                                <h3>  Monthly Revenue : </h3> 
                                <p class="no-data">Chưa chọn tháng</p>
                                <div class="rev-result"></div>
                            </div>

                            <div class="col " id="totalOrder">
                                <h3 class="">Total Orders : </h3>
                                <p class="no-data">Chưa chọn tháng</p>
                                <div class="order-result"></div>
                            </div>

                            <div class="col ">
                                <h3 class="">Product Orders : </h3>
                                <p class="no-data">Chưa chọn tháng</p>
                                <div class="product-result"></div>
                                <!-- @foreach ($order as $order)
                                    <p>Month: {{ $order->created_at }}, Revenue: {{ $order->total_prices }}</p>
                                @endforeach -->
                            </div>

                        </div>

                        <div class="charts" id="">
                            <div class="charts-card">
                                <p class="chart-title">Monthly Orders</p>
                                <div id="bar-chart"></div>
                            </div>
                            <div class="charts-card">
                                <p class="chart-title">Product Total and Sale Orders</p>
                                <div id="area-chart"></div>
                            </div>
                        </div>

                    </div>
                    <div class="select-container click">
                        <div class="subpage-product-container">
                            <!-- form -->
                            <div class="form-container">
                                <h2 class=" heading-add font-bold text-xl flex items-center justify-center">Add Product Form</h2>                            

                                <form method="POST" action="/watch/create" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="add-product-container">
                                        <div class="add-product-left">
                                            <div class="form-group">
                                                <label for="pName">Product Name:</label>
                                                <input type="text" name="name" id="pName" placeholder="Product Name" class="form-control"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="pPrice">Product Price:</label>
                                                <input type="text" name="price" id="pPrice" placeholder="Product Price" class="form-control"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Product Gender:</label>
                                                <div class="radio-gender">
                                                    <label><input type="radio" name="gender" value="male"> Male</label>
                                                    <label><input type="radio" name="gender" value="female"> Female</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pStorage">Product Storage:</label>
                                                <input type="text" name="storage" id="pStorage" placeholder="Product Storage" class="form-control"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="pDiscount">Discount:</label>
                                                <input type="text" name="discount" id="pDiscount" placeholder="Product Storage" class="form-control"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="pBrand">Brand:</label>
                                                <select name="brand_id" id="brand" placeholder="Product Brand" class="form-control">
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="add-product-right mt-4">
                                            <div class="form-group">
                                                <label for="pDes">Description:</label>
                                                <input type="text" name="description" id="pDes" placeholder="Product Description" class="form-control"/>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label for="pCate">Category:</label>
                                                <select class="form-control" id="category" name="category_id">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pUpload1">Upload Image 1:</label>
                                                <input type="file" name="img1" id="pUpload1" class="form-control-file" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pUpload2">Upload Image 2:</label>
                                                <input type="file" name="img2" id="pUpload2" class="form-control-file" >
                                            </div>
                                            <div class="form-group">
                                                <label for="pUpload3">Upload Image 3:</label>
                                                <input type="file" name="img3" id="pUpload3" class="form-control-file" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-center items-center border-solid m-10">
                                        <button class="add-product-btn submit-container" type="submit">Thêm Sản Phẩm</button>
                                    </div>
                                </form>

                            </div>
                                <!-- end-form -->
                                <!-- list close product -->
                            <div class="closed-product-list">
                                <h2 class="font-bold text-xl flex items-center justify-center"> Products Add Recently</h2>
                                <table class="closed-item-table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Gender</th>
                                            <th>Product Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($watches->take(10) as $watch)
                                        <tr class="closed-product-item">
                                            <td class="product-name">{{$watch->name}}</td>
                                            <td class="product-price">{{$watch->price}}</td>
                                            <td class="product-description">{{$watch->gender}}</td>
                                            <td class="product-category">{{$watch->description}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- end list product -->
                        </div>
                        <div class="subpage-product-container">
                            <!-- modify -->
                            <div class="product-list">
                                <h2 class="heading-list">Products List</h2>
                                <table class="item-table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Discount</th>
                                            <th>Product Brand</th>
                                            <th>Product Category</th>
                                            <th>Product Gender</th>
                                            <th>Product Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($watches as $watch)
                                        <tr class="product-item">
                                            <td class="product-name">{{$watch->name}}</td>
                                            <td class="product-price">{{$watch->price}} đ</td>
                                            <td class="product-discount">{{$watch->discount * 100}} %</td>
                                            <td class="product-brand">{{$watch->brand->name}}</td>
                                            <td class="product-category">{{$watch->category->name}}</td>
                                            <td class="product-gender">{{$watch->gender}}</td>
                                            <td class="product-description">{{$watch->description}}</td>
                                            <td class="product-actions">
                                                <button data-id='{{$watch->id}}' class="modify-product-btn">Modify</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr> <td colspan="9" style="text-align: center;"><button class="showAll">show all</button></td></tr>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>

                            <div class="form-container modify-form">
                                <h2 class=" heading-add font-bold text-xl flex items-center justify-center">Sửa Thông Tin</h2>                            

                                <form method="POST" class="sua" action="/watch" enctype="multipart/form-data">
                                    @csrf 
                                    @method("PUT")
                                    <div class="add-product-container">
                                        <div class="add-product-left">
                                            <div class="form-group">
                                                <label for="pName">Product Name:</label>
                                                <input type="text" name="name" id="pmName" placeholder="Product Name" class="form-control"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="pPrice">Product Price:</label>
                                                <input type="text" name="price" id="pmPrice" placeholder="Product Price" class="form-control"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Product Gender:</label>
                                                <div class="radio-gender">
                                                    <label><input type="radio" name="gender" value="Male"> Male</label>
                                                    <label><input type="radio" name="gender" value="Female"> Female</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pStorage">Product Storage:</label>
                                                <input type="text" name="storage" id="pmStorage" placeholder="Product Storage" class="form-control"/>
                                            </div>

                                            <div class="form-group">
                                                <label for="pDiscount">Discount:</label>
                                                <input type="text" name="discount" readonly id="pmDiscount" placeholder="Product Storage" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="pBrand">Brand:</label>
                                                <select name="brand_id" id="mbrand" placeholder="Product Brand" class="form-control">
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="add-product-right mt-4">
                                            <div class="form-group">
                                                <label for="pDes">Description:</label>
                                                <input type="text" name="description" id="pmDes" placeholder="Product Description" class="form-control"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="pCate">Category:</label>
                                                <select class="form-control" id="mcategory" name="pCate">
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pUpload1">Upload Image 1:</label>
                                                <input type="file" name="img1" id="pmUpload1" class="form-control-file" >
                                            </div>

                                            <div class="form-group">
                                                <label for="pUpload2">Upload Image 2:</label>
                                                <input type="file" name="imt2" id="pmUpload2" class="form-control-file" >
                                            </div>
                                            <div class="form-group">
                                                <label for="pUpload3">Upload Image 3:</label>
                                                <input type="file" name="img3" id="pmUpload3" class="form-control-file" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-center items-center border-solid m-10">
                                        <button class="add-product-btn submit-container" type="submit">Sửa Sản Phẩm</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="subpage-product-container">
                            <!-- delete -->
                            <div class="product-list">
                                <h2 class="font-bold text-xl flex items-center justify-center">Products List</h2>
                                <table class="item-table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Discount</th>
                                            <th>Product Brand</th>
                                            <th>Product Category</th>
                                            <th>Product Gender</th>
                                            <th>Product Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($watches as $watch)
                                        <tr class="product-item">
                                            <td class="product-name">{{$watch->name}}</td>
                                            <td class="product-price">{{$watch->price}} đ</td>
                                            <td class="product-discount">{{$watch->discount * 100}} %</td>
                                            <td class="product-brand">{{$watch->brand->name}}</td>
                                            <td class="product-category">{{$watch->category->name}}</td>
                                            <td class="product-gender">{{$watch->gender}}</td>
                                            <td class="product-description">{{$watch->description}}</td>
                                            <td class="product-actions">
                                                <form action="/watch/{{$watch->id}}" method="POST">
                                                    @csrf
                                                    @method('Delete')
                                                    <button style="background-color: #ef4444;" class="modify-product-btn">Delete</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr> <td colspan="9" style="text-align: center;"><button class="showAll">show all</button></td></tr>
                                    </tbody>
                                </table>
                                <div class="modal-container">
                                    <div class="modal-delete">
                                        <form class="modal-content" action="">
                                       
                                            <p class="attention">Are you sure you want to delete this item?</p>
                                            <div class="btn-wrapper">
                                                <button class="cancel" onclick="toggleModal()">
                                                    No, cancel
                                                </button>
                                                <button class="deleted">
                                                    Yes, I'm sure
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- staff account section -->
                    <div class="select-container">
                        <div class="subpage-human-container">
                                <!-- form -->
                            <div class="add-container">
                                <h2 class=" heading-add font-bold text-xl flex items-center justify-center">Add Account Form</h2>
                                <form action="/manager/staff/create" method="POST">
                                    @csrf;
                                    <div class="add-staff-container">
                                        <div class="add-staff-left">
                                            <div class="staff-input-show flex items-center justify-between ">
                                                <label for="Name" class="form-label"> Staff's Name: </label>
                                                <input
                                                        type="text"
                                                        name="name"
                                                        id="pNamePassword"
                                                        placeholder="Enter password"
                                                        class="product-input-area"
                                                        :value="old('email')" required autocomplete="username"
                                                />
                                            </div>
                                            <div class="staff-input-show flex items-center justify-between ">
                                                <label for="pEmail" class="form-label"> Email: </label>
                                                <input
                                                        type="email"
                                                        name="email"
                                                        id="pEmail"
                                                        placeholder="Enter email"
                                                        class="product-input-area"
                                                        :value="old('name')" required autofocus autocomplete="name"
                                                />
                                            </div>
                                            <div class="staff-input-show flex items-center justify-between ">
                                                <label for="password" class="form-label"> Set Password: </label>
                                                <input
                                                        type="password"
                                                        name="password"
                                                        id="pPassword"
                                                        placeholder="Enter password"
                                                        class="product-input-area"
                                                        required autocomplete="new-password"
                                                />
                                            </div>

                                            <div class="staff-input-show flex items-center justify-between ">
                                                <label for="password" class="form-label"> Confirm Password: </label>
                                                <input
                                                        type="password"
                                                        name="password_confirmation"
                                                        id="cPassword"
                                                        placeholder="Enter password"
                                                        class="product-input-area"
                                                        required autocomplete="new-password"
                                                />
                                            </div>
                                        </div>
                                     
                                        </div>
                                            <!-- submit -->
                                        <div class="flex justify-center items-center border-solid m-10">
                                            <button class="add-staff-btn submit-container">Submit</button>
                                        </div>
                                        
                                </form>

                                <!-- list close product -->
                                <div class="closed-staff-list">
                                    <h2 class="font-bold text-xl flex items-center justify-center">Staff Account recently</h2>
                                    <table class="closed-staff-table">
                                        <thead>
                                            <tr>
                                                <th>Staff's Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="closed-staff-item">
                                                <td class="staff-name">Nguyen Van A</td>  
                                                <td class="staff-name">aaaa</td>
                                                <td class="staff-email">as@gmail.com</td>
                                                <td class="staff-password">asd</td>
                                            </tr>
                                            <tr class="closed-product-item">
                                                <td class="product-name">Nguyen Van B</td>  
                                                <td class="product-name">as</td>
                                                <td class="product-email">as@gmail.com</td>
                                                <td class="staff-password">as@gmail.com</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  
                             <!-- end list product -->
                            </div>
                            
                        </div>
                        <div class="subpage-human-container">
                            <!-- modify -->
                            <div class="closed-product-list">
                                <h2 class="font-bold text-xl flex items-center justify-center">Staff Account recently</h2>
                                <table class="closed-item-table">
                                    <thead>
                                        <tr>
                                            <th>Staff's Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="closed-product-item">
                                            <td class="product-name">Nguyen Van A</td>  
                                            <td class="product-name">aaaa</td>
                                            <td class="product-email">as@gmail.com</td>
                                            <td class="product-price">asd</td>
                                            
                                        </tr>
                                        <tr class="closed-product-item">
                                            <td class="product-name">Nguyen Van B</td>  
                                            <td class="product-name">as</td>
                                            <td class="product-email">as@gmail.com</td>
                                            <td class="product-price">passb</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                        <div class="subpage-human-container">
                            <!-- delete -->
                            <div class="closed-product-list">
                                    <h2 class="font-bold text-xl flex items-center justify-center">Account recently</h2>
                                    <table class="closed-item-table">
                                        <thead>
                                            <tr class=" text-center">
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="closed-product-item">
                                                <td class="product-name">aaaa</td>
                                                <td class="product-email">as@gmail.com</td>
                                                <td class="product-price">asd</td>
                                                <td class="product-actions">
                                                    <button class="del-human-btn" onclick="toggleModalStaff()">Del</button>
                                                </td>
                                            </tr>
                                            <tr class="closed-product-item">
                                                <td class="product-name">as</td>
                                                <td class="product-email">as@gmail.com</td>
                                                <td class="product-price">passb</td>
                                                <td class="product-actions">
                                                    <button class="del-human-btn" onclick="toggleModalStaff()">Del</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal-container-human">
                                    <div class="modal-delete">
                                        <form class="modal-content" action="">
                                       
                                            <p class="attention">Are you sure you want to delete this person?</p>
                                            <div class="btn-wrapper">
                                                <button class="cancel" onclick="toggleModalStaff()">
                                                    No, cancel
                                                </button>
                                                <button class="deleted">
                                                    Yes, I'm sure
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</body>

<!-- apex chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.44.0/apexcharts.min.js"></script>
<!-- end chart -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{asset('js/manager.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>


</html>
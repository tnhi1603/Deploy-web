const addressBtns = document.querySelectorAll('.js-address');
const form = document.querySelector('.js-form');

function showAddressForm() {
    form.classList.add('open')
};

for(const addressBtn of addressBtns) {
    addressBtn.addEventListener('click', showAddressForm)
}


// addressBtn.addEventListener('click', showAddressForm);

const payBtn = document.querySelector('.js-proceed');

//jquery to shipment
$(document).ready(function() {
    let csrf = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf
        }

    });
    let total_price = 0;
    let watch_id = [];
    let quantity = [];
    $('.pay_items').each(function (index) {
        watch_id[index] = $(this).find('.pay_item').first().find('.pay_item-cnt').attr('id');
        let q = $(this).find('.pay_item').first().find('.pay_item-cnt').first().find('.quantity').text();
        quantity[index] = q;
        total_price += parseInt(q) * parseInt($(this).find('.pay_item').first().find('.pay_item-cnt').first().find('.item-price').text().replace(/\./g, '').replace(' đ'));
        console.log( parseInt(q) * parseInt($(this).find('.pay_item').first().find('.pay_item-cnt').first().find('.item-price').text().replace(/\./g, '').replace(' đ')));
    })


   
    $.ajax({
        url: '/ship/cal',
        method: 'post',
        data: {
            'address_id': $('#address-choose').find(':selected').val(),
        },
        success: function (data) {
            $('.delivery-price').text(Intl.NumberFormat("de-DE").format(parseInt(data))) ;
            $('.total-price').text( Intl.NumberFormat("de-DE").format(total_price + parseInt(data)));
        }
    })

    $('#address-choose').on('selected', function () {
        $.ajax({
            url: '/ship/cal',
            method: 'post',
            data: {
                'address_id': $('#address-choose').find(':selected').val(),
            },
            success: function (data) {
                $('.delivery-price').text(Intl.NumberFormat("de-DE").format(parseInt(data))) ;
                $('.total-price').text( Intl.NumberFormat("de-DE").format(total_price + parseInt(data)));
            }
        })
    })

    $('button.pay_btn.js-proceed').on('click', function () {
        let address_id = $('#address-choose').find(':selected').val();
        
        let ship_fee = parseInt($('.delivery').first().find('.delivery-price').text().replace(/\./g, ''));
        if ($('.ship_method').first().find('form').first().find('input:checked').attr('value') == 'COD')
        {
            $.ajax({
                url: '/order/buy',
                method: 'POST',
                data: {
                    address_id: address_id,
                    watches_id: watch_id,
                    quantity: quantity,
                    ship_fee: ship_fee,
                },
                success: function (data) {
                    window.location = '/';
                }
            })
        }
        else if ($('.ship_method').first().find('form').first().find('input:checked').attr('value') == 'Momo') {
            console.log(1);
            $.ajax({
                url: '/payment/momo',
                method: 'POST',
                data: {
                    address_id: address_id,
                    watches_id: watch_id,
                    amount: parseInt($('.total-price').text().replace(/\./g, '')),
                    quantity: quantity,
                    ship_fee: ship_fee,
                },
                success: function (data) {
                    window.location.href = data;
                    console.log(data);
                },
                error: function (xhr, status, err) {
                    console.log(xhr.responseJSON.message);
                    alert('Error: ' + xhr.responseJSON.message);
                }
            })
        }
    })
    $('select#province').click(function () {
        $province = $(this);
        if ($province.find('option').length == 0) {
            $.ajax({
                url: '/api/get/provinces',
                method: 'POST',
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        $province.append(`<option value="${data[i].id}">${data[i].name}</option>`)
                    }
                }
            })
        }
    })
    $('select#province').on('change', function () {
        $('select#district').empty();
        $('select#ward').empty();
    })
    $('select#district').on('change', function () {
        $('select#ward').empty();
    })
    $('select#district').click(function () {
        $district = $(this);
        if ($district.find('option').length == 0) {
            $.ajax({
                url: '/api/get/districts',
                method: 'POST',
                data: {'province_id': $('select#province').val()},
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        $district.append(`<option value="${data[i].id}">${data[i].name}</option>`)
                        $('select#ward').empty();
                    }
                }
            })
        }
    })
    $('select#ward').click(function () {
        $ward = $(this);
        if ($ward.find('option').length == 0) {
            $.ajax({
                url: '/api/get/wards',
                method: 'POST',
                data: {'district_id': $('select#district').val()},
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        $ward.append(`<option value="${data[i].id}">${data[i].name}</option>`)
                    }
                }
            })
        }
    })

    $('select#address-choose').on('change', function (event) {
        $('p[name="phoneNumber"]').text($(this).find(':selected').attr('phone-number'));
    })
});
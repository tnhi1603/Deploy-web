
var csrfToken = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        $('#category').click(function () {
            if ($(this).find('option').length == 0) {
                $.ajax({
                    method: 'get',
                    url: '/category/getall',
                    success: function (data, textStatus, xhr) {
                        for (var i = 0; i < data.length; i++) {
                            var item = data[i];                    
                            $('select#category').append(`<option value=${item.id}>${item.name}</option>`);
                        }
                    }
                });
            }
            
        })
        $('#brand').click(function () {
            if ($(this).find('option').length == 0) {
                $.ajax({
                    method: 'get',
                    url: '/brand/getall',
                    success: function (data, textStatus, xhr) {
                        for (var i = 0; i < data.length; i++) {
                            var item = data[i];                    
                            $('select#brand').append(`<option value=${item.id}>${item.name}</option>`);
                        }
                    }
                });
            }
        })

        $('#mcategory').click(function () {
            if ($(this).find('option').length == 0) {
                console.log(1);
                $.ajax({
                    method: 'get',
                    url: '/category/getall',
                    success: function (data, textStatus, xhr) {
                        for (var i = 0; i < data.length; i++) {
                            var item = data[i];                    
                            $('select#mcategory').append(`<option value=${item.id}>${item.name}</option>`);
                        }
                    }
                });
            }
        })
        $('#mbrand').click(function () {
            if ($(this).find('option').length == 0) {
                $.ajax({
                    method: 'get',
                    url: '/brand/getall',
                    success: function (data, textStatus, xhr) {
                        for (var i = 0; i < data.length; i++) {
                            var item = data[i];                    
                            $('select#mbrand').append(`<option value=${item.id}>${item.name}</option>`);
                        }
                    }
                });
            }
        })

        $('button.showAll').click(function () {
            var t = $(this);
            $.ajax({
                url: '/watch/all',
                method: 'get',
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        let tr = 
                        `<tr class="product-item">
                            <td class="product-name">${data[i].name}</td>
                            <td class="product-price">${data[i].price} đ</td>
                            <td class="product-discount">${data[i].discount * 100} %</td>
                            <td class="product-brand">${data[i].brand.name}</td>
                            <td class="product-category">${data[i].category.name}</td>
                            <td class="product-gender">${data[i].gender}</td>
                            <td class="product-description">${data[i].description}</td>
                            <td class="product-actions">
                                <button class="modify-product-btn">Modify</button>
                            </td>
                        </tr>
                        `                        

                        t.parent().parent().parent().append(tr);
                        
                    }
                }
            });
        })

        $('button.modify-product-btn').click(function() {
            let slug = $(this).attr('data-id');
            $('form.sua').attr('action','/watch/' + slug + '/edit');
        })
})
const bar = document.querySelector('.icon-bars');
const inputSearch = document.querySelector('.input-box');
const mainLeft = document.querySelector('.main-left');
const selectList = document.querySelector('.selection');
const selects = document.querySelectorAll('.select-click');
const selectContents = document.querySelectorAll('.select-container');

bar.addEventListener('click',() => {
    if(inputSearch.classList.contains('hidden')) {
        inputSearch.classList.remove('hidden');
        selectList.classList.remove('hidden');
        mainLeft.style.width = '350px';
    } else {
        inputSearch.classList.add('hidden');
        selectList.classList.add('hidden');
        mainLeft.style.width = '90px';
    }
})


selects.forEach((item,index) => {
    const content = selectContents[index];
    item.onclick = () => {
        // Xóa lớp 'active' khỏi tất cả các phần tử .select-click
        document.querySelectorAll('.select-click.active').forEach((element) => {
            element.classList.remove('active');
        });
        
        // Xóa lớp 'active' khỏi tất cả các phần tử .select-container
        document.querySelectorAll('.select-container.active').forEach((element) => {
            element.classList.remove('active');
        });
        item.classList.add("active");
        content.classList.add("active");
    }
})

// start mouse move over/seeter
const subpageProduct = document.querySelector('.subpage-click');
subpageProduct.addEventListener('mouseleave', () => {
    document.querySelector('.subpage-product-appear').style.display = 'none';
});
subpageProduct.addEventListener('mouseenter', () => {
    document.querySelector('.subpage-product-appear').style.display = 'block';
})

const subpageHuman = document.querySelector('.subpage-human');
subpageHuman.addEventListener('mouseleave', () => {
    document.querySelector('.subpage-human-appear').style.display = 'none';
});
subpageHuman.addEventListener('mouseenter', () => {
    document.querySelector('.subpage-human-appear').style.display = 'block';
})
// end mouse 
// click subpage product
const subpage_products = document.querySelectorAll('.subpage-product-item-click');
const subpage_Product_Containers = document.querySelectorAll('.subpage-product-container');

subpage_products.forEach((product, index) => {
    const contentProduct = subpage_Product_Containers[index];

    product.onclick = () => {
        // Xóa lớp 'click' khỏi tất cả các phần tử .subpage-human-item-click
        document.querySelectorAll('.subpage-product-item-click.click').forEach((element) => {
            element.classList.remove('click');
        });
        
        // Xóa lớp 'click' khỏi tất cả các phần tử .subpage-human-container
        document.querySelectorAll('.subpage-product-container.click').forEach((element) => {
            element.classList.remove('click');
        });
        // Xóa lớp 'click' khỏi tất cả các phần tử .subpage-human-item-click
        document.querySelectorAll('.subpage-human-item-click.click').forEach((element) => {
            element.classList.remove('click');
        });

        // Xóa lớp 'click' khỏi tất cả các phần tử .subpage-human-container
        document.querySelectorAll('.subpage-human-container.click').forEach((element) => {
            element.classList.remove('click');
        });


        // Thêm lớp 'click' vào phần tử được nhấp
        product.classList.add('click');
        contentProduct.classList.add('click');
    };
});

// click subpage human
const subpage_humans = document.querySelectorAll('.subpage-human-item-click');
const subpage_Human_Containers = document.querySelectorAll('.subpage-human-container');

subpage_humans.forEach((human, index) => {
    const contentHuman = subpage_Human_Containers[index];

    human.onclick = () => {
        document.querySelectorAll('.subpage-product-item-click.click').forEach((element) => {
            element.classList.remove('click');
        });
        
        // Xóa lớp 'click' khỏi tất cả các phần tử .subpage-human-container
        document.querySelectorAll('.subpage-product-container.click').forEach((element) => {
            element.classList.remove('click');
        });
        // Xóa lớp 'click' khỏi tất cả các phần tử .subpage-human-item-click
        document.querySelectorAll('.subpage-human-item-click.click').forEach((element) => {
            element.classList.remove('click');
        });

        // Xóa lớp 'click' khỏi tất cả các phần tử .subpage-human-container
        document.querySelectorAll('.subpage-human-container.click').forEach((element) => {
            element.classList.remove('click');
        });

        // Thêm lớp 'click' vào phần tử được nhấp
        human.classList.add('click');
        contentHuman.classList.add('click');
    };
});
// get item option
const dropItems = document.querySelectorAll('.cate-dropdown-content-item');

dropItems.forEach(dropItem => {
    dropItem.addEventListener('click', function() {
        console.log(this.value);
        
    })
});


// modify action
const productItems = document.querySelectorAll('.product-item');
const modifyActions = document.querySelectorAll('.product-actions');
const modifyForm = document.querySelector('.modify-form');
modifyActions.forEach((ItemClick) => {
    ItemClick.addEventListener('click', function() {
        modifyForm.style.display = 'block';
    })
})

// delete action btn
const deleteActions = document.querySelectorAll('.del-product-btn');

const modalConfirmProduct = document.querySelector('.modal-container');
const cancelProduct = document.querySelector('.cancel');

window.onclick = function(event) {
    if (event.target == modalConfirmProduct) {
        modalConfirmProduct.style.display = "none";
    }
}
function toggleModal() {
    
    if (modalConfirmProduct.style.display === 'none' || modalConfirmProduct.style.display === '') {
        modalConfirmProduct.style.display = 'flex';
    } else {
        modalConfirmProduct.style.display = 'none';
    }
}

// modal of staff
const modalStaff = document.querySelector('.modal-container-human');

window.onclick = function(event) {
    if (event.target == modalStaff) {
        modalStaff.style.display = "none";
    }
}
function toggleModalStaff() {
    
    if (modalStaff.style.display === 'none' || modalStaff.style.display === '') {
        modalStaff.style.display = 'flex';
    } else {
        modalStaff.style.display = 'none';
    }
}
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

// ==========================Chăm sóc khách hàng============================

const auto = document.querySelector('.chat-assist_auto');
const quick = document.querySelector('.chat-assist_quick');
const autoContent = document.querySelector('.chat-assist_auto-content');
const quickContent = document.querySelector('.chat-assist_quick-content');

function showAutoContent () {
    autoContent.classList.add('open');
    quickContent.classList.remove('open');
}

function showQuickContent () {
    quickContent.classList.add('open');
    autoContent.classList.remove('open');
}

auto.addEventListener('click', showAutoContent);

quick.addEventListener('click', showQuickContent);

const workTimeBtns = document.getElementById('word-day_btn');

// =========================Hiển thị nội dung phần dashboard==============================

const over = document.querySelector('.chat-dashboard_auto');
const list =document.querySelector('.chat-dashboard_quick');
const overContent = document.querySelector('.chat-dashboard_overview');
const listContent = document.querySelector('.chat-dashboard_list');

function showOverContent () {
    overContent.classList.add('open');
    listContent.classList.remove('open');
}

function showListContent () {
    listContent.classList.add('open');
    overContent.classList.remove('open');
}

over.addEventListener('click', showOverContent);

list.addEventListener('click', showListContent);

// =========================Chọn thời gian làm việc================================
const workDays = document.querySelectorAll('.js-work-day');
const workTimes = document.querySelectorAll('.work-time');

function showWorkDay () {
    for(const workTime of workTimes) {
        workTime.classList.add('open');
        break;
    }
}

for (const workDay of workDays) {
    workDay.addEventListener('click', showWorkDay);
}

// =======================modal=============================
const addBtn = document.querySelector('.quick-head-btn');
        const modal = document.querySelector('.quick-modal');
        const modalContainer = document.querySelector('.quick-modal_container')
        const modalClose = document.querySelector('.modal_close');
        const modalAddBtn = document.querySelector('.fix-btn')

        function showQuickForm() {
            modal.classList.add('modal_show')
        }

        function hideQuickForm() {
            modal.classList.remove('modal_show')
        }


        addBtn.addEventListener('click', showQuickForm)

        modalAddBtn.addEventListener('click', showQuickForm)

        modalClose.addEventListener('click', hideQuickForm)

        modal.addEventListener('click',  hideQuickForm)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })

$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    console.log(1);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
    $('.update').click(function () {
        let id = $(this).parent().parent().find('.oID').text().replace('HD','');
        console.log(id);
        $.ajax({
            url: `/order/${id}`,
            method: 'patch',
            success: function (data) {
                $(this).parent().find('.status').text('Đang giao hàng');
                alert(`Đơn hàng ${data.id} đã chuyển trạng thái`)
            }
        })
    })
})

const indexNow = 0 ;
const gridItems = document.querySelectorAll('.grid-item-count')
const modals  = document.querySelectorAll('.modal');
const closeModals = document.querySelectorAll('.close-modal');

const closeSubModal = document.querySelectorAll('.close-sub-modal');
const submodalBtns = document.querySelectorAll('.viewdetail');
const subModal = document.querySelector('.sub-modal')
const modalContent = document.querySelector('.modal-content');
gridItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        modals[index].style.display = 'block';
    });
    closeModals[index].addEventListener('click', () => {
        modals[index].style.display = 'none';
    })
    window.addEventListener("click", function (event) {
        if (event.target == modals[index]) {
            modals[index].style.display = "none";
        }
    });
})
function openSub(btn) {
    const orderId = btn.getAttribute('data-id');
    console.log(orderId);
    const subModal = document.querySelector(`#sub-processed-modal-${orderId}`);
    if (subModal) {
        subModal.style.display = 'block';
        console.log(subModal);
    }
    console.log(subModal);
}

function hideSub(btn) {
    const orderId = btn.getAttribute('data-id');
    console.log(orderId);
    const subModal = document.querySelector(`#sub-processed-modal-${orderId}`);
    if (subModal) {
        subModal.style.display = 'none';
        console.log(subModal);
    }
    console.log(subModal);
}
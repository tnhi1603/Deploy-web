const products = document.querySelector('.products-container');
const product_list = document.querySelectorAll('.product-object');
let this_page = 1;
let limit = 16;


function loadProduct() {
    let begin = limit * (this_page - 1);
    let end = (limit * this_page) - 1;
    product_list.forEach((item, index) => {
        if(index >= begin && index <= end) {
            item.style.display ='block';
        } else {
            item.style.display = 'none';
        }
    })
    loadList();
}
loadProduct()
function loadList() {
    let count = Math.ceil(product_list.length/limit);
    document.querySelector('.pagination').innerHTML = "";
    for( let i=1; i <= count; i++) {
        let newPage = document.createElement("li");
        newPage.innerText = i;
        newPage.setAttribute("class", "pagination-item");
        if(i== this_page) {
            newPage.classList.add("active");
        }
        newPage.setAttribute("onclick", "changePage("+i+")");
        document.querySelector(".pagination").appendChild(newPage);
    }
   
}

function changePage(i) {
    this_page = i;
    loadProduct();
}

// change grid

const grid_list = document.querySelector('.grid-choice');
const objectIMGs = document.querySelectorAll('.object-img');
const productObjects = document.querySelectorAll('.product-object');
const grid = document.querySelector('#grid');
const feed = document.querySelector('#feed');

const counter= document.querySelector('.counter');
counter.innerHTML = productObjects.length +" "+ "items";

grid.addEventListener("click", () => {
    productObjects.forEach((product,index) => {
        product.style.width = "250px";
    })
    objectIMGs.forEach((objectIMG,index) => {
        objectIMG.style.width = "250px";
    })
   
})

feed.addEventListener("click", () => {
    productObjects.forEach((product,index) => {
        product.style.width = "320px";
    })
    objectIMGs.forEach((objectIMG,index) => {
        objectIMG.style.width = "320px";
    })
   
})
// modal
const complimentary = document.querySelector(".complimentary-modal");

function toggleModalComplimentary() {
   complimentary.addEventListener('click', () => {
    if(complimentary.classList.contains('open')) {
        complimentary.classList.remove('open');
    } else {
        complimentary.classList.add('open')
    }
   })

}
function toggleModalReturning() {
}
function toggleModalGift() {
}

// filter section

const ratioButtons = document.querySelectorAll('.ratio-btn');

ratioButtons.forEach((ratioButton, index) => {
    ratioButton.addEventListener('change', (e) =>{
        const sortBy = e.target.value;
        switch(sortBy) {
            case 'low-to-high':
                sortProductsByPriceL2H();
                break;
            case 'high-to-low':
                sortProductsByPriceH2L();      
                break; 
            default :
                break;
        }
    })
})

let price = document.querySelectorAll(".item-price");
price.forEach((item) => {
    item.innerHTML = item.innerHTML.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  
})

// Sort product elements based on price from high to low
function sortProductsByPriceH2L() {
    const container = document.querySelector('.products-container');
    const productElements = Array.from(container.children);

    const sortedProductElements = productElements.sort((a, b) => {
        const priceAElement = a.querySelector('.item-price');
        const priceBElement = b.querySelector('.item-price');
        // Check if not null or undefined
        const priceA = priceAElement ? parseFloat(priceAElement.textContent.replace(/\./g, '')) : 0;
        const priceB = priceBElement ? parseFloat(priceBElement.textContent.replace(/\./g, '')) : 0;
       
        return priceB - priceA;
    });
    productElements.forEach(element => container.removeChild(element));

    sortedProductElements.forEach(element => 
        container.appendChild(element)
    );
}

// Sort product elements based on price from low to high
function sortProductsByPriceL2H() {
    const container = document.querySelector('.products-container');
    const productElements = Array.from(container.children);

    const sortedProductElements = productElements.sort((a, b) => {
        const priceAElement = a.querySelector('.item-price');
        const priceBElement = b.querySelector('.item-price');
        // Check 
        const priceA = priceAElement ? parseFloat(priceAElement.textContent.replace(/\./g, '')) : 0;
        const priceB = priceBElement ? parseFloat(priceBElement.textContent.replace(/\./g, '')) : 0;

        return priceA - priceB;
    });
    // nếu element ở sai vị trí thì xóa
    productElements.forEach(element => container.removeChild(element));
    // sau đó sắp xếp lại, container sẽ chứa các phần tử được sắp xếp
    sortedProductElements.forEach(element => container.appendChild(element));
}

// soft from az - za
const sortNameButtons = document.querySelectorAll('.az-item');

sortNameButtons.forEach((buttonName) => {
    buttonName.addEventListener('click', (e) => {
        const sortType = buttonName.getAttribute('data-sort-type');
        sortProductsByName(sortType);
    })
})

function sortProductsByName(sortType) {
    const container = document.querySelector('.products-container');
    const productElements = Array.from(container.children);

    const sortedProductElements = productElements.sort((a, b) => {
        const firstLetterA = getFirstLetterFromName(a);
        const firstLetterB = getFirstLetterFromName(b);

        if (sortType == 'az') {
            return firstLetterA.localeCompare(firstLetterB);
        } else if (sortType == 'za') {
            return firstLetterB.localeCompare(firstLetterA);
        }

        return 0;
    });

    productElements.forEach(element => container.removeChild(element));
    sortedProductElements.forEach(element => container.appendChild(element));
}
function getFirstLetterFromName(element) {
    const nameElement = element.querySelector('.info-name');
    if (nameElement) {
        const name = nameElement.textContent.trim();
        return name.charAt(0).toUpperCase();
    } else {
        return ''; 
    }
}


// search

$(document).ready(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });
   $('#watch_search').keyup(function(){ 
    var input_watch_name = $(this).val(); 
    const suggestion = document.querySelector('#search-suggestions');

    if(input_watch_name!="") {
        // const suggestion = document.querySelector('#search-suggestions');
        // suggestion.style.display = 'flex';
        $.ajax({
            url: '/watch/search',
            method : 'post' ,
            data : {'q':input_watch_name},
            success: function (data) {
                // alert(data.data[0].name);
                for(var i =0; i< data.data.length; ++i) {
                    var watch = data.data[i];
                    const containwrapper = document.createElement('div');
                    const contain = document.createElement('a');
                    contain.setAttribute('class','suggestions-item');
                    contain.setAttribute('href','/watch/' + watch.slug);
                    contain.innerHTML = watch.name;

                    suggestion.appendChild(containwrapper);
                    containwrapper.appendChild(contain)
                }
            },
        })
    }
    else {
        suggestion.style.display = 'none';
    }
 });
})
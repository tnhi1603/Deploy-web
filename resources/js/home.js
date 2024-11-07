const products = document.querySelector('.products-container');
const product_list = document.querySelectorAll('.product-object');
let this_page = 1;
let limit = 6;


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
const feed = document.querySelector('.feed');

const counter= document.querySelector('.counter');
counter.innerHTML = productObjects.length +" "+ "items";
console.log(productObjects.length)

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

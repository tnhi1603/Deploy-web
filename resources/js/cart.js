const prices = document.querySelectorAll('.price-item');
const result = document.querySelector('.price-result');
var sum = 0;

prices.forEach(price => {
    sum += eval( price.value);
});

result.textContent = "$ " + sum;


const deleteitems = document.querySelectorAll(".close");
const cartitems = document.querySelectorAll(".cart-item");

deleteitems.forEach(deleteitem => {
    deleteitem.addEventListener('click', () => {
        alert('delete item in database');
    })
})
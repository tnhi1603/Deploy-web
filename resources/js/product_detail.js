const showbtn = document.querySelector(".show");
const textBox = document.querySelector(".text-box");

showbtn.addEventListener("click", () => {
    if(showbtn.classList.contains("less")) {
        showbtn.classList.remove("less");
        textBox.style.height = "fit-content";
        showbtn.textContent ="Show less";
    } else {
        showbtn.classList.add("less");
        textBox.style.height = "98px";
        showbtn.textContent ="Show more";
    }
})

const img = document.querySelector(".hover-img")
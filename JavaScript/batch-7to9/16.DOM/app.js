let hello_btn = document.querySelector(".hello-btn")



hello_btn.addEventListener("click", (event) => {

    console.log(event.target.innerHTML)

})
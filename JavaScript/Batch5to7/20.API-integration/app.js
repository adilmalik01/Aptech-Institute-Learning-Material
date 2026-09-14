



// console.log(products[0]);
// console.log(products[1]);
// console.log(products[2]);
// console.log(products[3]);





const callAPI = async () => {

    let response = await axios.get("https://fakestoreapi.com/products")
    createProducts(response.data)
}












function createProducts(products) {

    products.forEach((product) => {
        // console.log(product.title);    

        // document.querySelector(".title").innerHTML += product.title


        let productCard = `
     <div class="card" style="width: 18rem;">
            <img src=${product.image} class="card-img-top" height="300" alt="...">
            <div class="card-body">
                <h5 class="card-title">${product.title}</h5>
                <p class="card-text">${product.category}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    `


        document.querySelector(".main").innerHTML += productCard




    })

}




callAPI();













// for(let i = 0; i < products.length; i++){
//     console.log(products[i]);
// }



// for (const product of products) {
//         console.log(product);
// }






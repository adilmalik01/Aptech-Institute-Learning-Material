
let mainDiv = document.querySelector(".main")





const apiCall = async () => {

    let response = await axios.get("https://fakestoreapi.com/products/")
    Generate_Cards(response.data)

}




function Generate_Cards(data) {



    data.forEach((product) => {
        console.log(product);

        mainDiv.innerHTML += `
        <div class="product-card">
        <img src="${product.image}" alt="${product.title}">
    
    <div class="product-info">
        <h2>${product.title}</h2>
        <p class="category">${product.category}</p>
        <p class="description">${product.description}</p>

    <div class="price-rating">
        <span class="price">$${product.price}</span>
        <span class="rating">⭐ ${product.rating.rate} (${product.rating.count})</span>
    </div>

    <button>Add to Cart</button>
        </div>
    </div>
`;




    })






}






apiCall()
























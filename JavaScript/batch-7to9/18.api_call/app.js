



const callApi = async () =>{

    let response = await   axios.get("https://dummyjson.com/products")
    console.log(response.data.products)   
    PrintCards(response.data.products)
}










let mainDiv = document.querySelector(".main")


function PrintCards(products){

    products.forEach((product)=>{
    
        
            let cardTemp =  `
        <div class="card" style="width: 18rem;">
          <img src=${product.thumbnail} class="card-img-top" alt="...">
          <div class="card-body">
           <h5 class="card-title">${product.title}</h5>
           <p class="card-text">${product.price}</p>
           <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
    
        `
    
    
       mainDiv.innerHTML += cardTemp
    
    
    })

}



callApi()
let userInput = document.querySelector(".userInput")
let user_btn = document.querySelector(".btn")
let result_h1 = document.querySelector(".result")
let city = document.querySelector(".city")



user_btn.addEventListener("click", async () => {

    console.log(userInput.value);
    let api = `https://api.openweathermap.org/data/2.5/weather?q=${userInput.value}&appid=e0f99c494c2ce394a18cc2fd3f100543&units=metric`

    let response = await axios.get(api)

    console.log(response.data.main);

    let { temp, humidity, feels_like, grnd_level, pressure, temp_max, temp_min } = response.data.main
    result_h1.innerHTML = `${temp}°C`
    city.innerHTML = userInput.value




})
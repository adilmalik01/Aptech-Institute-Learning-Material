
let userBtn = document.getElementById('getWeatherBtn');
let cityInput = document.getElementById('cityInput');


userBtn.addEventListener('click', async function () {

    let api = `https://api.openweathermap.org/data/2.5/weather?q=${cityInput.value}&appid=e0f99c494c2ce394a18cc2fd3f100543&units=metric`;


    let response = await axios.get(api)
    console.log(response);


})















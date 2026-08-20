import axios from "axios";

const GetWeather = async (req, res) => {

    let cityName = req.body.city;


    try {
        let api = `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&appid=e0f99c494c2ce394a18cc2fd3f100543&units=metric`;
        let response = await axios.get(api)
        res.send(response.data);

    } catch (error) {
        res.status(500).send({ message: "Error fetching weather data", error: error.message });
    }

}


export { GetWeather };

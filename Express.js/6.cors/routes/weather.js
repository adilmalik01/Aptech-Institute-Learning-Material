import { Router } from "express";
import { GetWeather } from "../controller/weather.js";

const router = Router()



router.get("/weather", GetWeather)
// router.get("/weather/:city", GetWeather)

export default router;
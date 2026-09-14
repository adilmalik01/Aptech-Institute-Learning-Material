import { Router } from "express";
import { GenerateUrl, getUrl, getUrls, DeleteUrl } from "../controller/url.js";

const router = Router()



router.post("/generate-url", GenerateUrl)
router.get("/urls", getUrls)
router.get("/url", getUrl)
router.delete("/url/:code", DeleteUrl)

export default router;
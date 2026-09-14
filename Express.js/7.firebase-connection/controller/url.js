import { db } from "../config/db.js";


const GenerateUrl = async (req, res) => {

    let url = req.body.longUrl

    console.log(url);


    try {

        // Generate Url 
        let responseData = {
            originalUrl: url,
            generatedUrl: Math.random().toString(36).substring(2, 8)
        }

        let addData = await db.collection("urls").add(responseData)


        res.send({
            message: "URL generated successfully",
            data: responseData,
            doc_id: addData.id
        });

    } catch (error) {
        res.status(500).send({ message: "Error generating URL", error: error.message });
    }

}





const getUrls = async (req, res) => {


    try {

        // get Urls

        let urls = await db.collection("urls").get();

        let mapUrls = urls.docs.map((doc) => {
            return {
                id: doc.id,
                ...doc.data()
            }
        })


        res.send(mapUrls);

    } catch (error) {
        res.status(500).send({ message: "Error generating URL", error: error.message });
    }

}





const getUrl = async (req, res) => {


    let code = req.query.code
    try {

        // get Urls

        let url = await db.collection("urls").where("generatedUrl", "==", code).get();

        if (url.empty) {
            return res.status(404).send({ message: "URL not found" });
        }
        res.send(url.docs[0].data());

    } catch (error) {
        res.status(500).send({ message: "Error generating URL", error: error.message });
    }

}



const DeleteUrl = async (req, res) => {


    let code = req.params.code
    try {

        // get Urls
        let url = await db.collection("urls").where("generatedUrl", "==", code).get();

        if (url.empty) {
            return res.status(404).send({ message: "URL not found" });
        }

        await db.collection("urls").doc(url.docs[0].id).delete();

        res.send({ message: "URL deleted successfully" });


    } catch (error) {
        res.status(500).send({ message: "Error generating URL", error: error.message });
    }

}



export { GenerateUrl, getUrls, getUrl, DeleteUrl };

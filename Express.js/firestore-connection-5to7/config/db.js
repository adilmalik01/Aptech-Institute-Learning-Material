import { initializeApp, cert } from "firebase-admin/app";
import { getFirestore } from "firebase-admin/firestore";

import serviceAccount from "../serviceAcount.json" with { type: "json" };

initializeApp({
    credential: cert(serviceAccount),
});

const db = getFirestore();

const ConnectDb = async () => {
    try {
        await db.listCollections();
        console.log("✅ Connected to Firestore database successfully!");
    } catch (error) {
        console.error("❌ Error connecting to Firestore database:", error);
    }
};

export { db, ConnectDb };
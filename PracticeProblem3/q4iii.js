let mongoClient = require('mongodb').MongoClient
let url = "mongodb://localhost:27017/MongoDatabase"

mongoClient.connect(url, function(err, client){
    if(err){
        throw err
    }

    const db = client.db('IWP')
    db.collection("student").find().sort({"name": 1}).toArray(function(err, db){
        if(err){
            throw err
        }
        console.log(db)
        client.close()
    })
})
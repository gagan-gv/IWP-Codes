let mongoClient = require('mongodb').MongoClient
let url = "mongodb://localhost:27017/MongoDatabase"

mongoClient.connect(url, function(err, client){
    if(err){
        throw err
    }

    const db = client.db('IWP')
    db.collection("student").updateOne({name: "Kevin"}, {$set: {age: 25}}, function(err, db){
        if(err){
            throw err
        }
        console.log("Updated")
        client.close()
    })
})
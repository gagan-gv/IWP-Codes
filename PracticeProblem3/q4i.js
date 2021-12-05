let mongoClient = require('mongodb').MongoClient
let url = "mongodb://localhost:27017/MongoDatabase"

mongoClient.connect(url, function(err, client){
    if(err){
        throw err
    }

    let obj = {name: "Gagan Chordia", age: 20, dob: '21/06/2001', yoa: 2019}

    const db = client.db('IWP')
    db.collection("student").insertOne(obj, function(err, db){
        if(err){
            throw err
        }
        console.log("1 record inserted")
        client.close()
    })
})
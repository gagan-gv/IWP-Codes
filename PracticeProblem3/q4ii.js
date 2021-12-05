let mongoClient = require('mongodb').MongoClient
let url = "mongodb://localhost:27017/MongoDatabase"

mongoClient.connect(url, function(err, client){
    if(err){
        throw err
    }

    let obj = [
        {name: "Arjun", age: 19, dob: '12/03/2002', yoa: 2020},
        {name: "Kevin", age: 22, dob: '27/12/1999', yoa: 2017}
    ]

    const db = client.db('IWP')
    db.collection("student").insertMany(obj, function(err, db){
        if(err){
            throw err
        }
        console.log("Inserted multiple records")
        client.close()
    })
})
let db=window.indexedDB.open("school",1);

db.onsuccess=function(e){
    
};

db.onupgradeneeded=function(e){
    let thisdb=e.target.result;
    let objectstore_c=thisdb.createObjectStore("classs",{keyPath:"id",autoIncrement:true});
    objectstore_c.createIndex("class","class",{unique:true});
    let objectstore_s=thisdb.createObjectStore("student",{keyPath:"id",autoIncrement:true});
    objectstore_s.createIndex("avatar","avatar",{unique:false});
    objectstore_s.createIndex("name","name",{unique:false});
    objectstore_s.createIndex("email","email",{unique:false});
    objectstore_s.createIndex("phone","phone",{unique:false});
    objectstore_s.createIndex("address","address",{unique:false});
    objectstore_s.createIndex("class","class",{unique:false});
    objectstore_s.createIndex("textarea","textarea",{unique:false});
}

db.onerror=function(e){
    console.log("db wrong");
}
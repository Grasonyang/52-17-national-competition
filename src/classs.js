// let school=window.indexedDB.open("school",1);
// school.onsuccess=function(e){
//     let db=e.target.result;
//     function addata(data){
//         let transaction=db.transaction("classs","readwrite");
//         let objectstore=transaction.objectstore("classs");
//         objectstore.add(data);
//     }
// }

class School{
    addata(data){
        let open=window.indexedDB.open("school",1);
        open.onsuccess = (event) => {
            this.db = event.target.result;
            let transaction = this.db.transaction("classs", "readwrite");
            let objectStore = transaction.objectStore("classs");
            let request = objectStore.add(data);
        };
    }
    allschooldata(fun){
        let open=window.indexedDB.open("school",1);
        open.onsuccess = (event) => {
            this.db = event.target.result;
            let transaction = this.db.transaction("classs", "readwrite");
            let objectStore = transaction.objectStore("classs");
            let request = objectStore.getAll();
            request.onsuccess=function(e){
                let data=e.target.result;
                fun(data);
            };
        };
    }
}
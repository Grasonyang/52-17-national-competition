
class student{
    addata(data){
        let open=window.indexedDB.open("school",1);
        open.onsuccess = (event) => {
            this.db = event.target.result;
            let transaction = this.db.transaction("student", "readwrite");
            let objectStore = transaction.objectStore("student");
            let request = objectStore.add(data);
        };
    }
    allschooldata(fun){
        let open=window.indexedDB.open("school",1);
        open.onsuccess = (event) => {
            this.db = event.target.result;
            let transaction = this.db.transaction("student", "readwrite");
            let objectStore = transaction.objectStore("student");
            let request = objectStore.getAll();
            request.onsuccess=function(e){
                let data=e.target.result;
                fun(data);
            };
        };
    }
}
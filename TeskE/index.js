let school = window.indexedDB.open('school', 1);

school.onupgradeneeded = function (event) {
  let db = event.target.result;
  let classs = db.createObjectStore("class", { autoIncrement: true });
  classs.createIndex("classname", "classname", { unique: true });

  let students = db.createObjectStore("student", { autoIncrement: true });
  students.createIndex("avatar", "avatar", { unique: false });
  students.createIndex("last_name", "last_name", { unique: false });
  students.createIndex("first_name", "first_name", { unique: false });
  students.createIndex("email", "email", { unique: false }); // ','
  students.createIndex("phone", "phone", { unique: false });
  students.createIndex("address", "address", { unique: false });
  students.createIndex("classname", "classname", { unique: false });
  students.createIndex("note", "note", { unique: false });

}
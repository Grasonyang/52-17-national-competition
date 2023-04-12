$(".place").dialog({
    autoOpen:false,
    height:500,
    width:500,
});
function remove_sessionStorage_item(id){
    sessionStorage.removeItem(id);
}
function get_sessionStorage_item(id){
    return sessionStorage.getItem(id);
}
function header_set(token){
    let xhr = new XMLHttpRequest();
    xhr.open('POST',window.location.href);
    xhr.setRequestHeader('Authorization','Bearer '+token);
    xhr.send();
}
function checkopendata(token){
    if(token=="none"){
        
    }else{

    }
}
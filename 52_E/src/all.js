$("#dialog").dialog({
    autoOpen:false,
});
$(document).on('click',"#addClass",function(){
    $("#dialog").empty();
    $("#dialog").dialog("open");
    $("#dialog").append(`
        <form class="newClass">
            班級名稱:<input type="text" required name="name"><br><br>
            <button type="button" class="close">取消</button>
            <button type="button" class="submit">儲存</button>
        </form>
    `);
});
$(document).on('click',"#addStudent",function(){
    $("#dialog").empty();
    $("#dialog").dialog("open");
    $("#dialog").append(`
        <h2 class="title">建立學生</h2>
        <form class="newStudent">
            <img src="" class="avatar_preview ava" alt="未上傳"><br>
            <input type="file" placeholder="大頭貼" class="avator"><br>
            <input type="text" placeholder="姓氏" name="last_name"><br>
            <input type="text" placeholder="名字" name="first_name"><br>
            <div class="emails">
                <div class="eml">
                    <input type="email" placeholder="Email" name="email[]">
                    <button onclick="$(this).parent().remove()">刪除</button>
                </div>
                <button type="button" onclick="newth('emails')">新增</button>
            </div>
            <div class="phones">
                <div class="pho">
                    <input type="phone" placeholder="Phone" name="phone[]">
                    <button onclick="$(this).parent().remove()">刪除</button>
                </div>
                <button type="button" onclick="newth('phones')">新增</button>
            </div>
            <button type="button" class="close">取消</button>
            <button type="button" class="submit">儲存</button>
        </form>
    `);
});
$(document).on('click',".close",function(){
    $("#dialog").empty();
    $("#dialog").dialog("close");
});
$(document).on('click',".submit",function(){
    if($(this).parent()[0].className=="newClass"){
        let data={
            "class":$(".newClass [name='name']").val(),
        };
        let school=new School;
        school.addata(data);
        basicdata();
        $("#dialog").empty();
        $("#dialog").dialog("close");
    }
});

function newth(text){
    if(text=="emails"){
        $(".newStudent ."+text).prepend(`
            <div class="eml">
                <input type="email" placeholder="Email" name="email[]">
                <button onclick="$(this).parent().remove()">刪除</button>
            </div>
        `);
    }else{
        $(".newStudent ."+text).prepend(`
            <div class="pho">
                <input type="phone" placeholder="Phone" name="phone[]">
                <button onclick="$(this).parent().remove()">刪除</button>
            </div>
        `);
    }
}
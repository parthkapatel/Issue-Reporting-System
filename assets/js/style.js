
$(document).ready(function () {

    /* Add Login Data */
    $("#login").on("click", function () {
        const email = $("#LoginEmail").val();
        const password = $("#LoginPassword").val();
        $.ajax({
            url: "register.php",
            type: "POST",
            data: {
                email:email,
                password:password,
                str : "login"
            },
            cache: false,
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode === 200) {
                    console.log("done");
                    $("#login_alert").addClass("alert alert-success");
                    $("#login_alert").text(dataResult.msg);
                    $("#login_alert").show();
                    setTimeout(function(){
                        window.location.href = "/reportingSystem/dashboard/";
                        }, 1500);
                } else if (dataResult.statusCode === 201) {
                    $("#login_alert").addClass("alert alert-danger");
                    $("#login_alert").text(dataResult.msg);
                    $("#login_alert").show();
                }
            }
        });
    });

    /* Add Registration data */

    $("#register").on("click", function () {
        const first_name = $("#firstName").val();
        const last_name = $("#lastName").val();
        const contact = $("#contactNumber").val();
        const flat = $("#flatNumber").val();
        const address = $("#address").val();
        const email = $("#email").val();
        const pwd = $("#password").val();
        var v = validate(first_name, last_name, contact, flat, address, email, pwd);
        if(v){
            $.ajax({
                url: "register.php",
                type: "POST",
                data: {
                    firstName: first_name,
                    lastName: last_name,
                    contactNumber:contact,
                    flatNumber: flat,
                    address:address,
                    email:email,
                    password:pwd,
                    str : "insert"
                },
                cache: false,
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    console.log(dataResult);
                    if (dataResult.statusCode === 200 ) {
                        $("#register_alert").addClass("alert alert-success");
                        $("#register_alert").text(dataResult.msg);
                        $("#register_alert").show();
                        setTimeout(function(){
                            window.location.href = "/reportingSystem/dashboard/";
                        }, 1500);
                    } else if (dataResult.statusCode === 201) {
                        $("#register_alert").addClass("alert alert-danger");
                        $("#register_alert").text(dataResult.msg);
                        $("#register_alert").show();
                    }
                }
            });
        }
    });

    /* Add New Report Data */

    $("#report").on("click", function () {
        const email = $("#email").val();
        const name = $("#name").val();
        const contact = $("#contact").val();
        const flat = $("#flat").val();
        const title = $("#title").val();
        const desc = $("#desc").val();
        const image = $("#image").val();
        if(title !== "" && desc !== ""){
                $.ajax({
                    url: "../register.php",
                    type: "POST",
                    data: {
                        email:email,
                        name: name,
                        contact: contact,
                        flat:flat,
                        title: title,
                        desc:desc,
                        str : "insert_report"
                    },
                    cache: false,
                    success: function (dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        console.log(dataResult);
                        if (dataResult.statusCode === 200 ) {
                            $("#report_alert").addClass("alert alert-success");
                            $("#report_alert").text(dataResult.msg);
                            $("#report_alert").show();
                            setTimeout(function(){
                                window.location.href = "/reportingSystem/viewIssue/";
                            }, 1500);
                        } else if (dataResult.statusCode === 201) {
                            $("#report_alert").addClass("alert alert-danger");
                            $("#report_alert").text(dataResult.msg);
                            $("#report_alert").show();
                        }
                    }
                });
        }else{
            if(title == "")
                $("#errTitle").text("Title is Required");
            else
                $("#errTitle").text("");
            if(desc === "")
                $("#errDesc").text("Description is Required");
            else
                $("#errDesc").text("");
        }
    });

    /* change update status field */
   /* $(document).off('click','.status');
    $(document).on("click",'.status',function () {
        if($(this).data('clicked',true)) {
            let v = $(this).val();

        }
    });*/

    $(document).off('click','.feedback');
    $(document).on("click",'.feedback',function () {
        if($(this).data('clicked',true)) {
            let v = $(this).val();
            location.href = "/reportingSystem/viewIssue/detailIssue/?id="+v;
        }
    });
});


/* Validation Function */
function validate(first_name,last_name,contact,flat,address,email,pwd){
    var numbers = /^[0-9]+$/;
    let chk = true;
    if(first_name == false){
        chk = false;
        $("#errFirstname").text("First Name is required");
    }else{
        $("#errFirstname").text("");
    }
    if(last_name == false){
        chk = false;
        $("#errLastname").text("Last Name is required");
    }else{
        $("#errLastname").text("");
    }
    if(contact == false){
        chk = false;
        $("#errContact").text("Contact is required");
    }else if(!contact.match(numbers)){
        chk = false;
        $("#errContact").text("Contact Number muse be in digits");
    }else if(contact.length != 10){
        chk = false;
        $("#errContact").text("Contact number must be a 10 digits");
    }else{
        $("#errContact").text("");
    }
    if(flat == false){
        chk = false;
        $("#errFlat").text("Flat Number is required");
    }else if(!flat.match(numbers)){
        chk = false;
        $("#errFlat").text("Flat Number must be in digits");
    }else{
        $("#errFlat").text("");
    }
    if(address == false){
        chk = false;
        $("#errAddress").text("Address is required");
    }else{
        $("#errAddress").text("");
    }
    if(email == false){
        chk = false;
        $("#errEmail").text("email is required");

    }else if(email){

        $.ajax({
            url: "register.php",
            type: "POST",
            data: {
                email:email,
                str : "check"
            },
            cache: false,
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200 && dataResult.msg == 1) {
                    chk = false;
                    $("#errEmail").text("User email id is exists!");
                }else{
                    $("#errEmail").text("");
                }

            }
        });
    }else{
        $("#errEmail").text("");
    }
    if(pwd == false){
        chk = false;
        $("#errPassword").text("Password is required");
    }else{
        $("#errPassword").text("");
    }
    
    if(chk == false){
        return false;
    }else{
        return true;
    }
}

/* Get User Data For Form */
function getData(id){
    $.ajax({
        url: "../register.php",
        type: "POST",
        data: {
            email:id,
            str : "get"
        },
        cache: false,
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode === 200 ) {
                $("#email").val(dataResult.msg["email"]);
                $("#name").val(dataResult.msg["first_name"]+" "+dataResult.msg["last_name"]);
                $("#contact").val(dataResult.msg["contact"]);
                $("#flat").val(dataResult.msg["flat_number"]);
            }
        }
    });
}

/* get Reported Data */

function getReportIssueData(id){
    $.ajax({
        url: "../register.php",
        type: "POST",
        data: {
            email:id,
            str : "get_report"
        },
        cache: false,
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode === 200 ) {
                console.log(dataResult.msg);
                $("#view_tbody").html(dataResult.msg);
           }
        }
    });
}

function getDetailsReportIssueData(id){
    $.ajax({
        url: "../../register.php",
        type: "POST",
        data: {
            email:id,
            str : "get_report"
        },
        cache: false,
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode === 200 ) {
                $("#title").text(dataResult.msg["title"]);
                $("#uname").text(dataResult.msg["name"]);
                $("#contact").text(dataResult.msg["contact"]);
                $("#flat").text(dataResult.msg["flat"]);
                $("#desc").text(dataResult.msg["description"]);
                $("#view_tbody").html(dataResult.msg);
            }
        }
    });
}

/* Update Status */
function updateStatus(status,id){
    $.ajax({
        url: "../register.php",
        type: "POST",
        data: {
            id:id,
            status:status,
            str : "updateStatus"
        },
        cache: false,
        success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            if (dataResult.statusCode === 200 ) {
                $("#updatemsg").addClass("alert alert-success");
                $("#updatemsg").html(dataResult.msg);
                getReportIssueData("");
            }
        }
    });
}

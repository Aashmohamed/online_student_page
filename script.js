function signUp() {

    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("username", username.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                fname.value = "";
                lname.value = "";
                email.value = "";
                password.value = "";
                mobile.value = "";
                document.getElementById("msg").innerHTML = "";
                changeView();
            } else {
                document.getElementById("msg").innerHTML = t;
            }
        }
    }

    r.open("POST", "SignUpProcess.php", true);
    r.send(form);
}

function StudentsignIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberMe = document.getElementById("rememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "studentdashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "studentSignInProcess.php", true);
    r.send(form);
}

function teachersignIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberMe = document.getElementById("rememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "teacherdashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "teacherSignInProcess.php", true);
    r.send(form);
}

function academicofficerSignin() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberMe = document.getElementById("rememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "academicofficerdashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "academicofficerSigninProcess.php", true);
    r.send(form);
}

function adminsignIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberMe = document.getElementById("rememberMe");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rememberMe", rememberMe.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                window.location = "admindashboard.php";
            } else {
                document.getElementById("msg2").innerHTML = t;
            }
        }
    };

    r.open("POST", "adminSignInProcess.php", true);
    r.send(form);
}

var bm;

function forgotpassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alert("Verification Code Sent to Your Email. Please Check the Inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "ForgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function showPassword1() {

    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (npb.innerHTML == "Show") {

        np.type = "text";
        npb.innerHTML = "Hide";

    } else {

        np.type = "password";
        npb.innerHTML = "Show";

    }
}

function showPassword2() {

    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnpb.innerHTML == "Show") {

        rnp.type = "text";
        rnpb.innerHTML = "Hide";

    } else {

        rnp.type = "password";
        rnpb.innerHTML = "Show";

    }
}

function resetPassword() {
    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var form = new FormData();
    form.append("e", e.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                alert("Password reset success.");
                bm.hide();
            }
        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(form);

}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "home.php";
            }
        }
    };

    r.open("GET", "SignOutProcess.php", true);
    r.send();
}

function changeImage() {

    var image = document.getElementById("profileimg");
    var prev = document.getElementById("prev0");

    image.onchange = function() {

        var file0 = this.files[0];
        var url0 = window.URL.createObjectURL(file0);
        prev.src = url0;
    }
}

function pswd_addon() {

    var show_text = document.getElementById("show_text");
    var img_show = document.getElementById("img_show");
    var img_hide = document.getElementById("img_hide");

    var show = img_show.classList.toggle("d-none");
    var hide = img_hide.classList.toggle("d-none");

    if (hide == false) {

        show_text.type = "text";
        img_hide.className = "bi-eye-slash-fill";

    } else {

        show_text.type = "password";
        img_show.className = "bi-eye-fill";

    }
}

function uploadAssigment() {
    var name = document.getElementById("name");
    var assingment = document.getElementById("assignment");
    var startDate = document.getElementById("startDate");
    var endDate = document.getElementById("endDate");
    var subject = document.getElementById("subject");
    var grade = document.getElementById("grade");

    var form = new FormData();
    form.append("name", name.value);
    form.append("assignment", assingment.files[0]);
    form.append("sDate", startDate.value);
    form.append("eDate", endDate.value);
    form.append("subject", subject.value);
    form.append("grade", grade.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                alert("Assignment Uploaded SuccessFully");
                window.location.reload();
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "process/uploadAssignmentProcess.php", true);
    r.send(form);
}

function studentRegistration() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var bday = document.getElementById("bday");
    var gender = document.getElementById("gender");
    var grade = document.getElementById("grade");
    var username = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("bday", bday.value);
    form.append("gender", gender.value);
    form.append("grade", grade.value);
    form.append("email", username.value);
    form.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        text = r.responseText;
        if (r.readyState == 4) {
            if (text == "success") {
                fname.value = "";
                lname.value = "";
                bday.value = "";
                gender.value = "";
                grade.value = "";
                email.value = "";
                password.value = "";
                alert("Registration Sucessfull");
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "studentRegisterProcess.php", true);
    r.send(form);
}

function teacherRegistration() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var bday = document.getElementById("bday");
    var gender = document.getElementById("gender");
    var grade = document.getElementById("grade");
    var username = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("bday", bday.value);
    form.append("gender", gender.value);
    form.append("grade", grade.value);
    form.append("email", username.value);
    form.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        text = r.responseText;
        if (r.readyState == 4) {
            if (text == "success") {
                fname.value = "";
                lname.value = "";
                bday.value = "";
                gender.value = "";
                grade.value = "";
                email.value = "";
                password.value = "";
                alert("Registration Sucessfull");
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "teacherRegisterProcess.php", true);
    r.send(form);
}

function academicofficersRegistration() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var bday = document.getElementById("bday");
    var gender = document.getElementById("gender");
    var grade = document.getElementById("grade");
    var username = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("bday", bday.value);
    form.append("gender", gender.value);
    form.append("grade", grade.value);
    form.append("email", username.value);
    form.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        text = r.responseText;
        if (r.readyState == 4) {
            if (text == "success") {
                fname.value = "";
                lname.value = "";
                bday.value = "";
                gender.value = "";
                grade.value = "";
                email.value = "";
                password.value = "";
                alert("Registration Sucessfull");
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "academicofficersRegisterProcess.php", true);
    r.send(form);
}

function adminsRegistration() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var bday = document.getElementById("bday");
    var gender = document.getElementById("gender");
    var grade = document.getElementById("grade");
    var username = document.getElementById("email");
    var password = document.getElementById("password");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("bday", bday.value);
    form.append("gender", gender.value);
    form.append("grade", grade.value);
    form.append("email", username.value);
    form.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        text = r.responseText;
        if (r.readyState == 4) {
            if (text == "success") {
                fname.value = "";
                lname.value = "";
                bday.value = "";
                gender.value = "";
                grade.value = "";
                email.value = "";
                password.value = "";
                alert("Registration Sucessfull");
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "academicofficersRegisterProcess.php", true);
    r.send(form);
}

function uploadAnswer(aid) {
    var assingment = document.getElementById("assignment");

    var form = new FormData();

    form.append("aid", aid);
    form.append("as", assingment.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                alert("Assignment Uploaded SuccessFully");
                window.location.reload();
            } else {
                alert(text);
            }
        }
    };
    r.open("POST", "uploadAnswerProcess.php", true);
    r.send(form);
}
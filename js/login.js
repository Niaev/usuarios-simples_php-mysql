document.addEventListener("DOMContentLoaded", function() {

    var usu = document.querySelector("#usu");
    var pass = document.querySelector("#pass");
    var btn = document.querySelector("#btn");
    var invalid = document.querySelector("#invalid");
    var redirect = document.querySelector("#redirect");

    btn.addEventListener("click", function() {
        var dados = `usu=${usu.value}&pass=${pass.value}`;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "back/valida-login.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        
        xhr.addEventListener("load", function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText != "T") {
                    redirect.style.display = "none";
                    invalid.style.display = "block";
                } else {
                    invalid.style.display = "none";
                    redirect.style.display = "block";

                    window.location = "index.php";
                }
            }
        });
        
        xhr.send(dados);
    });
});
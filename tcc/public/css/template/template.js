function desbloqueiaSubMenu() {
    $(document).ready(function () {
        $("#pai1").keydown(function (e) {
            document.getElementById("children2").style.display = "none";
            document.getElementById("children1").style.display = "block";
            $("#promocoesSemanali").focusout(function () {
                document.getElementById("children1").style.display = "none";
            });
        });

        $("#pai2").keydown(function (e) {
            //limitar por enter ou espaço
            document.getElementById("children1").style.display = "none";
            document.getElementById("children2").style.display = "block";
            $("#faleConoscoli").focusout(function () {
                document.getElementById("children2").style.display = "none";
            });
        });
        $("#pai1").hover(function (e) {
            document.getElementById("children2").style.display = "none";
            document.getElementById("children1").style.display = "block";
        });
        $("#pai1").mouseleave(function () {
            document.getElementById("children1").style.display = "none";
        });
        
        $("#pai2").hover(function (e) {
            document.getElementById("children1").style.display = "none";
            document.getElementById("children2").style.display = "block";           
        });
         $("#pai2").mouseleave(function () {
                document.getElementById("children2").style.display = "none";
            });


    });
}


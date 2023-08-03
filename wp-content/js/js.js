$(document).ready(function(){

    editor.getSession().setMode("ace/mode/javascript");

    // Fungsi yang akan dijalankan saat isi dari editor diubah
    editor.getSession().on("change", function() {             
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("ace/mode/pascal");

        let value = editor.getValue();

        console.log(value);

        if(value == ''){
            editor.getValue('')
            $(".isi").load(location.href+" .isi>*","");
        }else{
            $(".isi").load('functions/eksekusi.php?code=' + encodeURIComponent(value));
        }
    });

});


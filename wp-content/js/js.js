$(document).ready(function(){

    $('.eksekusi').on('click', function(){        
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("ace/mode/pascal");

        let value = editor.getValue();

        console.log(value);

        if(value == ''){
            $(".reset").load(location.href+" .reset>*","");
        }else{
            $(".isi").load('functions/eksekusi.php?code=' + encodeURIComponent(value));
        }
    });

});


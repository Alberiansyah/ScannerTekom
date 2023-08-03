$(document).ready(function(){    

    editor.getSession().setMode("ace/mode/javascript");

    // Fungsi yang akan dijalankan saat isi dari editor diubah
    editor.getSession().on("change", function() {             
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("ace/mode/pascal");

        let value = editor.getValue();
        if(value == ''){
            editor.getValue('')
            $(".isi").load(location.href+" .isi>*","");
        }else{
            $(".isi").load('functions/eksekusi.php?code=' + encodeURIComponent(value));
        }
    });

    $(document).on("click", ".hasilToken", function() {
        let hasilToken = $(this).text();
        $(this).toggleClass("bg-warning");
        let tokenNan = hasilToken.replace(/\d/g, '')
        let tokenNama = tokenNan.replace(/[:\s]/g, '')
        var tokenToHighlight = tokenNama;
          
        // Mencari semua elemen dengan class "highlightable" yang berisi teks yang sesuai
        $(".highlightable:contains('" + tokenToHighlight + "')").each(function() {
            $(this).toggleClass("bg-warning"); 
        });
    });

});


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="path/to/ace.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.css" type="text/css" />
</head>


<body>
    <div id="editor" style="height: 300px; width: 100%;"></div>
    <button onclick="executeCode()">Execute</button>
    <button onclick="copyCode()">Copy Code</button>

</body>
<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.js"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/pascal");

    var initialCode = `program HelloWorld;
begin
  writeln('Hello, World!');
end.`;

    editor.setValue(initialCode);
</script>

<script>
    function executeCode() {
        var code = editor.getValue();
        // Lakukan sesuatu dengan kode Pascal, misalnya kirim ke server untuk dieksekusi di sana.
    }

    function copyCode() {
        var code = editor.getValue();
        navigator.clipboard.writeText(code).then(
            function() {
                alert("Kode berhasil disalin!");
            },
            function() {
                alert("Gagal menyalin kode.");
            }
        );
    }
</script>

</html>
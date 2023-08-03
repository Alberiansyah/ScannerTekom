<?php require __DIR__ . "/functions/function.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pascal Scanner</title>
    <link rel="stylesheet" href="wp-content/css/prism.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.css" type="text/css" />
</head>

<body>
    <div class="container">
        <h1>Pascal Scanner Output</h1>

        <div class="row">

            <div class="col-12">
                <div class="reset">
                    <div id="editor" style="height: 300px; width: 100%;"></div><br>
                </div>

                <div class="isi">
                    <div class="col-12">
                        <table class="table table-hover table-responsive">
                            <tr>
                                <th>Token Tipe</th>
                                <th>Token Value</th>
                                <th>Token Name</th>
                            </tr>
                            <?php foreach ($tokenContainer as $token) :
                                $type = $token['type'];
                                $value = htmlspecialchars($token['value']);
                                $name = htmlspecialchars($token['name']);
                            ?>
                                <tr>
                                    <td class="type text-primary"><?= strtoupper($type) ?></td>
                                    <td class="value text-success"><?= $value ?></td>
                                    <?php if (!empty($name)) : ?>
                                        <td class="name text-danger"><?= $name ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>


        </div>

</body>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.js"></script>
<script src="wp-content/js/js.js"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/pascal");

    var initialCode = ``;

    editor.setValue(initialCode);
</script>

</html>
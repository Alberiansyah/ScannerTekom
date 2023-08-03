<?php require __DIR__ . "/functions/function.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pascal Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Pascal Scanner Output</h1>

        <div class="row">

            <form method="post">
                <textarea class="form-control" name="pascalCode"></textarea>
                <br>
                <input class="btn btn-success" type="submit" value="Scan">
            </form>

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

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>
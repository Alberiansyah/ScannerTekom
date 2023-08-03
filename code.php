<!DOCTYPE html>
<html>

<head>
    <title>Pascal Code</title>
    <link rel="stylesheet" href="wp-content/css/prism.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.css" type="text/css" />
    <link rel="stylesheet" href="wp-content/css/css.css?v=<?= time() ?>">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Pascal Scanner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="index.php">Scanner</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active"  aria-current="page" href="code.php">Code</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- navbar penutup -->

    <div class="container pt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Menghitung Persegi</b></h5>
                <p class="card-text">
                    program HitungPersegi; <br>
                    uses crt; <br>

                    var <br>
                    sisi, luas, keliling: real; <br>

                    begin<br>
                    write('Masukkan panjang sisi persegi: ');<br>
                    readln(sisi);<br>

                    luas := sisi * sisi;<br>
                    keliling := 4 * sisi;<br>

                    writeln('Luas persegi: ', luas:0:2);<br>
                    writeln('Keliling persegi: ', keliling:0:2);<br>

                    readln;<br>
                    end.<br>
                </p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Menghitung Segitiga</b></h5>
                <p class="card-text">
                program HitungSegitiga;  <br>
                uses crt;<br>

                var<br>
                alas, tinggi, sisiA, sisiB, sisiC, luas, keliling: integer;<br>

                begin <br>

                write('Masukkan panjang alas segitiga: ');<br>
                readln(alas);<br>
                write('Masukkan tinggi segitiga: ');<br>
                readln(tinggi);<br>


                write('Masukkan panjang sisi A segitiga: ');<br>
                readln(sisiA);<br>
                write('Masukkan panjang sisi B segitiga: ');<br>
                readln(sisiB);<br>
                write('Masukkan panjang sisi C segitiga: ');<br>
                readln(sisiC);<br>

                luas := 0.5 * alas * tinggi;<br>
                keliling := sisiA + sisiB + sisiC;<br>

                writeln('Luas segitiga: ', luas);<br>
                writeln('Keliling segitiga: ', keliling);<br>

                readln;<br>
                end.<br>

                </p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><b>Menghitung Balok</b></h5>
                <p class="card-text">
                program HitungBalok; <br>
                uses crt; <br>

                var <br>
                panjang, lebar, tinggi, volume, luas_permukaan: real;<br>

                begin <br>

                write('Masukkan panjang balok: ');<br>
                readln(panjang);<br>
                write('Masukkan lebar balok: ');<br>
                readln(lebar);<br>
                write('Masukkan tinggi balok: ');<br>
                readln(tinggi);<br>


                volume := panjang * lebar * tinggi;<br>
                luas_permukaan := 2 * (panjang * lebar + panjang * tinggi + lebar * tinggi);<br>

                writeln('Volume balok: ', volume:0:2); <br>
                writeln('Luas permukaan balok: ', luas_permukaan:0:2);<br>

                readln;<br>
                end.<br>

                </p>
            </div>
            </div>
        </div>
    </div>

</body>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.js"></script>
<script src="wp-content/js/js.js?v=<?= time() ?>"></script>


</html>
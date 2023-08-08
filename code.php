<!DOCTYPE html>
<html>

<head>
    <title>Pascal Code</title>
    <link rel="stylesheet" href="wp-content/css/prism.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.27.0/themes/prism.min.css" />
    <link rel="stylesheet" href="wp-content/css/css.css?v=<?= time() ?>">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Pascal Scanner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Scanner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="code.php">Code</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar penutup -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Menghitung Persegi</b></h5>
                        <pre>
    <code class="language-pascal">
program HitungPersegi;
uses crt;
var
    sisi, luas, keliling: real;
begin
    write('Masukkan panjang sisi persegi: ');
    readln(sisi);
    luas := sisi * sisi;
    keliling := 4 * sisi;
    writeln('Luas persegi: ', luas:0:2);
    writeln('Keliling persegi: ', keliling:0:2);
    readln;
end.
    </code>
</pre>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Menghitung Segitiga</b></h5>
                        <pre>
    <code class="language-pascal">
program HitungSegitiga;
uses crt;
var
    alas, tinggi, sisiA, sisiB, sisiC, luas, keliling: integer;
begin
    write('Masukkan panjang alas segitiga: ');
    readln(alas);
    write('Masukkan tinggi segitiga: ');
    readln(tinggi);
    write('Masukkan panjang sisi A segitiga: ');
    readln(sisiA);
    write('Masukkan panjang sisi B segitiga: ');
    readln(sisiB);
    write('Masukkan panjang sisi C segitiga: ');
    readln(sisiC);
    luas := 0.5 * alas * tinggi;
    keliling := sisiA + sisiB + sisiC;
    writeln('Luas segitiga: ', luas);
    writeln('Keliling segitiga: ', keliling);
    readln;
end.
    </code>
</pre>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><b>Menghitung Balok</b></h5>
                        <pre>
    <code class="language-pascal">
program HitungBalok;
uses crt;
var
    panjang, lebar, tinggi, volume, luas_permukaan: real;
begin
    write('Masukkan panjang balok: ');
    readln(panjang);
    write('Masukkan lebar balok: ');
    readln(lebar);
    write('Masukkan tinggi balok: ');
    readln(tinggi);
    volume := panjang * lebar * tinggi;
    luas_permukaan := 2 * (panjang * lebar + panjang * tinggi + lebar * tinggi);
    writeln('Volume balok: ', volume:0:2);
    writeln('Luas permukaan balok: ', luas_permukaan:0:2);
    readln;
end.
    </code>
</pre>
                    </div>
                </div>
            </div>
        </div>

</body>
<!-- <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/ace.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.27.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.27.0/components/prism-pascal.min.js"></script>
<script src="wp-content/js/js.js?v=<?= time() ?>"></script>


</html>
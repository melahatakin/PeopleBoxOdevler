<?php
function DonusmeURL($baslik) {
    // Boşlukları tire ile değiştirme işlemi yapıldı.
    $url = str_replace(' ', '-', $baslik);
    // Türkçe karakterleri değiştirme için kullanılan fonksiyon.
    $url = str_replace(
        ['ç', 'ğ', 'ı', 'ö', 'ş', 'ü', 'Ç', 'Ğ', 'İ', 'Ö', 'Ş', 'Ü'],
        ['c', 'g', 'i', 'o', 's', 'u', 'C', 'G', 'I', 'O', 'S', 'U'],
        $url
    );
    //karakterleri temizle işlemi.
    $url = preg_replace(
        ['/[^A-Za-z0-9\-]/','/-+/'],
        ['','-'],
        $url
    );
    // Küçük harfe dönüştürme işlemi.
    $url = strtolower($url);
    return $url;
}
function AcıklamaKisitlama($aciklama){
    $aciklama = substr($aciklama, 0, 50) . "...";
    return $aciklama;
}


//başlık adında sabit oluşturma yapıldı ve buna isim atandı.
define("baslik", "Film İsimleri");

$kategori = array("Macera","Dram","Komedi","Korku");
array_push($kategori,"Fantastik");
sort($kategori);
//aciklama kısmında ucfirst ile ilk harfi büyütüyoruz ve strlower ile diğer harfleri küçük hale çeviriyoruz.
$filmler = array(
    "1" => array(
        "baslik" => "Paper Lives",
        "aciklama" => ucfirst(strtolower("kağıt toplayarak geçinen ve sağlığı giderek kötüleşen Mehmet terk edilmiş bir çocuk bulur. Birden hayatına giren küçük Ali, onu kendi çocukluğuyla yüzleştirecektir. (18 yaş ve üzeri için uygundur)")),
        "resim" => "1.jpeg",
        "yorumSayisi" => "Yorum: 55",
        "begeniSayisi" => "Beğeni: 85",
        "vizyon" => "Viyonda: Evet"
    ),
    "2" => array(
        "baslik" => "Walking Dead",
        "aciklama" => ucfirst(strtolower("zombi kıyametinin ardından hayatta kalanlar, birlikte verdikleri ölüm kalım mücadelesinde insanlığa karşı duydukları umuda tutunur.")),
        "resim" => "2.jpeg",
        "yorumSayisi" => "Yorum: 55",
        "begeniSayisi" => "Beğeni: 85",
        "vizyon" => "Viyonda: Evet"
    )
);

$yeni_film = array(
    "baslik" => "Lucifer",
    "aciklama" => ucfirst(strtolower("zombi kıyametinin ardından hayatta kalanlar, birlikte verdikleri ölüm kalım mücadelesinde insanlığa karşı duydukları umuda tutunur.")),
    "resim" => "3.jpeg",
    "yorumSayisi" => "Yorum: 55",
    "begeniSayisi" => "Beğeni: 85",
    "vizyon" => "Viyonda: Evet"
);

$filmler["0"] = $yeni_film;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container my-3">
        <div class="row">
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item"><?php echo $kategori[0]?></li>
                    <li class="list-group-item"><?php echo $kategori[1]?></li>
                    <li class="list-group-item"><?php echo $kategori[2]?></li>
                    <li class="list-group-item"><?php echo $kategori[3]?></li>
                    <li class="list-group-item"><?php echo $kategori[4]?></li>
                </ul>
            </div>
            <div class="col-9">
                <!-- baslik sabitini kullandığımız kısım. -->
                <h1><?php echo baslik; ?></h1> 
                <div class="card mb-3">
                    <div class="row">

                        <div class="col-3">
                            <?php echo
                            "<img class=\"img-fluid\" src=\"img/{$filmler["1"]["resim"]}\">" ?>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <!-- url fonksiyonunu kullandığımız ve oluşturduğumuz kısım -->
                            <a href="<?php echo donusmeURL($filmler["1"]["baslik"]); ?>.html" class="text-decoration-none text-dark">
                                <h5 class="card-title"><?php echo $filmler["1"]["baslik"]?></h5>
                                <p class="card-text">
                                    <!-- açıklama kısaltma için oluşturduğumuz fonksiyonu kullandığımız kısım. -->
                                <?php echo AcıklamaKisitlama($filmler["1"]["aciklama"])?>
                                </p>
                                <div>
                                    <span class="badge bg-success">Yapım Tarihi: 03.12.2021</span>
                                    <span class="badge bg-success"><?php echo $filmler["1"]["yorumSayisi"]?></span>
                                    <span class="badge bg-success"><?php echo $filmler["1"]["begeniSayisi"]?></span>
                                    <span class="badge bg-success"><?php echo $filmler["1"]["vizyon"]?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-3">
                        <?php echo
                            "<img class=\"img-fluid\" src=\"img/{$filmler["2"]["resim"]}\">" ?>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <!-- url fonksiyonunu kullandığımız ve oluşturduğumuz kısım -->
                            <a href="<?php echo donusmeURL($filmler["2"]["baslik"]); ?>.html" class="text-decoration-none text-dark">
                                <h5 class="card-title"><?php echo $filmler["2"]["baslik"]?></h5>
                                <p class="card-text">
                                    <!-- açıklama kısaltma için oluşturduğumuz fonksiyonu kullandığımız kısım. -->
                                <?php echo  AcıklamaKisitlama($filmler["2"]["aciklama"])?>
                                </p>
                                <div>
                                    <span class="badge bg-success">Yapım Tarihi: 03.12.2021</span>
                                    <span class="badge bg-success"><?php echo $filmler["2"]["yorumSayisi"]?></span>
                                    <span class="badge bg-success"><?php echo $filmler["2"]["begeniSayisi"]?></span>
                                    <span class="badge bg-success"><?php echo $filmler["2"]["vizyon"]?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-3">
                        <?php echo
                            "<img class=\"img-fluid\" src=\"img/{$filmler["0"]["resim"]}\">" ?>
                        </div>
                        <div class="col-9">
                            <div class="card-body">
                                <!-- url fonksiyonunu kullandığımız ve oluşturduğumuz kısım -->
                            <a href="<?php echo donusmeURL($filmler["0"]["baslik"]); ?>.html" class="text-decoration-none text-dark">
                                <h5 class="card-title"><?php echo $filmler["0"]["baslik"]?></h5>
                                <p class="card-text">
                                     <!-- açıklama kısaltma için oluşturduğumuz fonksiyonu kullandığımız kısım. -->
                                <?php echo AcıklamaKisitlama($filmler["0"]["aciklama"])?>
                                </p>
                                <div>
                                    <span class="badge bg-success">Yapım Tarihi: 03.12.2021</span>
                                    <span class="badge bg-success"><?php echo $filmler["0"]["yorumSayisi"]?></span>
                                    <span class="badge bg-success"><?php echo $filmler["0"]["begeniSayisi"]?></span>
                                    <span class="badge bg-success"><?php echo $filmler["0"]["vizyon"]?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
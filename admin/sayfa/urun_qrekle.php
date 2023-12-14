<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL . 'index.php?sayfa=404')) : null;

function urunler()
{
    global $db;
    $sorgulaxx = $db->query("SELECT * FROM urunler WHERE urun_durum=1");
    foreach ($sorgulaxx as $itemxx) {
        echo '<option value="' . $itemxx["urun_id"] . '">' . $itemxx['urun_adi'] . '</option>';
    }
}


if ($_POST) {
    $q = $db->prepare("SELECT * FROM ayarlar WHERE ayar_id=1");
    $q->execute();
    $config = $q->fetch();


    $no = $_POST['product'];
    $count = $_POST['count'];
    $party = $_POST['party'];
    $seribaslangis = $_POST['seribaslangis'];
     $seribitis = $_POST['seribitis'];

    $partytitle = substr(md5(rand()), 0, 7) ."_".$party;

    $salonadicas = $db->query("SELECT * FROM urunler WHERE urun_id = '$no' ")->fetch(PDO::FETCH_ASSOC);
$nox = $salonadicas["urun_icerik"];
$qr_okuyucu = $salonadicas["qr_okuyucu"];
    $salonadi = $db->query("SELECT * FROM salonlar WHERE kategori_id = '$nox' ")->fetch(PDO::FETCH_ASSOC);
    $BiletSalonAdi = $salonadi["kategori_adi"];
    $sorgula = $db->query("SELECT * FROM koltuklar WHERE urun_kategori = '$nox' ");
    foreach ($sorgula as $item) {
    $randomKoltukkategori = $item["urun_tam_icerik"];
    $randomKoltukalan = $item["urun_link"];
    $randomKoltuksira = $item["urun_adi"];
    $randomKoltukno = $item["urun_icerik"]; 
    $randomcode = generateRandomString(); 
    $qr = "https://chart.googleapis.com/chart?chs=530x530&cht=qr&chl=" . $config['site_url'] . NFTBILET.$randomcode."/" . $no;
    $partyserirandom = sprintf("%05s",rand($seribaslangis,$seribitis));
    $sorgula = $db->prepare("select * from qr_codes where partyseri=? and qr_party=?");
    $sorgula->execute(array($partyserirandom , $partytitle));
    $ss = $sorgula->rowCount();

 
  

      $partyseri = $partyserirandom;
        $olustur = $db->prepare('INSERT into qr_codes set qr_url=?,qr_random=?, qr_product=?, qr_party=?, qr_createdAt=?, partyseri=? , qr_musteri_name=? , qr_musteri_telno=? , qr_musteri_email=? , qr_musteri_tc=? , qr_salon=?, qr_okuyucu=?');
        $insert = $olustur->execute([$qr, $randomcode, $no, $partytitle, date('Y-m-d H:i:s'), $partyseri, $BiletSalonAdi, $randomKoltukkategori, $randomKoltukalan, $randomKoltuksira, $randomKoltukno,$qr_okuyucu]);
        $i++;
   



    
}


    if ($insert) {
        $olustur = $db->prepare('INSERT into qr_parties set party_product=?,party_title=?');
        $x = $olustur->execute([$no, $partytitle]);
        if ($x) {
$update = $db->query("UPDATE urunler SET urun_durum=8888 WHERE urun_id='$no'");
            $update->rowCount();

            ?>
<script type="text/javascript">
 $(document).ready(function() { 

    alert("Başarılı bir şekilde biletler üretildi");
    });
</script>
            <?php
        } else { ?>
        <script>
         $(document).ready(function() {   alert("Bilet Oluşturulamadı");   });
        </script>
      <?php  }
    } else {
      ?>
        <script>
             $(document).ready(function() {   alert("Bilet Oluşturulamadı2");   });
        </script>
      <?php
    }
}

?>



<style type="text/css">
    .card-body {
        padding: 0pc 1.5pc;
    }
</style>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Yeni QR Bilet Yönetimi</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Anasayfa</a>
                            </li>
                            <li class="breadcrumb-item"><a href="index.php?sayfa=urunler">Ürünler</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Yeni QR Bilet İşlemi</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <p> QR Bilet Oluştur</p>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <form action="" method="post">
                                               <!-- <div class="form-group">
                                                    <label>Miktar</label>
                                                    <input type="number" name="count" class="form-control" placeholder="" id="">
                                                </div>-->
                                                <div class="form-group">
                                                    <label>Parti No</label>
                                                    <input type="text" name="party" class="form-control" placeholder="" id="">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Seri No Başlangıç</label>
                                                    <input type="text" name="seribaslangis" class="form-control" placeholder="" id="">
                                                </div>
                                                 <div class="form-group">
                                                    <label>Seri No Bitiş</label>
                                                    <input type="text" name="seribitis" class="form-control" placeholder="" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Etkinlik Seç</label>
                                                    <select name="product" class="form-control" id="">
                                                        <?php urunler(); ?>
                                                    </select>
                                                </div>

                                                <button class="btn btn-primary mt-2 mb-2" type="submit">Oluştur</button>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>




</div>

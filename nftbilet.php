<?php
## Ayar dosyasını çekiyoruz.
require_once 'admin/host/a.php';
if (@$_GET['c'] || @$_GET['id']) {
$query = $db->prepare("SELECT * FROM qr_codes where qr_random=:c and qr_product=:id");
$query->execute(array('c' => $_GET['c'], 'id' => $_GET['id']));
$result = $query->fetch(PDO::FETCH_ASSOC);
$x = $db->prepare("SELECT * FROM urunler where urun_id=" . $_GET['id']);
$x->execute();
$product = $x->fetch(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
    <head>
        <title><?php echo $ayar['site_title']; ?></title>
        <?php include_once(TEMA_INC."inc/head.php"); ?>
        <style type="text/css">
        .horizontal-menu .navbar.header-navbar .navbar-container {height: 60px;}.horizontal-layout.navbar-floating:not(.blank-page) .app-content {padding: calc(0rem + 2.45rem* 2 + 1.3rem) 2rem 0 2rem;}
        
        </style>
    </head>
    <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col=""  style="background-attachment: fixed;background-image: url(<?php echo URL; ?>images/arkaplan.jpg); background-repeat: no-repeat; background-size: cover;">
        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
            <?php include_once(TEMA_INC."inc/navx.php"); ?>
        </nav>
        <!-- END: Header-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                
                <div class="content-body">
                    <!-- Horizontal Wizard -->
                    <section id="basic-input">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            
                                            <div class="mb-1 col-md-12">
                                                <?php
                                                ob_start();
                                                $uretilen_tohumturu = $product["urun_tam_icerik"];
                                                $randomKoltukkategori = $product["urun_link"];
                                                $uretilen_tohumreferans = $product["en_urun_adi"];
                                                $uretilen_dateseating = $product["en_urun_icerik"];
                                                $sertifi_adet = $product["urun_icerik"];
                                                $uretilen_count = $product["ar_urun_icerik"];
                                                $randomcode = $result['partyseri'];
                                                $sertifi_tarih = $product["fa_urun_icerik"];
                                                    $salonid = $sertifi_adet;
    $salonadi = $db->query("SELECT * FROM salonlar WHERE kategori_id = '$salonid' ")->fetch(PDO::FETCH_ASSOC);
    $randomKoltuk = $db->query("SELECT * FROM koltuklar WHERE urun_kategori = '$salonid' ")->fetch(PDO::FETCH_ASSOC);
    $randomsalonadikategori = $salonadi["kategori_adi"];
    $randomKoltukkategori = $randomKoltuk["urun_tam_icerik"];
    $randomKoltukalan = $randomKoltuk["urun_link"];
    $randomKoltuksira = $randomKoltuk["urun_adi"];
    $randomKoltukno = $randomKoltuk["urun_icerik"];
                                                $resim_onad = $product["en_urun_tam_icerik"]."_";
                                                $imgfff = URL.'images/urunler/big/'.$product["urun_resim"];
                                                $qrres = $result["qr_url"];
                                                $fontfile= __DIR__.'/verdana.ttf';
                                                $randNamex   = substr(base64_encode(uniqid(true)),0,20);
                                                $newName    = str_replace("=","",$randNamex);
                                                $newName    = $resim_onad.$newName;
                                                $resimadixyz = "sertifika/".$newName.".jpg";
                                                $im = imagecreatefrompng($imgfff);
                                                $imxxx = imagecreatefrompng($qrres);
                                                $beyaz=ImageColorAllocate($im,0,0,0);
                                            $one = mb_convert_encoding($uretilen_tohumturu, "UTF-8", "auto");
                                    $two = mb_convert_encoding($randomKoltukkategori, "UTF-8", "auto");
                                    $tree = mb_convert_encoding($uretilen_tohumreferans, "UTF-8", "auto");
                                    $four = mb_convert_encoding($randomsalonadikategori, "UTF-8", "auto");
                                    $five = mb_convert_encoding($uretilen_dateseating, "UTF-8", "auto");
                                    $six = mb_convert_encoding($randomKoltukalan, "UTF-8", "auto");
                                    $seven = mb_convert_encoding($randomKoltuksira, "UTF-8", "auto");
                                    $eitxs = mb_convert_encoding($randomKoltukno, "UTF-8", "auto");
                                        imagettftext($im, 110, 0, 50, 260, $beyaz, $fontfile, $one);
                                    imagettftext($im, 58, 0, 2680, 220, $beyaz, $fontfile, $two);
                                    imagettftext($im, 58, 0, 3505, 220, $beyaz, $fontfile, $tree);
                                    imagettftext($im, 58, 0, 2680, 450, $beyaz, $fontfile, $four);
                                    imagettftext($im, 58, 0, 3520, 450, $beyaz, $fontfile, $five);
                                    imagettftext($im, 58, 0, 2680, 720, $beyaz, $fontfile, $six);
                                    imagettftext($im, 58, 0, 3150, 720, $beyaz, $fontfile, $seven);
                                    imagettftext($im, 58, 0, 3605, 720, $beyaz, $fontfile, $eitxs);
                                                imagecopymerge($im, $imxxx, 3395, 900, 0, 0, 510, 510, 100);
                                                imagejpeg($im, $resimadixyz);
                                                ?>
                                                <div class="offset-md-1 col-md-9 mb-1">
                                                    <img src="<?php echo URL.$resimadixyz; ?>" class="img-fluid">
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            <div class=" col-md-12">

                                                <center>
                                                        <?php 
                                                            if(isset($_POST["bileti_onayla"])){
                                                                $updates = $db->prepare("UPDATE qr_codes SET bilet_durum = ? WHERE qr_id=?");
                                                                $okupdates = $updates->execute(array(2,$result["qr_id"]));
                                                                if($okupdates){
                                                                      echo '<div>
                                                             <script src="'.URL.TEMA_INC.'tema-assets/alert.js"></script>
                                                            <script type="text/javascript">swal.fire("Başarılı!", "Bilet Onaylandı!", "success");
                                                            </script>
                                                            </div>';
                                                                   header("refresh:3;url=".URL."nftbilet/".$result["qr_random"]."/".$result["qr_product"]."");
                                                                }
                                                            }

                                                         ?>

                                                    <form method="POST">
                                                <?php 
                                                     if ($_SESSION['alt_uye_yetkialan_bes'] == "on") {
                                                        if($result["qr_okuyucu"] == "on"){
                                                     if($result["bilet_durum"] == 1){
                                                     

                                                        ?>
                                                        <button class="btn btn-success btn-lg me-1 mt-2" name="bileti_onayla" type="submit"><i class="fas fa-share-alt"></i> Bileti Onayla</button>
                                                        <?php
                                                    
                                                }else{
                                                        ?>
                                                        <a class="btn btn-danger btn-lg me-1 mt-2" href="#" download><i class="fas fa-share-alt"></i> Bileti Onaylandı</a>
                                                        <?php
                                                    }
                                                    }
                                                }
                                                 ?>
                                                 </form>
                                                <a class="btn btn-primary btn-lg me-1 mt-2" href="<?php echo URL.$resimadixyz; ?>" download><i class="fas fa-share-alt"></i> Bileti İndir</a>
                                                </center>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        <!-- BEGIN: Footer-->
     <footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <center><span class=" d-block d-md-inline-block mt-25">
            Copyright &copy; 2022<a class="ms-25" href="https://www.qoomed.com" target="_blank">QOOMED</a>
            <span class="d-none d-sm-inline-block"> All rights Reserved</span>
        </span>
    </center>
    </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
        <!-- END: Footer-->
        <?php include_once(TEMA_INC."inc/sc.php");?>
    </body>
</html>
<?php } ?>
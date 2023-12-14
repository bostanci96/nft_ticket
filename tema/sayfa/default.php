<div class="content-body">
    <!-- Horizontal Wizard -->
       <?php if($uyeRow["uye_rutbe"]==1): ?><div class="col-12">
                            <div class="mb-1">
                        <div class="alert alert-success" role="alert" style="background-color: #d4f4e2!important;">
                                            <h4 class="alert-heading"><?php echo $bloklar["sozlesme_alert_baslik3"]; ?></h4>
                                            <div class="alert-body"><b><?php echo $uyeRow["uye_soz_onay"]; ?></b> <?php echo $bloklar["sozlesme_alert_desc3"]; ?> <b><?php echo $uyeRow["uye_soz_bitis"]; ?></b></div>
                                        </div>
                                    </div>
                                </div>
                                   <?php endif; ?>
    <section class="horizontal-wizard">
       

        <div class="row">
            
          

            <?php if ($_SESSION['uye_rutbexxxxx']==8888888) { ?> <div class="row">
            <?php if($uyeRow["uye_rutbe"]==1): ?>
            <div class="mb-5 mt-5 col-md-12">
                <center>
               <?php if ($_SESSION['alt_uye_yetkialan_bir']) { ?>  <button onclick="location.href='<?php echo URL;?>create-certificate-two/'" class="btn btn-primary btn-lg me-1"><?php echo $bloklar["profile_sertifika_button"]; ?></button>  <?php    } ?>
              <?php if ($_SESSION['alt_uye_yetkialan_iki']) { ?>  <button onclick="location.href='<?php echo URL;?>create-certificate-transfer/'" class="btn btn-primary btn-lg me-1"><?php echo $bloklar["profile_sertifika_button_two"]; ?></button>  <?php    } ?>
                </center>
            </div>
        <?php endif; ?>
            </div>
        <?php }else{ ?>
<?php if($uyeRow["uye_rutbe"]==1): ?>
            <div class="mb-5 mt-5 col-md-12">
                <center>
                <button onclick="location.href='<?php echo URL;?>create-certificate-two/'" class="btn btn-primary btn-lg me-1"><?php echo $bloklar["profile_sertifika_button"]; ?></button>
                <button onclick="location.href='<?php echo URL;?>create-certificate-transfer/'" class="btn btn-primary btn-lg me-1"><?php echo $bloklar["profile_sertifika_button_two"]; ?></button>
                </center>
            </div>
        <?php endif; ?>
     <?php    } ?>
       </div>
            
        </section>
        <!-- /Horizontal Wizard -->
    </div>
      <?php if($uyeRow["uye_rutbe"]==1): ?>
    <section class="app-user-list">
        <div class="row">
            <?php
            $uyeQuery = $db->query("SELECT * FROM  sertifikalar WHERE sertifi_uye_id={$_SESSION['uye_id']} ");
            if($uyeQuery->rowCount()){
            foreach($uyeQuery as $uyeRow){
                $salonid = $uyeRow["sertifi_adet"];
                $salonadi = $db->query("SELECT * FROM salonlar WHERE kategori_id = '$salonid' ")->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                        <a href="<?php if ($uyeRow["sertifi_ornek_durum"]==1 AND $uyeRow["sertifi_onay"]==2) { echo URL.'certificate-tree/'.$uyeRow["sertifi_id"]."/";}else if ($uyeRow["sertifi_ornek_durum"]==2) {echo URL.'certificate-four/'.$uyeRow["sertifi_id"]."/";}else{ echo "javascript:void(0);"; } ?>">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bolder mb-75"><?php echo $salonadi["kategori_adi"]; ;?> <small><?php echo $bloklar["homepage_sertifika_adet"]; ?></small></h3>
                                <span><?php echo $uyeRow["sertifi_baslik"];?></span>
                            </div>
                            <?php if ($uyeRow["sertifi_onay"]==2) { ?>
                            <div class="avatar bg-success p-50">
                                <span class="avatar-content">
                                    <i data-feather='check-circle' class="font-medium-4"></i>
                                </span>
                            </div>
                            <?php  }else{ ?>
                            <div class="avatar bg-warning p-50">
                                <span class="avatar-content">
                                    <i data-feather='loader' class="font-medium-4"></i>
                                </span>
                            </div>
                            
                            <?php }  ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php  }} ?>
        </div>
    </section>
       <?php endif; ?>

             <?php if($uyeRow["uye_rutbe"]==2): ?>

<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/jquery.dataTables.css">

<div class="content-body">

     
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $bloklar["table_faturalarim"];?></h4>
                    
                </div>
                <div class="card-body">
                    <table id="example" class="dt-responsive table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                    <th><?php echo $bloklar["table_nft_fatura_etadi"]; ?></th>
                                <th><?php echo $bloklar["table_nft_kadi"]; ?></th>
                                <th><?php echo $bloklar["table_nft_link"]; ?></th>
                                <th><?php echo $bloklar["table_nft_fatura_tarih"]; ?></th>
                             
                                <th><?php echo $bloklar["table_nft_fatura_durum"]; ?></th>
                                <th><?php echo $bloklar["table_nft_islemler"]; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $catQuery = $db->query("SELECT * FROM  faturalar WHERE uyeid={$_SESSION['uye_id']} order by id desc");
                            if ($catQuery->rowCount()) {
                            foreach ($catQuery as $catRow) {

$salonid = $catRow["etkinlik_id"];
                $salonadi = $db->query("SELECT * FROM sertifikalar WHERE sertifi_id = '$salonid' ")->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <tr>
                                <td></td>
                                                <td><?php echo $salonadi["sertifi_baslik"]; ?></td>
                                <td><?php echo $catRow["nft_kadi"];  ;?></td>
                                <td><a href="<?php echo $catRow["nft_link"]; ?>" target="_blank" class="btn btn-primary"><?php echo $bloklar["table_nft_link_name"]; ?></a></td>
                                <td><?php echo tarih($catRow["tarih"]); ?></td>
                   
                                <td>
                                    
                                    <?php
                                            if ($catRow["fatura_durum"] == 1) { ?>
                                            <div class="chip chip-danger">
                                                <div class="chip-body">
                                                    <div class="chip-text">Admin Onayında</div>
                                                </div>
                                            </div> <?php }else if ($catRow["fatura_durum"] == 2) { ?>
                                            <div class="chip chip-warning">
                                                <div class="chip-body">
                                                    <div class="chip-text">Talep Organizatöre iletildi</div>
                                                </div>
                                            </div> <?php } else { ?>
                                            <div class="chip chip-success">
                                                <div class="chip-body">
                                                    <div class="chip-text">Fatura Yüklendi </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                </td>
                                <td>
                                    <button <?php if($catRow["fatura_durum"]!=3){echo"disabled";} ?> onclick="window.open('<?php echo URL; ?>images/fatura_kullanici_dosya/big/<?php echo $catRow["fatura_dosya"]; ?>')" class="btn btn-primary  me-1 mt-2"><?php echo $bloklar["table_islemler2"]; ?></button>
                                    </center>
                                    
                                </td>
                            </tr>
                            <?php }  } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


</div>
<!-- /Horizontal Wizard -->
</div>
<script>

    function FaturaTalep(catId) {
        $.post('<?php echo TEMA_URL; ?>ajax.php?p=etkinlik_fatura_talep', {
            id: catId
        }, function(data) {
            if (data == "talepedilmis") {
                 Swal.fire({
                    title: '<?php echo $bloklar["alert_komisyonf_talepedilmis_title"]; ?>',
                    text: '<?php echo $bloklar["alert_komisyonf_talepedilmis_desc"]; ?>',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_komisyonf_basarili_title"]; ?>',
                    text: '<?php echo $bloklar["alert_komisyonf_basarili_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL.'/komisyon-faturalari/'; ?>";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_komisyonf_basarisiz_title"]; ?>',
                    text: '<?php echo $bloklar["alert_komisyonf_basarisiz_desc"]; ?>',
                    icon: 'eror',
                    customClass: {
                      confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                  });
                return false;
            }

        });
    }




$(document).ready(function() {
$('#example').DataTable( {
"aLengthMenu": [[40, 100, 150, 200], [40, 100, 150, 200]],
"pageLength": 40,
 order: [[2, 'asc']],
/*dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]*/
} );
} );
</script>

       <?php endif; ?>
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_sertifika"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_sertifika"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
<!-- Horizontal Wizard -->
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $bloklar["sertifika_olustur_two"]; ?></h4>
                </div>
                <div class="card-body">
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=sertifika_olustur"  enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                               <div class="col-12">
                            <div class="mb-1">
                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading"><?php echo $bloklar["sozlesme_alert_baslik2"]; ?></h4>
                                            <div class="alert-body"><?php echo $bloklar["sozlesme_alert_desc2"]; ?></div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["sertifika_olustur_two_baslikx"]; ?></label>
                                    <input type="text" class="form-control" name="sertifika_baslik" placeholder="<?php echo $bloklar["sertifika_olustur_two_basliky"]; ?>" />
                                </div>
                            </div>
                           <!-- <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput"><?php echo $bloklar["sertifika_olustur_two_label"]; ?></label>
                                    <input type="text" class="form-control" id="basicInput" name="sertifika_adet" placeholder="10000" />
                                </div>
                            </div>-->
                           
                        
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    
                                    <label class="form-label" for="basicInput"><?php echo $bloklar["sertifika_olustur_input_iki"]; ?></label>
                                    
                                        <select class="form-control" id="basicSelect" name="sertifika_adet" required>
                                            <option disabled selected><?php echo $bloklar["sertifika_olustur_label_iki"]; ?></option>
                                            <?php
                                            $catQuery = $db->query("SELECT * FROM salonlar  where kategori_durum=1");
                                            if ($catQuery->rowCount()) {
                                                foreach ($catQuery as $catRow) {
                                                    ?>
                                                    <option value="<?= $catRow["kategori_id"] ?>"><?= $catRow["kategori_adi"] ?></option>

                                                <?php }
                                            } ?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <label for="formFile" class="form-label"><?php echo $bloklar["sertifika_belge"]; ?></label>
                                <input class="form-control" type="file" id="formFile" name="sertifika_belge[]" id="sertifika_belge[]" />
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <label for="formFile" class="form-label"><?php echo $bloklar["sertifika_belge2"]; ?></label>
                                <input class="form-control" type="file" id="formFile" name="sertifika_belge_2[]" id="sertifika_belge_2[]" />
                            </div>
                              <div class="col-xl-6 col-md-6 col-12">
                                <label for="formFile" class="form-label"><?php echo $bloklar["sertifika_belge3"]; ?></label>
                                <input class="form-control" type="file" id="formFile" name="sertifika_belge_3[]" id="sertifika_belge_3[]" />
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mt-1">
                                        <span>Qr Bilet Okuyucu Kullan/Kullanma</span>
                                     <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" value="on" name="qr_okuyucu">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                                </div>
                            </div>
                            <div class=" col-md-12">
                            <center>
                            <button type="submit" class="btn btn-primary me-1 mt-2"><?php echo $bloklar["sertifika_olustur_two"]; ?></button>
                            </center>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Horizontal Wizard -->
</div>
<script>
 $(document).ready(function(event) {
    $('#forms').ajaxForm({
         uploadProgress: function(event, position, total, percentComplete) {
            let timerInterval
            Swal.fire({
                icon: 'info',
                title: '<?php echo $bloklar["alert_info_title"]; ?>',
                html: '<?php echo $bloklar["alert_info_desc"]; ?> <b></b> ',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            });
        },
        success: function(data) {
            if (data == "bos-deger") {
                 Swal.fire({
                    title: '<?php echo $bloklar["alert_bosdeger_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_bosdeger_sertifi_desc"]; ?>',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_success_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_success_sertifi_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL; ?>";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_eror_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_eror__sertifi_desc"]; ?>',
                    icon: 'eror',
                    customClass: {
                      confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                  });
                return false;
            }
        }
    });

});
</script>

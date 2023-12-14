<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_fatura_talep"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_fatura_talep"]; ?>
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
                    <h4 class="card-title"><?php echo $bloklar["fatura_talep"]; ?></h4>
                </div>
                <div class="card-body">
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=fatura_talep"  enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["fatura_talep_one_label"]; ?></label>
                                    <input type="text" class="form-control" name="nft_kadi"/>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput"><?php echo $bloklar["fatura_talep_two_label"]; ?></label>
                                    <input type="text" class="form-control" name="nft_link"/>
                                </div>
                            </div>
                            <div class=" col-md-12">
                            <center>
                            <button type="submit" class="btn btn-primary me-1 mt-2"><?php echo $bloklar["fatura_talep_button_label"]; ?></button>
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
                    title: '<?php echo $bloklar["alert_success_fatura_talep_title"]; ?>',
                    text: '<?php echo $bloklar["alert_success_fatura_talep_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL."faturalarim/"; ?>";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_eror_fatura_talep_title"]; ?>',
                    text: '<?php echo $bloklar["alert_eror_fatura_talep_desc"]; ?>',
                    icon: 'eror',
                    customClass: {
                      confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "varsayilan") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_varsayilan_fatura_talep_title"]; ?>',
                    text: '<?php echo $bloklar["alert_varsayilan_fatura_talep_desc"]; ?>',
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

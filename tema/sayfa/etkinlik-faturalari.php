
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/jquery.dataTables.css">
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_etkinlik_faturalarim"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_etkinlik_faturalarim"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">

     
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $bloklar["table_etkinlik_faturalari"];?></h4>
                    
                </div>
                <div class="card-body">
                    <table id="example" class="dt-responsive table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?php echo $bloklar["table_etkinlik_adi"]; ?></th>
                                <th><?php echo $bloklar["table_etkinlik_talepeden"]; ?></th>
                                <th><?php echo $bloklar["table_etkinlik_tarih"]; ?></th>
                                <th><?php echo $bloklar["table_etkinlik_etkinliktarih"]; ?></th>
                                <th><?php echo $bloklar["table_etkinlik_durum"]; ?></th>
                                <th><?php echo $bloklar["table_etkinlik_duzenle"]; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $catQuery = $db->query("SELECT * FROM faturalar INNER JOIN sertifikalar ON sertifi_id=etkinlik_id  INNER JOIN uyeler ON uye_id=sertifi_uye_id WHERE uye_id={$_SESSION['uye_id']} ");
                            if ($catQuery->rowCount()) {
                            foreach ($catQuery as $catRow) {

                                $faturalar = $db->query("SELECT * FROM faturalar where id = '".$catRow["id"]."'")->fetch(PDO::FETCH_ASSOC);

                                $uyecek = $db->query("select * from uyeler where uye_id = '".$catRow["uyeid"]."'")->fetch(PDO::FETCH_ASSOC);

                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $catRow["sertifi_baslik"];?></td>
                                <td><?php echo $uyecek["uye_ad"]." ".$uyecek["uye_soyad"];?></td>
                                <td><?php echo tarih($catRow["tarih"]); ?></td>
                                <td><?php echo tarih($catRow["sertifi_tarih"]); ?></td>
                                <td>
                                	
                                	<?php
                                            if ($faturalar["fatura_durum"] == 1) { ?>
                                            <div class="chip chip-danger">
                                                <div class="chip-body">
                                                    <div class="chip-text">Admin Onayında</div>
                                                </div>
                                            </div> <?php }else if ($faturalar["fatura_durum"] == 2) { ?>
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
                                <td><a  href="<?php echo URL;?>etkinlik-fatura-duzenle/<?php echo $catRow["id"]; ?>/" class="btn btn-primary  me-1 mt-2"><?php echo $bloklar["table_etkinlik_islemler"]; ?></a></td>
                                
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

	function adreslerimVarsayilan(id) {
		$.post('<?php echo TEMA_URL; ?>ajax.php?p=adreslerim_varsayilan', {
			id: id
		}, function(data) {
            if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_adreslerim_basarili_title"]; ?>',
                    text: '<?php echo $bloklar["alert_adreslerim_basarili_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL.'/adreslerim/'; ?>";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_adreslerim_basarisiz_title"]; ?>',
                    text: '<?php echo $bloklar["alert_adreslerim_basarisiz_desc"]; ?>',
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

	function adreslerimSil(id) {
		$.post('<?php echo TEMA_URL; ?>ajax.php?p=adreslerim_sil', {
			id: id
		}, function(data) {
            if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_adreslerim_basarili_sil_title"]; ?>',
                    text: '<?php echo $bloklar["alert_adreslerim_basarili_sil_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL.'/adreslerim/'; ?>";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_adreslerim_basarisiz_sil_title"]; ?>',
                    text: '<?php echo $bloklar["alert_adreslerim_basarisiz_sil_desc"]; ?>',
                    icon: 'eror',
                    customClass: {
                      confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "varsayilan") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_adreslerim_basarisiz_sil_varsayilan_title"]; ?>',
                    text: '<?php echo $bloklar["alert_adreslerim_basarisiz_sil_varsayilan_desc"]; ?>',
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
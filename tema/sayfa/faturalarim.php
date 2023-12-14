
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/jquery.dataTables.css">
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_faturalarim"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_faturalarim"]; ?>
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
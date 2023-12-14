
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/jquery.dataTables.css">
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_faturalar"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_faturalar"]; ?>
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
                    <h4 class="card-title"><?php echo $bloklar["table_komisyon_faturalar"];?></h4>
                    
                </div>
                <div class="card-body">
                    <table id="example" class="dt-responsive table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?php echo $bloklar["table_etkinlik_ad"]; ?></th>
                                <th><?php echo $bloklar["table_etkinlik_tarih"]; ?></th>
                                <th><?php echo $bloklar["table_fatura_tl_tutar"]; ?></th>
                                <th><?php echo $bloklar["table_fatura_bnb_tutar"]; ?></th>
                                <th><?php echo $bloklar["table_fatura_durum"]; ?></th>
                                <th><?php echo $bloklar["table_islemler"]; ?></th>
                                <th><?php echo $bloklar["table_islemler2"]; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $catQuery = $db->query("SELECT * FROM  sertifikalar WHERE sertifi_uye_id={$_SESSION['uye_id']} ");
                            if ($catQuery->rowCount()) {
                            foreach ($catQuery as $catRow) {


                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $catRow["sertifi_baslik"];  ;?></td>
                                <td><?php echo tarih($catRow["sertifi_tarih"]); ?></td>
                                <td><?php echo tarih($catRow["fatura_tl_tutar"]); ?></td>
                                <td><?php echo tarih($catRow["fatura_bnb_tutar"]); ?></td>
                                <td>
                                	
                                	<?php
											if ($catRow["fatura_durum"] == 0) { ?>
											<div class="chip chip-danger">
												<div class="chip-body">
													<div class="chip-text">Talep Edilmedi</div>
												</div>
											</div> <?php }else if ($catRow["fatura_durum"] == 1) { ?>
											<div class="chip chip-warning">
												<div class="chip-body">
													<div class="chip-text">İşlem Sırasında</div>
												</div>
											</div> <?php } else { ?>
											<div class="chip chip-success">
												<div class="chip-body">
													<div class="chip-text">Fatura Yüklendi </div>
												</div>
											</div>
										<?php } ?>

                                </td>
                                <td><button <?php if($catRow["fatura_durum"]!=0){echo"disabled";} ?> onclick="FaturaTalep(<?php echo $catRow["sertifi_id"]; ?>);" class="btn btn-primary  me-1 mt-2"><?php echo $bloklar["table_islemler"]; ?></button></td>
                                <td>
                                    <button <?php if($catRow["fatura_durum"]==1 OR $catRow["fatura_durum"]==0){echo"disabled";} ?> onclick="window.open('<?php echo URL; ?>images/fatura_dosya/big/<?php echo $catRow["fatura_dosya"]; ?>')" class="btn btn-primary  me-1 mt-2"><?php echo $bloklar["table_islemler2"]; ?></button>
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
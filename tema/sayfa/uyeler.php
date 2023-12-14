
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/jquery.dataTables.css">
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Kullanıcılarım</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active">Kullanıcılarım
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
    <section class="horizontal-wizard">
        
        <div class="row">
          
            <div class="mb-2 mt-2 col-md-12">
                <center>
                <button onclick="location.href='<?php echo URL;?>uye_ekle/'" class="btn btn-primary btn-lg me-1">Yeni Alt Üye Ekle</button>
             
            </div>
     
            </div>
            
        </section>
     
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kullanıcılarım</h4>
                    
                </div>
                <div class="card-body">
                    <table id="example" class="dt-responsive table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Adı Soyadı</th>
                                <th>E-Posta</th>
                                <th>Pin</th>
                                <th>Yeni Etkinlik Oluşturma</th>
                                <th>Etkinlik Hakkı Aktarim Talebi</th>
                                <th>Faturalar</th>
                                <th>Veritabanı</th>
                                <th>İşlemler</th>
                                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $catQuery = $db->query("SELECT * FROM alt_uyeler  WHERE alt_uye_anaid={$_SESSION['uye_id']}");
                            if ($catQuery->rowCount()) {
                            foreach ($catQuery as $catRow) {
                            ?>
                            <tr>
                                <td></td>
                                     <td><?php echo $catRow["uye_ad"]." ".$catRow["uye_soyad"]; ?></td>
                                     <td><?php echo $catRow["uye_eposta"]; ?></td>
                                     <td><?php echo $catRow["alt_uye_pin"]; ?></td>
                                     <td><?php if ($catRow["alt_uye_yetkialan_bir"]==on) { echo "Açık";}else{ echo "Kapalı";} ?></td>
                                     <td><?php if ($catRow["alt_uye_yetkialan_iki"]==on) { echo "Açık";}else{ echo "Kapalı";} ?></td>
                                     <td><?php if ($catRow["alt_uye_yetkialan_uc"]==on) { echo "Açık";}else{ echo "Kapalı";} ?></td>
                                     <td><?php if ($catRow["alt_uye_yetkialan_dort"]==on) { echo "Açık";}else{ echo "Kapalı";} ?></td>

                            
                           
                              
                                <td>
                                    <button class="btn btn-primary  me-1 mt-2" onclick="AltUyeSil(<?php echo $catRow["alt_uye_id"]; ?>);">Sil</button>
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

	function AltUyeSil(catId) {
		$.post('<?php echo TEMA_URL; ?>ajax.php?p=alt_uye_sil', {
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
                    title: 'Başarılı',
                    text: 'Üye Başarılı Şekilde Silindi !',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL.'uyeler/'; ?>";});
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
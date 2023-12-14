<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;

error_reporting(E_ALL);

?>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Ziyaretçi Faturaları</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="index.php?sayfa=ziyaretci_fatura_list">Ziyaretçi Faturaları </a>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="content-body">
		<!-- Data list view starts -->
		<section id="data-list-view" class="data-list-view-header">


			<!-- DataTable starts -->
			<div class="table-responsive">
				<div class="actions action-btns"><div class="dt-buttons btn-group">
					<a href="index.php?sayfa=komisyon_fatura_ekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr><th></th>
								<th>ID</th>
								<th>Nft Kullanıcı Adı</th>
								<th>Nft Link</th>
								<th>Ziyaretçi Adı</th>
								<th>Tarih</th>
								<th>Fatura Durumu</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$kquery = $db->query("SELECT * FROM faturalar order by id desc");
							if($kquery->rowCount()){
								foreach($kquery as $kRow){
									  
									$uyeler = $db->query("SELECT * FROM uyeler where uye_id = '".$kRow["uyeid"]."'")->fetch(PDO::FETCH_ASSOC);
								?>
								<tr>
									<td></td>
									<td><?php echo $kRow["id"];?></td>
									<td><?php echo $kRow["nft_kadi"];?></td>
									<td><a href="<?php echo $kRow["nft_link"]; ?>" target="_blank" class="btn btn-primary">Nft Linki</a></td>
									<td><?php echo $uyeler["uye_ad"]." ".$uyeler["uye_soyad"];?></td>
									<td><?php echo tarih($kRow["tarih"]);?></td>
									<td>   	<?php
											if ($kRow["fatura_durum"] == 1) { ?>
											<div class="chip chip-danger">
												<div class="chip-body">
													<div class="chip-text">Admin Onayında</div>
												</div>
											</div> <?php }else if ($kRow["fatura_durum"] == 2) { ?>
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
												<div class="dropdown dropright">
												<button onclick="location.href='index.php?sayfa=ziyaretci_fatura_duzenle&id=<?php echo $kRow["id"];?>'"  class="btn btn-danger " type="button" >
													Fatura Bilgileri<br> Kontrol Et 
												</button>
											</div>   

										</td>
								</tr>

							<?php  }} ?>



						</tbody>
					</table>
				</div>
				<!-- DataTable ends -->

				<!-- add new sidebar ends -->
			</section>
			<!-- Data list view end -->

		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('.datatable').dataTable({
				"bSort":false
			});
		});
		function TekSil(catId){
			$.post('ajax.php?p=tek_cat_sil', {id: catId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde silinmiştir.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					swal("Başarısız","Silinemedi","error");
					return false;
				}
			});
		}
		function durumDegis(catId){
			$.post('ajax.php?p=cat_durum_degis', {id: catId}, function (data) {
				if(data=="yasaklama-basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde gizlendi.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="yasak-kaldirildi"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde aktifleştirildi.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					swal("Başarısız","Silinemedi","error");
					return false;
				}
			});
		}

	</script>

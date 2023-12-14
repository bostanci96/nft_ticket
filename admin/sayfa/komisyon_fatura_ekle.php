<?php
		echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Fatura Ekle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=komisyon_fatura_list">Komisyon Faturaları</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Fatura Ekle </a>
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
				<h4 class="card-title">   <p><b>Fatura Ekle</b></p> </h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					<form role="form"  id="forms" method="POST" action="ajax.php?p=uye_fatura_ekle">
						<div class="row">
						
							<div class="col-12">
								<div class="form-group row">
									<div class="col-md-2">
										<span>Etkinlik</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<select class="form-control" name="sertifi_id">
												<?php 

													$etkinlikler = $db->query("SELECT * from sertifikalar WHERE sertifi_transferkod = '' AND fatura_durum != 2 ")->fetchAll(PDO::FETCH_ASSOC);
													foreach($etkinlikler as $m){

												 ?>
												<option value="<?php echo $m["sertifi_id"]; ?>"><?php echo $m["sertifi_baslik"]; ?></option>
											<?php } ?>
											</select>
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
								<div class="col-12">
								<div class="form-group row">
									<div class="col-md-2">
										<span>Etkinlik TL Tutar</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="fatura_tl_tutar" placeholder="" >
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
								<div class="col-12">
								<div class="form-group row">
									<div class="col-md-2">
										<span>Etkinlik BNB Tutar</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="fatura_bnb_tutar" placeholder="" >
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<div class="col-md-2">
										<span>Etkinlik Faturası</span>
									</div>
									<div class="col-md-10">
										<fieldset class="form-group">                                                    
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="fatura_dosya[]" id="fatura_dosya[]">
																<label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
															</div>
														</fieldset>
									</div>
								</div>
							</div>
						
					


					
						
							<div class="form-group col-md-8 offset-md-4">
							</div>
						</div>
						<div class="row">
					
						<div class="col-md-8">
							<div id="id_box"></div>
							<button type="submit" class="btn btn-primary btn-lg mr-1 mb-1"  name="faturayukle" value="true">Fatura Yükle</button>

						</div>
					</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
</section>
</div>
</div>
<script>
	$(document).ready(function(event) {
		$('#forms').ajaxForm({
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarilixxx"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "Fatura Talep Red Edildi!",
								type	: "success"
					},
					function(){
						window.location.href = "<?php echo ADMIN_URL.'index.php?sayfa=komisyon_fatura_list'; ?>"
					});
					return false;
				}else if(data=="basarili"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "Fatura Yüklendi!",
								type	: "success"
					},
					function(){
						window.location.href = "<?php echo ADMIN_URL.'index.php?sayfa=komisyon_fatura_list'; ?>"
					});
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});
	});
</script>
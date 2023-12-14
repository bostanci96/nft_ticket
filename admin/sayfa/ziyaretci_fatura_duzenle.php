<?php
		echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$uyeControl = $db->prepare("SELECT * FROM faturalar INNER JOIN uyeler ON uye_id=uyeid WHERE id=:id");
	$uyeControl->execute(array("id"=>$id));
	if($uyeControl->rowCount()){
		$uyeRow = $uyeControl->fetch(PDO::FETCH_ASSOC);
	}else{
				go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
			go(ADMIN_URL.'index.php?sayfa=404');
}
?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Ziyaretçi Fatura Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=ziyaretci_fatura_list">Ziyaretçi Faturaları</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Ziyaretçi Fatura Düzenle </a>
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
				<h4 class="card-title">   <p><b><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></b> adlı Kullanıcı Bilet Fatura Kontrol..</p> </h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					<form role="form"  id="forms" method="POST" action="ajax.php?p=ziyaretci_fatura_duzenle">
						<input type="hidden" name="uye_id" value="<?php echo $uyeRow["uye_id"];?>"/>
						<input type="hidden" name="id" value="<?php echo $uyeRow["id"];?>"/>
						<input type="hidden" name="uye_eposta" value="<?php echo $uyeRow["uye_eposta"];?>"/>
						<input type="hidden" name="uye_ad" value="<?php echo $uyeRow["uye_ad"];?>"/>
						<input type="hidden" name="uye_soyad" value="<?php echo $uyeRow["uye_soyad"];?>"/>
						<input type="hidden" name="uye_sitedil" value="<?php echo $uyeRow["uye_sitedil"];?>"/>
						<div class="row">
						
							<div class="col-12">
								<div class="form-group row">
									<div class="col-md-2">
										<span>NFT Kullanıcı Adı</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="nft_kadi" value="<?php echo $uyeRow["nft_kadi"];?>" placeholder="" >
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
										<span>Nft Link</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="nft_link" value="<?php echo $uyeRow["nft_link"];?>" placeholder="" >
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
										<span>Tarih</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="tarih" value="<?php echo tarih($uyeRow["tarih"]);?>" placeholder="" >
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
										<span>Etkinlik</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<select class="form-control" name="sertifi_id">
												<?php 

													$etkinlikler = $db->query("SELECT * from sertifikalar")->fetchAll(PDO::FETCH_ASSOC);
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

							<div class="col-md-8">		<a href="<?php echo URL; ?>images/fatura_kullanici_dosya/big/<?php echo $uyeRow["fatura_dosya"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/fatura_kullanici_dosya/big/<?php echo $uyeRow["fatura_dosya"]; ?>" class="img-fluid"></a></div>
						
					


					
						
							<div class="form-group col-md-8 offset-md-4">
							</div>
						</div>
						<div class="row">
					
						<div class="col-md-8">
							<div id="id_box"></div>
							<button type="submit" class="btn btn-primary btn-lg mr-1 mb-1"  name="faturagonder" value="true"   <?php if($uyeRow["fatura_durum"]==3){ echo "disabled"; }?>><?php if($uyeRow["fatura_durum"]==3){ echo "Fatura Yüklendi"; }else{ echo "Fatura Talebini Gönder";} ?></button>

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
						window.location.href = "<?php echo ADMIN_URL.'index.php?sayfa=ziyaretci_fatura_list'; ?>"
					});
					return false;
				}else if(data=="basarili"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "Fatura Organizatöre İletildi!",
								type	: "success"
					},
					function(){
						window.location.href = "<?php echo ADMIN_URL.'index.php?sayfa=ziyaretci_fatura_list'; ?>"
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
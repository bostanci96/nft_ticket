<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$catControl = $db->prepare("SELECT * FROM koltuklar WHERE urun_id=:id");
	$catControl->execute(array("id"=>$id));
	if($catControl->rowCount()){
		$catRow = $catControl->fetch(PDO::FETCH_ASSOC);
	}else{
		go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
	go(ADMIN_URL.'index.php?sayfa=404');
}
function Kategori_Select($tree,$level=0,$selID = null){
	global $db;
	$sorgula = $db->query("SELECT * FROM salonlar WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==$selID){$selected = " selected ";}else{$selected=null;}
			echo '<option value="'.$item["kategori_id"].'" '.$selected.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1,$selID);
		}
	}
}

?>



<style type="text/css">
	.card-body {
		padding: 0pc 1.5pc;
	}
</style>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Koltuk Yönetimi</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=mekan_koltuklari">Koltuklar</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Koltuk Düzenle</a>
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
							<h4 class="card-title">   <p><b><?php echo $catRow["urun_adi"];?> </b> Adlı koltuk Düzenleniyor</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms"class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=koltuk_edit"  enctype="multipart/form-data">
									<input type="hidden" name="urun_id" value="<?php echo $catRow["urun_id"];?>" />
									<div class="form-body">
										<div class="row">

											<!-- Nav tabs -->
											<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
											<!--	<li class="nav-link">
													<a class="nav-link" id="img-tab-fill" data-toggle="tab" href="#img-fill" role="tab" aria-controls="img-fill" aria-selected="false"><i class="feather icon-file-text"></i> ÜRÜN RESİMLERİ </a>
												</li>-->
												<li class="nav-link active">
													<a class="nav-link " id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">  <i class="feather icon-file-text"></i> TÜRKÇE </a>
												</li>
												<!--<li class="nav-link">
													<a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false"><i class="feather icon-file-text"></i> İNGİZLİCE </a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="messages-tab-fill" data-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false"><i class="feather icon-file-text"></i> ARAPÇA</a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="settings-tab-fill" data-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false"><i class="feather icon-file-text"></i> RUSÇA </a>
												</li>-->
											</ul>


											<!-- Tab panes -->
											<div class="tab-content pt-1">
												<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

													<!-- Türkçe başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Koltuk  Sıra No:</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="urun_adi" value="<?php echo $catRow["urun_adi"];?>" placeholder="Örn: H">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
															<span>Koltuk No:</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="urun_desc" value="<?php echo $catRow["urun_icerik"];?>" placeholder="Örn: 16">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
															<span>Koltuk Kategorisi</span>
															</div>
															<div class="col-md-10">
								

	<fieldset class="position-relative has-icon-left">

														<input type="text" id="first-name" class="form-control" name="urun_icerik" placeholder="Örn: 1. Kategori" value="<?php echo $catRow["urun_tam_icerik"];?>">

														<div class="form-control-position">
															<i class="feather icon-tag"></i>
														</div>
													</fieldset>
															</div>
														</div>
													</div>




													<!-- Türkçe bitiş -->
												</div>
												<div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">

													<!-- İngilizce başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Ürün Başlığı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="en_urun_adi" value="<?php echo $catRow["en_urun_adi"];?>" placeholder="Örn: Ürünün Adı">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Ürün Desc</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="en_urun_desc" value="<?php echo $catRow["en_urun_icerik"];?>" placeholder="Örn: Ürünün Kısa Açıklama">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Ürün İçerik</span>
															</div>
															<div class="col-md-10">
																<textarea class="ckeditor" id="en_bootstrapck"  name="en_urun_icerik"><?php echo $catRow["en_urun_tam_icerik"];?></textarea>
																<?php ckeditor('en_bootstrapck');?>


															</div>
														</div>
													</div>



													<!-- İngilizce bitiş -->

												</div>
												<div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
													<!-- Arapça başlangıç -->

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Ürün Başlığı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="ar_urun_adi" value="<?php echo $catRow["ar_urun_adi"];?>" placeholder="Örn: Ürünün Adı">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Ürün Desc</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="ar_urun_desc" value="<?php echo $catRow["ar_urun_icerik"];?>" placeholder="Örn: Ürünün Kısa Açıklama">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Ürün İçerik</span>
															</div>
															<div class="col-md-10">
																<textarea class="ckeditor" id="ar_bootstrapck"  name="ar_urun_icerik"><?php echo $catRow["ar_urun_tam_icerik"];?></textarea>
																<?php ckeditor('ar_bootstrapck');?>


															</div>
														</div>
													</div>

													<!-- Arapça bitiş -->    
												</div>
												<div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">

													<!-- RUSÇA başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Ürün Başlığı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="fa_urun_adi" value="<?php echo $catRow["fa_urun_adi"];?>" placeholder="Örn: Ürünün Adı">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Ürün Desc</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="fa_urun_desc" value="<?php echo $catRow["fa_urun_icerik"];?>" placeholder="Örn: Ürünün Kısa Açıklama">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Ürün İçerik</span>
															</div>
															<div class="col-md-10">
																<textarea class="ckeditor" id="fa_bootstrapck"  name="fa_urun_icerik"><?php echo $catRow["fa_urun_tam_icerik"];?></textarea>
																<?php ckeditor('fa_bootstrapck');?>


															</div>
														</div>
													</div>



													<!-- RUSÇA bitiş -->   
												</div>
												<div class="tab-pane" id="img-fill" role="tabpanel" aria-labelledby="img-tab-fill">
													<div class="row">

														<?php
														$imgQuery = $db->query("SELECT * FROM urunresim WHERE resim_urun_id='$id'");
														if($imgQuery->rowCount()){
															foreach($imgQuery as $imgRow){
																?>
																<div class="col-md-3 " style="    margin-bottom: 2.2rem;
																border: none;
																border-radius: 0.5rem;
																-webkit-box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.1);
																box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.1);
																-webkit-transition: all 0.3s ease-in-out;
																-o-transition: all 0.3s ease-in-out;
																-moz-transition: all 0.3s ease-in-out;
																transition: all 0.3s ease-in-out;padding:10px;text-align: center;float: left;">
																<div class="inner">
																	<div class="img-frame danger">
																		<a class="zooming" href="<?php echo URL;?>images/urunler/big/<?php echo $imgRow["urun_img"];?>">
																			<div class="img-wrap">
																				<img src="<?php echo URL;?>images/urunler/thumb/<?php echo $imgRow["urun_img"];?>" class="col-md-12">
																			</div>

																		</a>
																	</div>
																</div>
																<a href="javascript:;" onclick="TekSil(<?php echo $imgRow["resim_id"];?>);">  <div class="chip chip-danger mr-1" style="margin:5px;">
																	<div class="chip-body">
																		<span class="chip-text">Ürün Resmini Sil</span>

																		<i class="feather icon-x" style="    margin-top: 3px;
																		font-size: 19px;"></i>

																	</div>
																</div></a>
															</div>
															<?php
														}
													}
													?>
												</div>
											</div>

										</div>
									</div>
									
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-2">
												<span>Koltuk Alan</span>
											</div>
											<div class="col-md-10">
												<fieldset class="position-relative has-icon-left">

													<input type="text" id="first-name" class="form-control" name="urun_link" value="<?php echo $catRow["urun_link"];?>" placeholder="Örn: 1. Balkon">

													<div class="form-control-position">
														<i class="feather icon-tag"></i>
													</div>
												</fieldset>

											</div>
										</div>

									</div>
									<div class="col-12">
										<div class=" row">
											<div class="col-md-2">
												<span>Koltuğun Ait Olduğu Mekan Adı</span>
											</div>
											<div class="col-md-10">
												<fieldset class="form-group">
													<select class="form-control" id="basicSelect" name="urun_kategori">
													<option value="0">Mekan Seçiniz</option>
														<?php Kategori_Select(0,0,$catRow["urun_kategori"]);?>
													</select>
												</fieldset>
											</div>
										</div>
									</div>
										<!--<div class="col-12">
										<div class="form-group row">
											<div class="col-md-2">
												<span>Ürün Durumu</span>
											</div>
											<div class="col-md-10">
												<fieldset class="form-group">
													<select class="form-control" id="basicSelect" name="urun_populer">
														<option value="0" <?php echo $catRow["urun_populer"]==0 ? 'selected' : null; ?>>Normal Ürün </option>
														<option value="1" <?php echo $catRow["urun_populer"]==1 ? 'selected' : null; ?>>Vitrin Ürün </option>

													</select>
												</fieldset>
											</div>
										</div>
									</div>
								<div class="col-12">
										<div class="form-group row">
											<div class="col-md-2">
												<span>Ürün Resmi</span>
											</div>
											<div class="col-md-10">
												<fieldset class="form-group">                                                    
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="inputGroupFile01" title="Resim seç !" name="dosya[]" id="dosya[]" multiple>
														<label class="custom-file-label" for="inputGroupFile01">Ürün Görsellerini Seçiniz</label>
													</div>
												</fieldset>
											</div>
										</div>
									</div>-->


									<div class="col-md-7 offset-md-4 "  >
										<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Güncelle</button>
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
	function TekSil(catId){
		$.post('ajax.php?p=tek_urunresim_sil', {id: catId}, function (data) {
			if(data=="basarili"){
				sweetAlert({
					title	: "Başarılı",
					text 	: "Resim başarılı bir şekilde silinmiştir.",
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
	$(document).ready(function(event) {

		$('#forms').ajaxForm({
			beforeSerialize: function(form, options) { 
				for (instance in CKEDITOR.instances)
					CKEDITOR.instances[instance].updateElement();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Koltuk Güncelleniyor. Lütfen Bekleyiniz",
					type : "info",
					closeOnConfirm : false,
					showLoaderOnConfirm:true,
				});
			},
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Koltuk Başarılı Bir Şekilde Güncellendi",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					sweetAlert(data,"Bir hata oluştu !","error");
					return false;
				}
			}
		});

	});
</script>




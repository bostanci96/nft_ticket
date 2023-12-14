<?php echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<?php
function Kategori_Select($tree,$level=0){
	global $db;
	$sorgula = $db->query("SELECT * FROM salonlar WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			echo '<option value="'.$item["kategori_id"].'">'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1);
		}
	}
}
?>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Mekan Ekle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=mekanlar">Mekanlar</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Yeni Mekan Ekle</a>
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
							<h4 class="card-title">   <p><b>Yeni</b> Mekan Ekle</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" class="form-horizontal" id="forms" method="POST" action="ajax.php?p=mekan_add"  enctype="multipart/form-data">
									
									<div class="form-body">
										<div class="row">
<input type="hidden" name="ust_kategori" value="0">
											<!--<div class="col-12">
												<div class=" row">
													<div class="col-md-2">
														<span>Üst Kategori</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<select class="form-control" id="basicSelect" name="ust_kategori">
																<option value="0">Ana Kategori Olsun</option>
																<?php Kategori_Select(0,0);?>                                         
															</select>
														</fieldset>
													</div>
												</div>
											</div>
	<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Kategori Durumu</span>
												</div>
												<div class="col-md-10">
													<fieldset class="form-group">
														<select class="form-control" id="basicSelect" name="kategori_pop">
															<option value="0">Normal Kategori </option>
															<option value="1 ">Vitrin Kategori </option>

														</select>
													</fieldset>
												</div>
											</div>
										</div>-->

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Mekan Adı</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" id="first-name" class="form-control" name="kategori_adi" placeholder="Mekan Adı">
															<div class="form-control-position">
																<i class="feather icon-type"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>

<!--
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Kategori Desc</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="desc" id="email-id" class="form-control" name="kategori_desc" placeholder="Kategori Desc(SEO)">
															<div class="form-control-position">
																<i class="feather icon-star"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>

											
											
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Kategori Resim</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">                                                    
															<div class="custom-file">
																<input type="file" class="custom-file-input" id="inputGroupFile01" name="dosya[]">
																<label class="custom-file-label" for="inputGroupFile01">Dosya Seçiniz</label>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
-->
											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-8 offset-md-4">
												<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
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
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Mekan Yükleniyor. Lütfen Bekleyiniz",
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
						text 	: "Mekan Başarılı Bir Şekilde Eklendi",
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




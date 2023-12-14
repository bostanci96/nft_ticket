<?php
		echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$uyeControl = $db->prepare("SELECT * FROM adresler WHERE id=:id");
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
					<h2 class="content-header-title float-left mb-0">Adres İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=kullanicilar">Kullanıcılar</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Adres Doğrulama </a>
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
				<h4 class="card-title">   <p><b><?php echo $uyeRow["baslik"];?></b> adlı Adres Kontrol..</p> </h4>
			</div>
			<div class="card-content">
			  <div class="card-body">
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=adreslerim_duzenle"  enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                            <input type="hidden" name="id" value="<?php echo $uyeRow["id"]; ?>">
                             <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["nft_cuzdan_label"]; ?></label>
                                    <input type="text" class="form-control" name="nft_cuzdan"  value="<?php echo $uyeRow["nft_cuzdan"]; ?>" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["nft_profil_label"]; ?></label>
                                    <input type="text" class="form-control" name="nft_profil"  value="<?php echo $uyeRow["nft_profil"]; ?>" />
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["adreslerim_ekle_one_label"]; ?></label>
                                    <input type="text" class="form-control" value="<?php echo $uyeRow["baslik"]; ?>" name="adres_baslik"/>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput"><?php echo $bloklar["adreslerim_ekle_two_label"]; ?></label>
                                    <textarea rows="3" name="adres" class="form-control"><?php echo $uyeRow["adres"]; ?></textarea>
                                </div>
                            </div>
                            				<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
									 <label class="form-label" for="register_label_six"><?=$bloklar["faturatip_label_bir"]?></label>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											
											<div class="vs-radio-con">
												<input disabled type="radio" class="coupon_two_question" name="fatura_tipi" <?php echo $uyeRow["fatura_tipi"]==1 ? 'checked' : null; ?>  value="1">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class=""><?=$bloklar["faturatip_label_iki"]?></span>
											</div>
											<div class="vs-radio-con">
												<input disabled type="radio" class="coupon_question" name="fatura_tipi" <?php echo $uyeRow["fatura_tipi"]==2 ? 'checked' : null; ?>  value="2">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class=""><?=$bloklar["faturatip_label_uc"]?></span>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
<div class="answer row">
                             <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["faturatip_label_dort"]; ?></label>
                                    <input type="text" class="form-control" name="fatura_k_ad" value="<?php echo $uyeRow["fatura_k_ad"]; ?>"/>
                                </div>
                            </div>
                             <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["faturatip_label_bes"]; ?></label>
                                    <input type="text" class="form-control" name="fatura_k_vergi" value="<?php echo $uyeRow["fatura_k_vergi"]; ?>"/>
                                </div>
                            </div>
                             <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["faturatip_label_alti"]; ?></label>
                                    <input type="text" class="form-control" name="fatura_k_vergid" value="<?php echo $uyeRow["fatura_k_vergid"]; ?>"/>
                                </div>
                            </div>
                            </div>
                              <div class="answerxx row">
                      
                             <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["faturatip_label_yedi"]; ?></label>
                                    <input type="text" class="form-control " name="adsoyad"   value="<?php echo $uyeRow["adsoyad"]; ?>"/>
                                </div>
                            </div>
                             <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                    <label class="form-label" ><?php echo $bloklar["faturatip_label_sekiz"]; ?></label>
                                    <input type="text" class="form-control " name="tc"   value="<?php echo $uyeRow["tc"]; ?>"/>
                                </div>
                            </div>
                            </div>
                           
                        </div>
                    </form>
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
								text 	: "Kullanıcı Silinerek Tekrar Evrak Talep Edildi!",
								type	: "success"
					},
					function(){
						window.location.href = "<?php echo ADMIN_URL.'index.php?sayfa=kyc_dogrulama'; ?>"
					});
					return false;
				}else if(data=="basarili"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "KYC Başarılı bir şekilde onaylandı !",
								type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarilinot"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "KYC Başarılı bir şekilde onaylandı ! Mail Gönderilemedi !!",
								type	: "info"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});
	});
	 $(".answer").hide();

    if($(".coupon_question").is(":checked")) {
        $(".answer").show();
    } else {
        $(".answer").hide();
    }

	 $(".answerxx").hide();

    if($(".coupon_two_question").is(":checked")) {
        $(".answerxx").show();
    } else {
        $(".answerxx").hide();
    }
</script>
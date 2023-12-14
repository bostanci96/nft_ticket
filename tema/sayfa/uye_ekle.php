<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Üye Ekle</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active">Üye Ekle
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
<!-- Horizontal Wizard -->
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Üye Ekle</h4>
                </div>
                <div class="card-body">
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=alt_uye_ekle"  enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                             <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                        <span>Adınız</span>
                                    <input type="text" class="form-control" name="uye_ad"/>
                                </div>
                            </div>
                               <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <span>Soyadınız</span>
                                    <input type="text" class="form-control" name="uye_soyad"/>
                                </div>
                            </div>
                           
                              <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                        <span>E-Posta</span>
                                    <input type="text" class="form-control" name="uye_eposta"/>
                                </div>
                            </div>
                           
                              <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <span>Cep Tel</span>
                                    <input type="text" class="form-control" name="uye_telefon"/>
                                </div>
                            </div>
                             <div class="col-xl-12 col-md-12 col-12">
                                <div class="mb-1">
                                  <span>Pin <small>(Tek sefer girilir. Değişim olmamaktadır.)</small></span>
                                    <input type="text" class="form-control" name="uye_pin"/>
                                </div>
                            </div>
                             
                             <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                        <span>Yeni Etkinlik Oluşturma</span>
                                     <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" value="on" name="alt_uye_yetkialan_bir">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                                </div>
                            </div>
                             <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                        <span>Etkinlik Hakkı Aktarim Talebi</span>
                                     <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" value="on" name="alt_uye_yetkialan_iki">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                                </div>
                            </div>
                             <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                        <span>Faturalar</span>
                                     <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" value="on" name="alt_uye_yetkialan_uc">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                                </div>
                            </div>
                             <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                        <span>Veritabanı</span>
                                     <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" value="on" name="alt_uye_yetkialan_dort">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-2 col-12">
                                <div class="mb-1">
                                        <span>Qr Bilet Okuyucu</span>
                                     <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" value="on" name="alt_uye_yetkialan_bes">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                                </div>
                            </div>
                          
                           
                           
                            <div class=" col-md-12">
                            <center>
                            <button type="submit" class="btn btn-primary me-1 mt-2">Alt Kullanıcı Ekle</button>
                            </center>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Horizontal Wizard -->
</div>
<script>
 $(document).ready(function(event) {
    $('#forms').ajaxForm({
        success: function(data) {
            if (data == "bos-deger") {
                 Swal.fire({
                    title: 'Uyarı',
                    text: 'Tüm alanları eksiksiz doldurduğunuzdan emin olun !',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            }else if (data == "gecersiz-eposta") {
                 Swal.fire({
                    title: 'Uyarı',
                    text: 'Geçersiz E-Posta Adresi !',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "eposta-alinmis") {
                 Swal.fire({
                    title: 'Uyarı',
                    text: 'Daha Önce Alınmış E-Posta Adresi',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            }  else if (data == "basarili") {
                  Swal.fire({
                    title: 'Başarılı',
                    text: 'Alt Üye Başarılı Şekilde Eklendi !',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL."uyeler/"; ?>";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: 'Hata',
                    text: 'Bir hata oluştu lütfen tekrar deneyiniz. !',
                    icon: 'eror',
                    customClass: {
                      confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                  });
                return false;
            }
        }
    });

});



</script>

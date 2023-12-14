<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row ">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="<?php echo URL; ?>">
                        <span class="brand-logo">
                              <img src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" class="img-fluid" alt="<?php echo $ayar[$lehce."site_title"];?>">
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a>
                </li>
            </ul>
        </div>
               <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
          <?php if ($_SESSION['uye_rutbexxxxx']==8888888) { ?>
            <ul class="nav navbar-nav justify-content-center" id="main-menu-navigation" data-menu="menu-navigation">
                
                <li class="<?php classActive('',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>">
                        <i data-feather="home"></i>
                         <span data-i18n="<?php echo $bloklar["homebutton"]?>"><?php echo $bloklar["homebutton"]?></span>
                    </a>
                </li>
                   <?php if($uyeRow["uye_rutbe"]==1): ?>

                    <li class="<?php classActive('certificate',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>certificate/">
                       <i data-feather='clipboard'></i>
                         <span data-i18n="<?php echo $bloklar["sertifikabuton"]?>"><?php echo $bloklar["sertifikabuton"]?></span>
                    </a>
                </li>

     <?php if ($_SESSION['alt_uye_yetkialan_bir']) { ?>
                 <li class="<?php classActive('create-certificate-two',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>create-certificate-two/">
                       <i data-feather='file-plus'></i>
                         <span data-i18n="<?php echo $bloklar["newsertifikabuton"]?>"><?php echo $bloklar["newsertifikabuton"]?></span>
                    </a>
                </li>
                <?php } ?> 
                     <?php if ($_SESSION['alt_uye_yetkialan_bes']) { ?>
                 <li class="<?php classActive('qr_okuyucu',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>qr_okuyucu/">
                       <i data-feather='file-plus'></i>
                         <span data-i18n="<?php echo "Qr Bilet Okuyucu"?>">Qr Bilet Okuyucu</span>
                    </a>
                </li>
                <?php } ?> 
                  <?php if ($_SESSION['alt_uye_yetkialan_iki']) { ?>
  
              <li class="<?php classActive('create-certificate-transfer',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>create-certificate-transfer/">
                       <i data-feather='share'></i>
                         <span data-i18n="<?php echo $bloklar["sertifikatransferbuton"]?>"><?php echo $bloklar["sertifikatransferbuton"]?></span>
                    </a>
                </li>
               
                 <li class="<?php classActive('create-certificate-transfer-two',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>create-certificate-transfer-two/">
                     <i data-feather='loader'></i>
                         <span data-i18n="<?php echo $bloklar["site_link_map_sertifika_two"]?>"><?php echo $bloklar["site_link_map_sertifika_two"]?></span>
                    </a>
                </li>
                 <?php } ?> 
                <?php endif; ?>
                <?php if($uyeRow["uye_rutbe"]==2): ?>
                <li class="dropdown nav-item <?php classActive('Adreslerim',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="Adreslerim">Adreslerim</span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
           
                        <li data-menu="" class="<?php classActive("adreslerim-ekle",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>adreslerim-ekle/" data-bs-toggle="" data-i18n="adreslerim-ekle">
                                <i data-feather='list'></i>
                                <span data-i18n="adreslerim-ekle">Adres Ekle</span>
                            </a>
                        </li>
                        <li data-menu="" class="<?php classActive("adreslerim",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>adreslerim/" data-bs-toggle="" data-i18n="adreslerim">
                                <i data-feather='list'></i>
                                <span data-i18n="adreslerim">Adreslerim</span>
                            </a>
                        </li>
                        
                     
                    </ul>

                </li>
                <?php endif; ?>
                <?php if($uyeRow["uye_rutbe"]==1): ?>
                     <?php if ($_SESSION['alt_uye_yetkialan_uc']) { ?>

                <li class="dropdown nav-item <?php classActive('etkinlik-faturalari',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="Faturalar">Faturalar</span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li data-menu="" class="<?php classActive("komisyon-faturalari",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>komisyon-faturalari/" data-bs-toggle="" data-i18n="Komisyon Faturaları">
                                <i data-feather='list'></i>
                                <span data-i18n="Komisyon Faturaları">Komisyon Faturaları</span>
                            </a>
                        </li>
                        <li data-menu="" class="<?php classActive("etkinlik-faturalari",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>etkinlik-faturalari/" data-bs-toggle="" data-i18n="etkinlik-faturalari">
                                <i data-feather='list'></i>
                                <span data-i18n="etkinlik-faturalari">Etkinlik Faturaları</span>
                            </a>
                        </li>
                     
                    </ul>

                </li>
                 <?php } ?> 
              <?php endif; ?>
              <?php if($uyeRow["uye_rutbe"]==2): ?>
                <li class="dropdown nav-item <?php classActive('faturalarim',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="Faturalar">Faturalar</span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                      <li data-menu="" class="<?php classActive("fatura-talep",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>fatura-talep/" data-bs-toggle="" data-i18n="Fatura Talep">
                                <i data-feather='list'></i>
                                <span data-i18n="fatura-talep">Fatura Talep</span>
                            </a>
                        </li>
                          <li data-menu="" class="<?php classActive("faturalarim",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>faturalarim/" data-bs-toggle="" data-i18n="Faturalarım">
                                <i data-feather='list'></i>
                                <span data-i18n="faturalarim">Faturalarım</span>
                            </a>
                        </li>
                        
                     
                    </ul>

                </li>
              <?php endif; ?>



                <li class="dropdown nav-item <?php classActive('blog',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="<?php echo $bloklar["sitemap_blog"]?>"><?php echo $bloklar["sitemap_blog"]?></span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">

<?php
            $haberQuery = $db->query("SELECT * FROM haberkategori WHERE kategori_durum=1 ORDER BY kategori_id");
            if( $haberQuery->rowCount() ){
            foreach($haberQuery as $haberRow){
            $haberUrl = URL."blog/".$haberRow["kategori_id"]."_".$haberRow["kategori_url"];
            $haberUrlxyz =$haberRow["kategori_id"]."_".$haberRow["kategori_url"];
            ?>
            
        
           
                        <li data-menu="" class="<?php classActive($haberUrlxyz,@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo $haberUrl; ?>" data-bs-toggle="" data-i18n="<?php echo $haberRow[$lehce."kategori_adi"];?>">
                                <i data-feather='list'></i>
                                <span data-i18n="<?php echo $haberRow[$lehce."kategori_adi"];?>"><?php echo $haberRow[$lehce."kategori_adi"];?></span>
                            </a>
                        </li>
                       <?php
            }
            }?>
                    </ul>

                </li>
                <?php if($uyeRow["uye_rutbe"]==1): ?>
                     <?php if ($_SESSION['alt_uye_yetkialan_dort']) { ?>
                <li class="<?php classActive('database',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>database/">
                     <i data-feather='database'></i>
                         <span data-i18n="<?php echo $bloklar["sitmap_database"]?>"><?php echo $bloklar["sitmap_database"]?></span>
                    </a>
                </li>
                    <?php } ?> 
              <?php endif; ?>
                <li class="<?php classActive('contact',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>contact/">
                     <i data-feather='help-circle'></i>
                         <span data-i18n="<?php echo $bloklar["iletisim_title"]?>"><?php echo $bloklar["iletisim_title"]?></span>
                    </a>
                </li>
            </ul>


        <?php  }else{ ?> 



                        <ul class="nav navbar-nav justify-content-center" id="main-menu-navigation" data-menu="menu-navigation">
                
                <li class="<?php classActive('',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>">
                        <i data-feather="home"></i>
                         <span data-i18n="<?php echo $bloklar["homebutton"]?>"><?php echo $bloklar["homebutton"]?></span>
                    </a>
                </li>
                   <?php if($uyeRow["uye_rutbe"]==1): ?>
                    <li class="<?php classActive('certificate',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>certificate/">
                       <i data-feather='clipboard'></i>
                         <span data-i18n="<?php echo $bloklar["sertifikabuton"]?>"><?php echo $bloklar["sertifikabuton"]?></span>
                    </a>
                </li>

                 <li class="<?php classActive('create-certificate-two',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>create-certificate-two/">
                       <i data-feather='file-plus'></i>
                         <span data-i18n="<?php echo $bloklar["newsertifikabuton"]?>"><?php echo $bloklar["newsertifikabuton"]?></span>
                    </a>
                </li>
              <li class="<?php classActive('create-certificate-transfer',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>create-certificate-transfer/">
                       <i data-feather='share'></i>
                         <span data-i18n="<?php echo $bloklar["sertifikatransferbuton"]?>"><?php echo $bloklar["sertifikatransferbuton"]?></span>
                    </a>
                </li>
                 <li class="<?php classActive('create-certificate-transfer-two',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>create-certificate-transfer-two/">
                     <i data-feather='loader'></i>
                         <span data-i18n="<?php echo $bloklar["site_link_map_sertifika_two"]?>"><?php echo $bloklar["site_link_map_sertifika_two"]?></span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if($uyeRow["uye_rutbe"]==2): ?>
                <li class="dropdown nav-item <?php classActive('Adreslerim',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="Adreslerim">Adreslerim</span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        
           
                        <li data-menu="" class="<?php classActive("adreslerim-ekle",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>adreslerim-ekle/" data-bs-toggle="" data-i18n="adreslerim-ekle">
                                <i data-feather='list'></i>
                                <span data-i18n="adreslerim-ekle">Adres Ekle</span>
                            </a>
                        </li>
                        <li data-menu="" class="<?php classActive("adreslerim",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>adreslerim/" data-bs-toggle="" data-i18n="adreslerim">
                                <i data-feather='list'></i>
                                <span data-i18n="adreslerim">Adreslerim</span>
                            </a>
                        </li>
                        
                     
                    </ul>

                </li>
                <?php endif; ?>
                <?php if($uyeRow["uye_rutbe"]==1): ?>
                <li class="dropdown nav-item <?php classActive('etkinlik-faturalari',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="Faturalar">Faturalar</span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                        <li data-menu="" class="<?php classActive("komisyon-faturalari",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>komisyon-faturalari/" data-bs-toggle="" data-i18n="Komisyon Faturaları">
                                <i data-feather='list'></i>
                                <span data-i18n="Komisyon Faturaları">Komisyon Faturaları</span>
                            </a>
                        </li>
                        <li data-menu="" class="<?php classActive("etkinlik-faturalari",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>etkinlik-faturalari/" data-bs-toggle="" data-i18n="etkinlik-faturalari">
                                <i data-feather='list'></i>
                                <span data-i18n="etkinlik-faturalari">Etkinlik Faturaları</span>
                            </a>
                        </li>
                     
                    </ul>

                </li>
              <?php endif; ?>
              <?php if($uyeRow["uye_rutbe"]==2): ?>
                <li class="dropdown nav-item <?php classActive('faturalarim',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="Faturalar">Faturalar</span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">
                      <li data-menu="" class="<?php classActive("fatura-talep",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>fatura-talep/" data-bs-toggle="" data-i18n="Fatura Talep">
                                <i data-feather='list'></i>
                                <span data-i18n="fatura-talep">Fatura Talep</span>
                            </a>
                        </li>
                          <li data-menu="" class="<?php classActive("faturalarim",@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>faturalarim/" data-bs-toggle="" data-i18n="Faturalarım">
                                <i data-feather='list'></i>
                                <span data-i18n="faturalarim">Faturalarım</span>
                            </a>
                        </li>
                        
                     
                    </ul>

                </li>
              <?php endif; ?>



                <li class="dropdown nav-item <?php classActive('blog',@$par[0]);?>" data-menu="dropdown">
                      <a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:void(0);" data-bs-toggle="dropdown">
                     <i data-feather='book'></i>
                         <span data-i18n="<?php echo $bloklar["sitemap_blog"]?>"><?php echo $bloklar["sitemap_blog"]?></span>
                    </a>
                    <ul class="dropdown-menu" data-bs-popper="none">

<?php
            $haberQuery = $db->query("SELECT * FROM haberkategori WHERE kategori_durum=1 ORDER BY kategori_id");
            if( $haberQuery->rowCount() ){
            foreach($haberQuery as $haberRow){
            $haberUrl = URL."blog/".$haberRow["kategori_id"]."_".$haberRow["kategori_url"];
            $haberUrlxyz =$haberRow["kategori_id"]."_".$haberRow["kategori_url"];
            ?>
            
        
           
                        <li data-menu="" class="<?php classActive($haberUrlxyz,@$par[1]);?>" >
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo $haberUrl; ?>" data-bs-toggle="" data-i18n="<?php echo $haberRow[$lehce."kategori_adi"];?>">
                                <i data-feather='list'></i>
                                <span data-i18n="<?php echo $haberRow[$lehce."kategori_adi"];?>"><?php echo $haberRow[$lehce."kategori_adi"];?></span>
                            </a>
                        </li>
                       <?php
            }
            }?>
                    </ul>

                </li>
                <?php if($uyeRow["uye_rutbe"]==1): ?>
                <li class="<?php classActive('database',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>database/">
                     <i data-feather='database'></i>
                         <span data-i18n="<?php echo $bloklar["sitmap_database"]?>"><?php echo $bloklar["sitmap_database"]?></span>
                    </a>
                </li>
              <?php endif; ?>
                <li class="<?php classActive('contact',@$par[0]);?>" data-menu="">
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo URL;?>contact/">
                     <i data-feather='help-circle'></i>
                         <span data-i18n="<?php echo $bloklar["iletisim_title"]?>"><?php echo $bloklar["iletisim_title"]?></span>
                    </a>
                </li>
            </ul>
            <?php } ?>
        </div>
    </div>
</div>
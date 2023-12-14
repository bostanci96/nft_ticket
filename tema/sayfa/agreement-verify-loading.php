<style type="text/css">
.bg-text {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: 2;text-align: center;}
</style>



<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_sozlesme"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_sozlesme"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
<!-- Horizontal Wizard -->
<section class="horizontal-wizard">
    <div class="bs-stepper horizontal-wizard-example">
        <div class="bs-stepper-header" role="tablist">
            <div class="step" data-target="#account-details" role="tab" id="account-details-trigger" aria-selected="false">
                <button type="button" class="step-trigger">
                <span class="bs-stepper-box">1</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"><?php echo $bloklar["profile_step_one"]; ?></span>
                    <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_one_desc"]; ?></span>
                </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#personal-info" role="tab" id="personal-info-trigger" aria-selected="false">
                <button type="button" class="step-trigger">
                <span class="bs-stepper-box">2</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"><?php echo $bloklar["profile_step_two"]; ?></span>
                    <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_two_desc"]; ?></span>
                </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#address-step" role="tab" id="address-step-trigger" aria-selected="true">
                <button type="button" class="step-trigger">
                <span class="bs-stepper-box">3</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"><?php echo $bloklar["profile_step_tree"]; ?></span>
                    <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_tree_desc"]; ?></span>
                </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step active" data-target="#social-links" role="tab" id="social-links-trigger" aria-selected="true">
                <button type="button" class="step-trigger">
                <span class="bs-stepper-box">4</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"><?php echo $bloklar["profile_step_four"]; ?></span>
                    <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_four_desc"]; ?></span>
                </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                
            </div>
            <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
                
            </div>
            <div id="address-step" class="content " role="tabpanel" aria-labelledby="address-step-trigger">
                
            </div>
            <div id="social-links" class="content active" role="tabpanel" aria-labelledby="social-links-trigger">
                <div class="content-header">
                    <h5 class="mb-0"><?php echo $bloklar["sozlesme_onay_baslik"]; ?></h5>
                    <small class="text-muted"><?php echo $bloklar["sozlesme_onay_desc"]; ?></small>
                </div>
                <form role="form" class="form-horizontal"style="filter: blur(12px);-webkit-filter: blur(12px);    pointer-events: -webkit-user-select: none;-ms-user-select: none;user-select: none;">
                    <div class="row">
                        <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                               <div class="col-12">
                            <div class="mb-1">
                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading"><?php echo $bloklar["sozlesme_alert_baslik"]; ?></h4>
                                            <div class="alert-body"><?php echo $bloklar["sozlesme_alert_desc"]; ?></div>
                                        </div>
                                    </div>
                                </div>
                        
                        <div class="col-12">
                            <div class="mb-1">
                                    <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/sozlezme_pdf/big/<?php echo $uyeRow["uye_sozlezme_pdf"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["sozlesme_input"]; ?></label>
                                <input class="form-control"  name="sozlezme_pdf[]" id="sozlezme_pdf[]" type="file" id="formFile" disabled />
                            </div>
                        </div>
                           <div class="col-md-12"> <div class="mb-1">

                                                <div class="form-check">
                                                    <input class="form-check-input" name="privacypolicy" id="register-privacy-policy" type="checkbox" tabindex="4" />
                                                    <label class="form-check-label" for="register-privacy-policy"><?=$bloklar["sozlesme_input_onay"]?></label>
                                                </div>
                                            </div></div> 
                  
                        
                    </div>
                </form>
                 <div class="bg-text">
                        <div class="alert alert-success" role="alert">
                             <h2 class="alert-heading"><?php echo $bloklar["sozlesme_onay_loading_baslik"]; ?></h2>
                              <div class="alert-body">
                                   <?php echo $bloklar["sozlesme_onay_loading_desc"]; ?>
                              </div>
                         </div>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- /Horizontal Wizard -->
</div>


<style>
          #preview{
              width:100%!important;
              transform:scaleX(1)!important;
       height:100%!important;
          }
      </style>
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">QR Bilet Okuyucu</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active">QR Bilet Okuyucu
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div><div class="content-body">

    <video id="preview"></video>
      <br>
      <select style="display:none;" id="cameras"></select>
   </body>
   <script>
   let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
 
scanner.addListener('scan', function (content) {
   //Barkod okunduğunda veriyi burası yakalayacaktır.
   window.location.href = content;
});
 
let cameraList = []; //Tüm kameraları tutacağımız liste.
 
Instascan.Camera.getCameras().then(function (cameras, image) {
   //PC'de ki tüm kameraları algılayarak bizlere getirecektir.
   this.cameraList = cameras;
   cameras.forEach(element => {
      //Gelen kameralar select elementinde listelenmektedir.
      let cameraList = document.getElementById("cameras");
      let option = document.createElement("option");
      option.text = element.id;
      option.value = element.id;
      cameraList.add(option);
      
      scanner.start(cameras[1])
   });
}).catch(() => console.error(e));
 
document.getElementById("cameras").addEventListener("change", event => {
   //Select elementinde seçilen kamerayı qr code scanner olarak belirleyen olaydır.
   scanner.start(this.cameraList.find(c => c.id == event.target.value));
})
   </script>

    </div>
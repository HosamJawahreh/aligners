<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> 
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="site-url" content="<?php echo e(url('/')); ?>">
    <title>
        <?php echo e($ApplicationSetting->item_short_name); ?>

        <?php if(isset($title) && !empty($title)): ?>
            <?php echo e(" | ".$title); ?>

        <?php endif; ?>
    </title>
    <?php echo $__env->make('thirdparty.css_back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('one_page_css'); ?>
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/layout.js')); ?>"></script>
    
<!-- File drop -->
<!-- CodeMirror editor -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.29.0/codemirror.min.js"></script>-->
<!--<script src="https://cdn.rawgit.com/Sphinxxxx/cm-resize/v0.1/src/cm-resize.js"></script>-->
<!--<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.29.0/codemirror.min.css" />-->
<!-- three.js -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/87/three.min.js"></script>-->
<!--<script src="https://cdn.rawgit.com/mrdoob/three.js/r87/examples/js/controls/OrbitControls.js"></script>-->
<!--<script src="https://cdn.rawgit.com/mrdoob/three.js/r87/examples/js/exporters/OBJExporter.js"></script>-->
<!--<script src="https://cdn.rawgit.com/mrdoob/three.js/r87/examples/js/loaders/OBJLoader.js"></script>-->
<!--<script src="https://cdn.rawgit.com/mrdoob/three.js/r87/examples/js/loaders/STLLoader.js"></script>-->
<!--<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>-->
<!--<script src="https://assets.codepen.io/4027472/GLTFLoader.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css">-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>-->

<script>

// To apply Fade Out Effect to the Preloader


    //         $("#preloader").hide();

    //   function Preloader(){
    //         // calculate height
    //         var screen_ht = jQuery(window).height();
    //         var preloader_ht =3;
    //         var padding = (screen_ht / 3) - preloader_ht;
    //         jQuery("#preloader").css("padding-top", padding + "px");
    //     }

    </script>



    <?php echo $__env->yieldPushContent('header'); ?>
<style>

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: initial;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 1;
}


.demo:hover {
opacity: 1;
border:1px solid red;
} 


.progress {
  display: block;
  width: 100%;
  height: 12px;
  position: relative;
  padding-right: 8px;
  padding-top: 2px;
}
@media    {
  .progress {
    height: 10px;
  }
}
.progress[value] {
  background-color: transparent;
  border: 0;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border-radius: 0;
}
.progress[value]::-ms-fill {
  background-color: #0074d9;
  border: 0;
}
.progress[value]::-moz-progress-bar {
  background-color: #0074d9;
  margin-right: 8px;
}
.progress[value]::-webkit-progress-inner-element {
  background-color: #eee;
}
.progress[value]::-webkit-progress-value {
  background-color: #0074d9;
}
.progress[value]::-webkit-progress-bar {
  background-color: #eee;
}

.progress-circle {
  width: 24px;
  height: 24px;
  position: absolute;
  right: 3px;
  top: -5px;
  z-index: 5;
  border-radius: 50%;
}
.progress-circle:before {
  content: "";
  width: 6px;
  height: 6px;
  background: white;
  border-radius: 50%;
  display: block;
  transform: translate(-50%, -50%);
  position: absolute;
  left: 50%;
  top: 50%;
}

.progress-group {
  margin-top: 36px;
}
@media (max-width: 991px) {
  .progress-group {
    margin-left: -18px;
    margin-right: -18px;
    flex-basis: 100%;
    padding: 18px;
  }
}
@media (max-width: 768px) {
  .progress-group {
    padding: 18px 18px 0;
    margin-bottom: 12px;
  }
}
.progress-group .title {
  margin-bottom: 18px;
}
.progress-group .wrapper {
  background: white;
  border: 1px solid #eee;
  border-radius: 12px;
  height: 14px;
  display: flex;
  filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.3));
}
.progress-group .step {
  width: 20%;
  position: relative;
}
.progress-group .step:after {
  content: "";
  height: 30px;
  width: 30px;
  background: white;
  border-radius: 50%;
  display: block;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
}
.progress-group .step:first-of-type .progress {
  padding-left: 4px;
}
.progress-group .step:first-of-type .progress[value]::-moz-progress-bar {
  border-radius: 5px 0 0 5px;
}
.progress-group .step:first-of-type .progress[value]::-webkit-progress-value {
  border-radius: 5px 0 0 5px;
}
.progress-group .step:not(:first-of-type) .progress[value]::-moz-progress-bar {
  border-radius: 0;
}
.progress-group .step:not(:first-of-type) .progress[value]::-webkit-progress-value {
  border-radius: 0;
}
.progress-group .step .progress[value] + .progress-circle {
  background: #eee;
}
.progress-group .step.step01 .progress[value]::-moz-progress-bar {
  background-color: #198754;
}
.progress-group .step.step01 .progress[value]::-webkit-progress-value {
  background-color: #198754;
}
.progress-group .step.step01 .progress[value="100"] + .progress-circle {
  background-color: #198754;
}
.progress-group .step.step02 .progress[value]::-moz-progress-bar {
  background-color: #0d6efd;
}
.progress-group .step.step02 .progress[value]::-webkit-progress-value {
  background-color: #0d6efd;
}
.progress-group .step.step02 .progress[value="100"] + .progress-circle {
  background-color: #0d6efd;
}
.progress-group .step.step03 .progress[value]::-moz-progress-bar {
  background-color: #dc3545;
}
.progress-group .step.step03 .progress[value]::-webkit-progress-value {
  background-color: #dc3545;
}
.progress-group .step.step03 .progress[value="100"] + .progress-circle {
  background-color: #dc3545;
}
.progress-group .step.step04 .progress[value]::-moz-progress-bar {
  background-color: #198754;
}
.progress-group .step.step04 .progress[value]::-webkit-progress-value {
  background-color: #198754;
}
.progress-group .step.step04 .progress[value="100"] + .progress-circle {
  background-color: #198754;
}
.progress-group .step.step05 .progress[value]::-moz-progress-bar {
  background-color: red;
}
.progress-group .step.step05 .progress[value]::-webkit-progress-value {
  background-color: red;
}
.progress-group .step.step05 .progress[value="100"] + .progress-circle {
  background-color: red;
}

.progress-labels {
  display: flex;
  justify-content: space-between;
}
.progress-labels .label {
  text-align: center;
  text-transform: uppercase;
  margin: 12px 0;
  width: 20%;
  font-size: 11px;
  padding-right: 24px;
  font-weight: 600;
  opacity: 0.7;
}

.page-title {
  letter-spacing: -0.05rem;
}
body {
    font-family: 'Roboto Slab'!important;
}
.btn {
    font-family: 'Roboto Slab'!important;
}

#obj-editor {
    position: absolute;
    top:0; left:0;

    input { display: block; }
    label {
        display: block;
        padding: .5em 1em;
        cursor: pointer;
        border-bottom: 1px solid black;
        background: steelblue;
        color: white;
    }

    #edit, .CodeMirror {
        display: none;
        width:50em; height:50vh;
        white-space: nowrap;
    }
    #toggle-edit:checked ~ #edit,
    #toggle-edit:checked ~ .CodeMirror {
        display: block;
    }
}

      body {
        margin: 0;
        padding: 0;
        background: white;
        font-family: Geneva, sans-serif;
      }
      p {
        margin: 0;
        padding: 0;
      }
      a {
        color: #3CB371;
      }
      #viewer {
        width: 100%; 
        height: 400px; 
        margin: auto; 
        background: #000000;
        margin-top: 2em;
      }
      .button {
        border-radius: 0.2em;
        background-color: white;
        color: #3CB371;
        border: 3px solid #3CB371;
        font-weight: bold;
        padding: 1em;
        cursor: pointer;
      }
      .center {
        text-align: center;
        margin-top: 2em;
      }
      canvas {
        display: block;
      }
      pre {
        padding: 1em;
        max-width: 900px;
        margin: auto;
        margin-top: 4em;
        font-size: 1.2em;
      }
      .footer {
        padding-bottom: 2em;
      }
      .mr2 {
        margin-right:2em;
      }
      

/* Image gallery stlyling */
.container {
  max-width: 900px;
  margin: 80px auto 0;
  text-align: center;
}

.container__img-holder {
  max-width: 280px;
  display: inline-block;
  vertical-align: top;
  margin-bottom: 20px;
  margin-left: 16px;
  cursor: pointer;
}



.container__img-holder img {
  width: 100%;
  height: 220px;
  display: block;
}


/* Popup Styling */
.img-popup {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(255, 255, 255, .5);
  display: flex;
  justify-content: center;
  align-items: center;
  display: none;
}

.img-popup img {
  max-width: 900px;
  width: 100%;
  opacity: 0;
  transform: translateY(-100px);
  -webkit-transform: translateY(-100px);
  -moz-transform: translateY(-100px);
  -ms-transform: translateY(-100px);
  -o-transform: translateY(-100px);
}

.close-btn {
  width: 35px;
  height: 30px;
  display: flex;
  justify-content: center;
  flex-direction: column;
  position: absolute;
  top: 20px;
  right: 20px;
  cursor: pointer;
}

.close-btn .bar {
  height: 4px;
  background: #333;
}

.close-btn .bar:nth-child(1) {
  transform: rotate(45deg);
}

.close-btn .bar:nth-child(2) {
  transform: translateY(-4px) rotate(-45deg);
}

.opened {
  display: flex;
}

.opened img {
  animation: animatepopup 1s ease-in-out .8s;
  -webkit-animation: animatepopup .3s ease-in-out forwards;
}

@keyframes  animatepopup {

  to {
    opacity: 1;
    transform: translateY(0);
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
  }

}

@media  screen and (max-width: 880px) {

  .container .container__img-holder:nth-child(3n+1) {
    margin-left: 16px;
  }

}      
      
      
	</style>
	
    <!--<link rel="preload"href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/themes/prism.min.css" as="style"/>-->

		<!--<div id="load">-->
		<!--	<div id="container" class="container-preloader">-->
		<!--		<div class="animation-preloader">-->
		<!--			<div class="spinner"></div>-->
		<!--			<div class="txt-loading">-->
		<!--				<span preloader-text="L" class="characters">L</span>-->
						
		<!--				<span preloader-text="I" class="characters">I</span>-->
						
		<!--				<span preloader-text="N" class="characters">N</span>-->
						
		<!--				<span preloader-text="E" class="characters">E</span>-->
						
		<!--				<span preloader-text="U" class="characters">U</span>-->
						
		<!--				<span preloader-text="P" class="characters">P</span>-->
						
		<!--			</div>-->
		<!--		</div>	-->
		<!--		<div class="loader-section section-left"></div>-->
		<!--		<div class="loader-section section-right"></div>-->
		<!--	</div>-->
		<!--</div>	  -->

<!-- bootstrap 5.x or 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
 
<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
 
<!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
<!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->
 
<!-- the fileinput plugin styling CSS file -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
 
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
 
<!-- the jQuery Library -->

<!-- buffer.min.js and filetype.min.js are necessary in the order listed for advanced mime type parsing and more correct
     preview. This is a feature available since v5.5.0 and is needed if you want to ensure file mime type is parsed 
     correctly even if the local file's extension is named incorrectly. This will ensure more correct preview of the
     selected file (note: this will involve a small processing overhead in scanning of file contents locally). If you 
     do not load these scripts then the mime type parsing will largely be derived using the extension in the filename
     and some basic file content parsing signatures. -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
 
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
 
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
 
<!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 
<!-- the main fileinput plugin script JS file -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
 
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
<!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->
 
<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>
</head>
  

<body class="hold-transition sidebar-mini layout-fixed">
  
    <div id="preloader" hidden>
        <div>
            <div id="preloader_image">
                <img src="https://doctor.lineup-aligners.com/assets/images/cover_4K.jpeg" style="bottom: 0;left: 50%; max-width:450px;">
            </div>
        </div>
    </div>
  
<div class="wrapper">
<!-- Preloader -->
    
   
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
    
    <div class="content-wrapper">
        
        
        <div class="content">
            <div class="container-fluid">



    

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


 <script>

$(document).ready(function(){
    $("#refinement").click(function(){
      $("#filter1").removeClass("show").addClass('collapse');
      $("#filter2").removeClass("show").addClass('collapse');
      $("#filter3").removeClass("show").addClass('collapse');
      $("#filter4").removeClass("show").addClass('collapse');
    });
 });
$(document).ready(function(){
    $("#modification").click(function(){
      $("#filter1").removeClass("show").addClass('collapse');
      $("#filter2").removeClass("show").addClass('collapse');
      $("#filter").removeClass("show").addClass('collapse');
      $("#filter4").removeClass("show").addClass('collapse');
    });
 });
$(document).ready(function(){
    $("#manufacture").click(function(){
      $("#filter1").removeClass("show").addClass('collapse');
      $("#filter").removeClass("show").addClass('collapse');
      $("#filter3").removeClass("show").addClass('collapse');
      $("#filter4").removeClass("show").addClass('collapse');
    });
 });
$(document).ready(function(){
    $("#data").click(function(){
      $("#filter").removeClass("show").addClass('collapse');
      $("#filter2").removeClass("show").addClass('collapse');
      $("#filter3").removeClass("show").addClass('collapse');
      $("#filter4").removeClass("show").addClass('collapse');
    });
 });
$(document).ready(function(){
    $("#messages").click(function(){
      $("#filter1").removeClass("show").addClass('collapse');
      $("#filter2").removeClass("show").addClass('collapse');
      $("#filter3").removeClass("show").addClass('collapse');
      $("#filter").removeClass("show").addClass('collapse');
    });
 });
 
</script>   



<!--  <script src="https://doctor.lineup-aligners.com/assets/js/lib/dist/js-3d-model-viewer.js"></script>-->
<!--  <script>-->
<!--  var modelPlayer = this.Js3dModelViewer-->
<!--  var nameElement = document.getElementById('name')-->
<!--  var loadingElement = document.getElementById('loading')-->
<!--  var viewerElement = document.getElementById('viewer')-->
<!--  var scene = modelPlayer.prepareScene(viewerElement, {-->
<!--    grid: true,-->
<!--    background: 'rgb(80, 80, 80)'-->
<!--  })-->

<!--  viewerElement.addEventListener('loading', function (event) {-->
<!--    if (event.detail.loaded === 0) {-->
<!--      nameElement.innerHTML = 'Loading...'-->
<!--    } -->
<!--    var progress = Math.floor(100 * event.detail.loaded / event.detail.total)-->
<!--    loadingElement.innerHTML = progress + '%'-->
<!--  })-->

<!--  modelPlayer.loadObject(scene, 'https://doctor.lineup-aligners.com/lara/patient-case-studies/IronMan.obj', null, function () {-->
<!--    nameElement.innerHTML = 'obj'-->
<!--    loadingElement.innerHTML = ''-->
<!--  })-->

<!--  var fullScreenButton = document.getElementById('fullscreen-button')-->
<!--  fullScreenButton.addEventListener('click', function () {-->
<!--    modelPlayer.goFullScreen(viewerElement)-->
<!--  })-->

<!--  var sample1Button = document.getElementById('sample-1-button')-->
<!--  sample1Button.addEventListener('click', function () {-->
<!--    modelPlayer.clearScene(scene)-->
<!--    modelPlayer.resetCamera(scene)-->
<!--    modelPlayer.showGrid(scene)-->
<!--    nameElement.innerHTML = 'obj'-->
<!--    modelPlayer.loadObject(scene, 'https://doctor.lineup-aligners.com/lara/patient-case-studies/IronMan.obj', null, function () {-->
<!--      loadingElement.innerHTML = ''-->
<!--    })-->
<!--  })-->

<!--  var sample2Button = document.getElementById('sample-2-button')-->
<!--  sample2Button.addEventListener('click', function () {-->
<!--    modelPlayer.clearScene(scene)-->
<!--    modelPlayer.resetCamera(scene)-->
<!--    modelPlayer.showGrid(scene)-->
<!--    nameElement.innerHTML = 'obj 02'-->
<!--    modelPlayer.loadObject(-->
<!--      scene, -->
<!--      'https://doctor.lineup-aligners.com/assets/js/lib/assets/sample_02.obj', -->
<!--      'https://doctor.lineup-aligners.com/assets/js/lib/assets/sample_02.mtl',-->
<!--      function () {-->
<!--        loadingElement.innerHTML = ''-->
<!--    })-->
<!--  })-->

<!--  var sample3Button = document.getElementById('sample-3-button')-->
<!--  sample3Button.addEventListener('click', function () {-->
<!--    modelPlayer.clearScene(scene)-->
<!--    modelPlayer.resetCamera(scene)-->
<!--    modelPlayer.showGrid(scene)-->
<!--    nameElement.innerHTML = 'obj 03'-->
<!--    modelPlayer.loadObject(-->
<!--      scene, -->
<!--      'https://doctor.lineup-aligners.com/lara/patient-case-studies/1724316356khaled new ref upper.stl',-->
<!--      'https://doctor.lineup-aligners.com/lara/patient-case-studies/1724316356khaled new ref upper.stl',-->
<!--      function () {-->
<!--        nameElement.innerHTML = 'obj 03'-->
<!--        loadingElement.innerHTML = ''-->
<!--    })-->
<!--  })-->

<!--  var sample4Button = document.getElementById('sample-4-button')-->
<!--  sample4Button.addEventListener('click', function () {-->
<!--    modelPlayer.clearScene(scene)-->
<!--    modelPlayer.resetCamera(scene)-->
<!--    modelPlayer.showGrid(scene)-->
<!--    nameElement.innerHTML = 'obj 04'-->
<!--    modelPlayer.STLLoader(-->
<!--      scene, -->
<!--      'https://doctor.lineup-aligners.com/lara/patient-case-studies/1724316356khaled new ref upper.stl',-->
<!--      function () {-->
<!--        nameElement.innerHTML = 'obj 04'-->
<!--        loadingElement.innerHTML = ''-->
<!--    })-->
<!--  })-->

  
  

<!--  var gridCheckbox = document.querySelector('#grid-button');-->
<!--  gridCheckbox.onchange = function() {-->
<!--  if(gridCheckbox.checked) {-->
<!--    modelPlayer.showGrid(scene)-->
<!--  } else {-->
<!--    modelPlayer.hideGrid(scene)-->
<!--  }-->
<!--};-->
<!--  </script>-->

<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/prism.js"></script>-->
<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.15.0/components/prism-javascript.js"></script>-->

<!--<script>-->

<!--function STLViewer(model, elementID) {-->
<!--    var elem = document.getElementById(elementID)-->
<!--    var camera = new THREE.PerspectiveCamera(70, -->
<!--    elem.clientWidth/elem.clientHeight, 1, 1000);-->
    
<!--var renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });-->
<!--renderer.setSize(elem.clientWidth, elem.clientHeight);-->
<!--elem.appendChild(renderer.domElement);    -->
    
<!-- window.addEventListener('resize', function () {-->
<!--    renderer.setSize(elem.clientWidth, elem.clientHeight);-->
<!--    camera.aspect = elem.clientWidth/elem.clientHeight;-->
<!--    camera.updateProjectionMatrix();-->
<!--}, false);   -->
    
<!--var controls = new THREE.OrbitControls(camera, renderer.domElement);-->
<!--controls.enableDamping = true;-->
<!--controls.rotateSpeed = 0.05;-->
<!--controls.dampingFactor = 0.1;-->
<!--controls.enableZoom = true;-->
<!--controls.autoRotate = true;-->
<!--controls.autoRotateSpeed = .75;-->

<!--var scene = new THREE.Scene();-->
<!--scene.add(new THREE.HemisphereLight(0xffffff, 1.5));-->
    
<!--(new THREE.STLLoader()).load(model, function (geometry) {-->
<!--    var material = new THREE.MeshPhongMaterial({ -->
<!--        color: 0xff5533, -->
<!--        specular: 100, -->
<!--        shininess: 100 });-->
<!--    var mesh = new THREE.Mesh(geometry, material);-->
<!--        scene.add(mesh);-->
        
<!--var middle = new THREE.Vector3();-->
<!--geometry.computeBoundingBox();-->
<!--geometry.boundingBox.getCenter(middle);-->
<!--mesh.geometry.applyMatrix(new THREE.Matrix4().makeTranslation( -->
<!--                              -middle.x, -middle.y, -middle.z ) );       -->
<!--var largestDimension = Math.max(geometry.boundingBox.max.x,-->
<!--                            geometry.boundingBox.max.y, -->
<!--                            geometry.boundingBox.max.z)-->
<!--camera.position.z = largestDimension * 1.5;-->

<!--var animate = function () {-->
<!--    requestAnimationFrame(animate);-->
<!--    controls.update();-->
<!--    renderer.render(scene, camera);-->
<!--}; -->

<!--  animate();-->
<!--    });-->
<!--}-->

<!--</script>-->

<script>
$(document).ready(function() {

  // required elements
  var imgPopup = $('.img-popup');
  var imgCont  = $('.container__img-holder');
  var popupImage = $('.img-popup img');
  var closeBtn = $('.close-btn');

  // handle events
  imgCont.on('click', function() {
    var img_src = $(this).children('img').attr('src');
    imgPopup.children('img').attr('src', img_src);
    imgPopup.addClass('opened');
  });

  $(imgPopup, closeBtn).on('click', function() {
    imgPopup.removeClass('opened');
    imgPopup.children('img').attr('src', '');
  });

  popupImage.on('click', function(e) {
    e.stopPropagation();
  });
  
});
</script>

<?php echo $__env->make('thirdparty.js_back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('one_page_js'); ?>
<?php echo $__env->make('thirdparty.js_back_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('footer'); ?>
              

</body>
</html>


<?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/layouts/layout.blade.php ENDPATH**/ ?>
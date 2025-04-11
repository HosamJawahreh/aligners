<?php

header("Location: https://lineup-aligners.com"); 
exit();

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
    <meta name="site-url" content="<?php echo e(url('/')); ?>">
    <meta name="locale" content="<?php echo e(session('locale')); ?>">
	<title><?php echo e($ApplicationSetting->item_name); ?> | <?php echo app('translator')->get('Home'); ?> :: ambitiousit.net</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.css')); ?>">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/style-starter.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/frontend.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/frontend-index.css')); ?>">
    <?php if(session('locale') == 'ar'): ?>
        <link href="<?php echo e(asset('assets/css/bootstrap-rtl.min.css')); ?>" rel="stylesheet">
    <?php else: ?>
        <link href="<?php echo e(asset('assets/plugins/alertifyjs/css/themes/bootstrap.min.css')); ?>" rel="stylesheet">
    <?php endif; ?>
	<!-- Template CSS -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
	<!-- sweetalert2 CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert2/sweetalert2.min.css')); ?>">
	<!-- flatpickr CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/flatpickr/flatpickr.min.css')); ?>">
    <!-- flag -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/flag-icons-3.1.0/css/flag-icon.css')); ?>">
</head>

<body>
	<?php echo $__env->make('frontend.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<section class="w3l-about5">
		<div class="container-fluid px-0">
			<div class="history-info position-relative">
				<div class="heading text-center mx-auto">
					<h3 class="hny-title two"><?php echo e($contents->headline ?? ''); ?></h3>
					<p class="mt-3"><?php echo e($contents->tagline ?? ''); ?></p>
					<a href="#small-dialog" class="popup-with-zoom-anim play-view text-center position-absolute">
						<span class="video-play-icon">
							<span class="fas fa-play"></span>
						</span>
					</a>
				</div>
				<div class="position-relative">
					<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
					<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<iframe src="https://www.youtube-nocookie.com/embed/I5fxqp7zh1c?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="w3l-free-consultion">
		<div class="container">
			<div class="consultation-grids">
				<div class="apply-form">
					<h5><?php echo app('translator')->get('Book an Appointment'); ?></h5>
					<form id="appointmentForm" action="" method="get">
						<input type="hidden" name="company_id" value="1">
						<div class="admission-form">
							<div class="form-group">
								<input type="text" name="name" class="form-control" placeholder="<?php echo app('translator')->get('Full Name'); ?>*" required>
							</div>
							<div class="form-group">
								<input type="text" name="phone" class="form-control" placeholder="<?php echo app('translator')->get('Phone Number'); ?>*" required>
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="<?php echo app('translator')->get('Email'); ?>*" required>
							</div>
							<select name="doctor_id" id="doctor_id" class="form-control" required>
							</select>
							<div class="form-group">
								<input type="text" name="appointment_date" id="appointment_date" class="form-control flatpickr" placeholder="<?php echo app('translator')->get('Appointment Date'); ?>*" required>
							</div>
							<div class="form-group">
								<select id="appointment_slot" name="appointment_slot" class="form-control" required>
									<option value=""><?php echo app('translator')->get('Select Appointment Slot'); ?>*</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<textarea name="problem" class="form-control" placeholder="<?php echo app('translator')->get('Problem'); ?>"></textarea>
						</div>
						<button type="submit" class="btn btn-primary submit"><?php echo app('translator')->get('Book Now'); ?></button>
					</form>
				</div>
				<div class="consultation-img">
					<img src="<?php echo e(asset('assets/images/ab.jpg')); ?>" class="img-fluid" alt="/">
				</div>
			</div>
		</div>
	</section>

	<!-- /content-6-->
	<section class="w3l-content-6">
		<!-- /content-6-main-->
		<div class="content-6-mian py-5">
			<div class="container py-lg-5">
				<div class="title-content text-left mb-4">
					<h6 class="sub-title"><?php echo app('translator')->get('We are Here'); ?></h6>
					<h3 class="hny-title"><?php echo e($contents->welcome ?? ''); ?></h3>
				</div>
				<div class="content-info-in row">
					<div class="content-gd col-lg-6 pl-lg-4">
						<p><?php echo e($contents->welCol1 ?? ''); ?></p>
					</div>
					<div class="content-gd col-lg-6 pl-lg-4 pl-lg-4">
						<p><?php echo e($contents->welCol2 ?? ''); ?></p>
					</div>
				</div>
		    </div>
        </div>
	</section>
	<!-- //content-6-->

	<!-- /specification-6-->
	<section class="w3l-specification-6">
		<div class="specification-6-mian py-5">
			<div class="container py-lg-5">
				<div class="row story-6-grids text-left">
					<div class="col-lg-5 story-gd">
						<img src="<?php echo e(asset('assets/images/ab1.jpg')); ?>" class="img-fluid" alt="/">
					</div>
					<div class="col-lg-7 story-gd pl-lg-4">
						<div class="title-content text-left mb-lg-5 mt-4">
							<h6 class="sub-title"><?php echo app('translator')->get('For a New smile'); ?></h6>
							<h3 class="hny-title"><?php echo e($contents->caring ?? ''); ?></h3>
							<p><?php echo e($contents->caringText ?? ''); ?></p>
						</div>
						<div class="skill_info mt-lg-5 mt-4">
							<div class="stats_left">
								<div class="counter_grid">
									<div class="icon_info">
										<p class="counter"><?php echo e($contents->appointmentCount ?? ''); ?></p>
										<h4><?php echo app('translator')->get('Daily appointments'); ?></h4>
										<p class="counter-para"><?php echo e($contents->appointmentText ?? ''); ?></p>
									</div>
								</div>
							</div>
							<div class="stats_left">
								<div class="counter_grid">
									<div class="icon_info">
										<p class="counter"><?php echo e($contents->clientCount ?? ''); ?></p>
										<h4><?php echo app('translator')->get('Happy Clients'); ?></h4>
										<p class="counter-para"><?php echo e($contents->clientText ?? ''); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //specification-6-->

	<!-- /w3l-content-with-photo-4-->
	<section class="w3l-content-with-photo-4">
		<!-- /content-grids-->
		<div class="content-photo-info py-5">
			<div class="container py-lg-5">
				<!-- /row-->
				<div class="content-photo-grids row">

					<div class="photo-6-inf-right col-lg-6 text-left pr-lg-5 mb-lg-0 mb-4">
						<h6 class="sub-title"><?php echo app('translator')->get('We care your smile'); ?></h6>
						<h3 class="hny-title"><?php echo app('translator')->get('Health Services'); ?>
						</h3>
						<div class="servehny-1 mt-4">
							<div class="ser-sub">
                                <?php $__currentLoopData = $contents->services ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(empty($service)) continue; ?>
                                <a href="#link" class="ser1"><span class="fas fa-check"></span> <?php echo e($service); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
						<div class="read">
							<a class="btn mt-4" href="<?php echo e(url('/services')); ?>"><?php echo app('translator')->get('Read More'); ?></a>
						</div>
					</div>
					<div class="photo-6-inf-left col-lg-6 pr-lg-4">
						<a><img src="<?php echo e(asset('assets/images/g1.jpg')); ?>" class="img-fluid" alt=""></a>
					</div>
				</div>
				<!-- //row-->
			</div>
		</div>
	</section>
	<!-- /w3l-content-with-photo-4-->

	<!--/testimonials-->
	<section class="w3l-testimonials" id="testimonials">
		<div class="testimonials py-lg-5 py-4">
			<div class="container py-lg-5">
				<div class="row pb-lg-4 pb-5">
					<div class="col-md-10 mx-auto">
						<div class="owl-two owl-carousel owl-theme">

                            <?php
								$i = -1;
							?>
                            <?php $__currentLoopData = $contents->review ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $i++;
                                    if (empty($contents->review[$i]) || empty($contents->reviewText[$i]))
                                        continue;
                                ?>
                                <div class="item">
                                    <div class="slider-info mt-lg-4 mt-3">
                                        <div class="text-content">
                                            <div class="test-left">
                                                <div class="img-circle">
                                                    <img src="<?php echo e(asset($contents->images[$i] ?? 'assets/images/placeholder.jpg')); ?>" class="img-fluid testimonial-img"
													alt="client">
                                                </div>
                                                <div class="name">
                                                    <h4><?php echo e($contents->review[$i] ?? ''); ?></h4>
                                                    <p class="description"><?php echo e($contents->company[$i] ?? ''); ?></p>
                                                </div>
                                            </div>
                                            <div class="message">
                                                <div class="quote-icon">
                                                    <span class="fas fa-quote-left" aria-hidden="true"></span>
                                                </div>
                                                <p><?php echo e($contents->reviewText[$i] ?? ''); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--//testimonials-->
	<?php echo $__env->make('frontend.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.countup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/owl.carousel.js')); ?>"></script>
    <?php if(session('locale') == 'ar'): ?>
        <script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <?php endif; ?>
    <script src="<?php echo e(asset('assets/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/flatpickr/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/frontend/index.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home3/etahaorg/public_html/resources/views/frontend/index.blade.php ENDPATH**/ ?>
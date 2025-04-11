

<?php $__env->startSection('one_page_css'); ?>
    <link href="<?php echo e(asset('assets/css/dashboard.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('one_page_js'); ?>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('assets/plugins/chart.js/Chart.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2><?php echo app('translator')->get('Dashboard'); ?></h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('Dashboard'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-bezier-curve"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Department'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['departments']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-user-md"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Doctor'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['doctors']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-user-injured"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Patient'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['patients']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-calendar-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Patient Appointment'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['appointments']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-file-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Patient Case Studies'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['caseStudies']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-pills"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Prescription'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['prescriptions']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-invoice-dollar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Invoice'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['invoices']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-money-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><?php echo app('translator')->get('Payment'); ?></span>
                    <span class="info-box-number"><?php echo e($dashboardCounts['payments']); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title custom-color-white"><?php echo app('translator')->get('Monthly Debit/Credit'); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" class="custom-dashbord-mix"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title custom-color-white"><?php echo e(date('Y')); ?> <?php echo app('translator')->get('Debit/Credit'); ?> </h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="donutChart1" class="custom-dashbord-mix"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title custom-color-white"><?php echo app('translator')->get('Overall Debit/Credit'); ?></h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="donutChart2" class="custom-dashbord-mix"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer'); ?>
    <script src="<?php echo e(asset('assets/js/custom/dashboard/view.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/public_html/resources/views/dashboardview.blade.php ENDPATH**/ ?>
<?php $__env->startSection('one_page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fullcalendar/main.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('one_page_js'); ?>
    <script src="<?php echo e(asset('assets/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/fullcalendar/main.js')); ?>"></script>
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
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body p-0">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            "use strict";
            function ini_events(ele) {
                ele.each(function () {
                    var eventObject = {
                        title: $.trim($(this).text())
                    }
                    $(this).data('eventObject', eventObject)
                    $(this).draggable({
                        zIndex        : 1070,
                        revert        : true,
                        revertDuration: 0
                    })
                })
            }
            ini_events($('#external-events div.external-event'))
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                events: [
                    <?php if(isset($patientAppointment) && !empty($patientAppointment)): ?>
                        <?php $__currentLoopData = $patientAppointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $pName = $appointment->user->name;
                                $appointmentDate = $appointment->appointment_date;
                                $startTime = $appointment->start_time;
                                $endTime = $appointment->end_time;

                                $start = $appointmentDate."T".$startTime;
                                $end = $appointmentDate."T".$endTime;
                            ?>
                            {
                                title : '<?php echo e($pName); ?>',
                                start : '<?php echo e($start); ?>',
                                end : '<?php echo e($end); ?>',
                            },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if(isset($appointments) && !empty($appointments)): ?>
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $pName = $appointment->doctor->name;
                                $appointmentDate = $appointment->appointment_date;
                                $startTime = $appointment->start_time;
                                $endTime = $appointment->end_time;

                                $start = $appointmentDate."T".$startTime;
                                $end = $appointmentDate."T".$endTime;
                            ?>
                            {
                                title : '<?php echo e($pName); ?>',
                                start : '<?php echo e($start); ?>',
                                end : '<?php echo e($end); ?>',
                            },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if(isset($receptionistAppointments) && !empty($receptionistAppointments)): ?>
                        <?php $__currentLoopData = $receptionistAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $pName = $appointment->user->name;
                                $dName = $appointment->doctor->name;
                                $appointmentDate = $appointment->appointment_date;
                                $startTime = $appointment->start_time;
                                $endTime = $appointment->end_time;

                                $start = $appointmentDate."T".$startTime;
                                $end = $appointmentDate."T".$endTime;
                                $title = $pName." have a appointment with ".$dName;
                            ?>
                            {
                                title : '<?php echo e($title); ?>',
                                start : '<?php echo e($start); ?>',
                                end : '<?php echo e($end); ?>',
                            },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                ],
                editable  : true,
                droppable : true,
            });
            calendar.render();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/dashboards/common-dashboard.blade.php ENDPATH**/ ?>
<?php
$c = Request::segment(1);
$m = Request::segment(2);
$roleName = Auth::user()->getRoleNames();
?>

<aside class="main-sidebar sidebar-light-info elevation-4">
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link sidebar-light-info text-center">
        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="<?php echo e($ApplicationSetting->item_name); ?>"   style="height:180px;">
        <span class="brand-text font-weight-light"></span>
    </a>
    <div class="sidebar">
        <?php
            if(Auth::user()->photo == NULL)
            {
                $photo = "assets/images/profile/male.png";
            } else {
                $photo = Auth::user()->photo;
            }
        ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="">
                <img src="<?php echo e(asset($photo)); ?>" class="img-circle1" alt="User Image" style="width:75px; border-radius:15px;">
            </div>
            <div class="info my-auto text-dark">
               <b>DR.<?php echo e(Auth::user()->name); ?></b>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php if($c == 'dashboard'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><?php echo e(__('Dashboard')); ?></p>
                    </a>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['hospital-department-read', 'hospital-department-create', 'hospital-department-update', 'hospital-department-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('hospital-departments.index')); ?>" class="nav-link <?php if($c == 'hospital-departments'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-bezier-curve"></i>
                            <p><?php echo app('translator')->get('Hospital Departments'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['doctor-detail-read', 'doctor-detail-create', 'doctor-detail-update', 'doctor-detail-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('doctor-details.index')); ?>" class="nav-link <?php if($c == 'doctor-details'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p><?php echo app('translator')->get('Doctor'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['patient-detail-read', 'patient-detail-create', 'patient-detail-update', 'patient-detail-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('patient-details.index')); ?>" class="nav-link <?php if($c == 'patient-details'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-user-injured"></i>
                            <p><?php echo app('translator')->get('Patient'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['doctor-schedule-read', 'doctor-schedule-create', 'doctor-schedule-update', 'doctor-schedule-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('doctor-schedules.index')); ?>" class="nav-link <?php if($c == 'doctor-schedules'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p><?php echo app('translator')->get('Doctor Schedule'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['patient-appointment-read', 'patient-appointment-create', 'patient-appointment-update', 'patient-appointment-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('patient-appointments.index')); ?>" class="nav-link <?php if($c == 'patient-appointments'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p><?php echo app('translator')->get('Patient Appointment'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['patient-case-studies-read', 'patient-case-studies-create', 'patient-case-studies-update', 'patient-case-studies-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('patient-case-studies.index')); ?>" class="nav-link <?php if($c == 'patient-case-studies'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p><?php echo app('translator')->get('Patient Case Studies'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['prescription-read', 'prescription-create', 'prescription-update', 'prescription-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('prescriptions.index')); ?>" class="nav-link <?php if($c == 'prescriptions'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-pills"></i>
                            <p><?php echo app('translator')->get('Prescription'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['insurance-read', 'insurance-create', 'insurance-update', 'insurance-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('insurances.index')); ?>" class="nav-link <?php if($c == 'insurances'): ?> active <?php endif; ?>">
                            <i class="nav-icon fab fa-hire-a-helper"></i>
                            <p><?php echo app('translator')->get('Insurances'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['lab-report-read', 'lab-report-create', 'lab-report-update', 'lab-report-delete', 'lab-report-template-read', 'lab-report-template-create', 'lab-report-template-update', 'lab-report-template-delete'])): ?>
                    <li class="nav-item has-treeview <?php if($c == 'lab-reports' || $c == 'lab-report-templates'): ?> menu-open <?php endif; ?>">
                        <a href="javascript:void(0)" class="nav-link <?php if($c == 'lab-reports' || $c == 'lab-report-templates'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-flask"></i>
                            <p>
                                <?php echo app('translator')->get('Lab'); ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['lab-report-read', 'lab-report-create', 'lab-report-update', 'lab-report-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('lab-reports.index')); ?>" class="nav-link <?php if($c == 'lab-reports'): ?> active <?php endif; ?>">
                                        <i class="nav-icon fas fa-vial"></i>
                                        <p><?php echo app('translator')->get('Lab Report'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['lab-report-template-read', 'lab-report-template-create', 'lab-report-template-update', 'lab-report-template-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('lab-report-templates.index')); ?>" class="nav-link <?php if($c == 'lab-report-templates'): ?> active <?php endif; ?>">
                                        <i class="nav-icon fas fa-crop-alt"></i>
                                        <p><?php echo app('translator')->get('Lab Report Templates'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['account-header-read', 'account-header-create', 'account-header-update', 'account-header-delete', 'payment-read', 'payment-create', 'payment-update', 'payment-delete', 'invoice-read', 'invoice-create', 'invoice-update', 'invoice-delete', 'financial-report-read'])): ?>
                    <li class="nav-item has-treeview <?php if($c == 'account-headers' || $c == 'invoices' || $c == 'payments' || $c == 'financial-reports'): ?> menu-open <?php endif; ?>">
                        <a href="javascript:void(0)" class="nav-link <?php if($c == 'account-headers' || $c == 'invoices' || $c == 'payments' || $c == 'financial-reports'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>
                                <?php echo app('translator')->get('Financial Activities'); ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['account-header-read', 'account-header-create', 'account-header-update', 'account-header-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('account-headers.index')); ?>" class="nav-link <?php if($c == 'account-headers'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-comment-dollar"></i>
                                        <p><?php echo app('translator')->get('Account Header'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['invoice-read', 'invoice-create', 'invoice-update', 'invoice-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('invoices.index')); ?>" class="nav-link <?php if($c == 'invoices'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        <p><?php echo app('translator')->get('Invoice'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['payment-read', 'payment-create', 'payment-update', 'payment-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('payments.index')); ?>" class="nav-link <?php if($c == 'payments'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-money-check"></i>
                                        <p><?php echo app('translator')->get('Payment'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['financial-report-read'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('financial-reports.index')); ?>" class="nav-link <?php if($c == 'financial-reports'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-folder-open"></i>
                                        <p><?php echo app('translator')->get('Report'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['front-end-read', 'front-end-create', 'front-end-update', 'front-end-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('front-ends.index')); ?>" class="nav-link <?php if($c == 'front-ends'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-desktop"></i>
                            <p><?php echo app('translator')->get('Front-ends'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['contact-us-read', 'contact-us-delete'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('contacts.index')); ?>" class="nav-link <?php if($c == 'contacts'): ?> active <?php endif; ?>">
                            <i class="nav-icon far fa-address-book"></i>
                            <p><?php echo app('translator')->get('Contact Us'); ?></p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['email-template-read', 'email-template-create', 'email-template-update', 'email-template-delete', 'email-campaign-read', 'email-campaign-create', 'email-campaign-update', 'email-campaign-delete'])): ?>
                    <li class="nav-item has-treeview <?php if($c == 'email-templates' || $c == 'email-campaigns'): ?> menu-open <?php endif; ?>">
                        <a href="javascript:void(0)" class="nav-link <?php if($c == 'email-templates' || $c == 'email-campaigns'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                <?php echo app('translator')->get('Email'); ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['email-template-read', 'email-template-create', 'email-template-update', 'email-template-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('email-templates.index')); ?>" class="nav-link <?php if($c == 'email-templates'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-crop-alt"></i>
                                        <p><?php echo app('translator')->get('Email Tempaltes'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['email-campaign-read', 'email-campaign-create', 'email-campaign-update', 'email-campaign-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('email-campaigns.index')); ?>" class="nav-link <?php if($c == 'email-campaigns'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-bullhorn"></i>
                                        <p><?php echo app('translator')->get('Email Campaigns'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['sms-api-read', 'sms-api-create', 'sms-api-update', 'sms-api-delete', 'sms-template-read', 'sms-template-create', 'sms-template-update', 'sms-template-delete','sms-campaign-read', 'sms-campaign-create', 'sms-campaign-update', 'sms-campaign-delete'])): ?>
                    <li class="nav-item has-treeview <?php if($c == 'sms-apis' || $c == 'sms-templates' || $c == 'sms-campaigns'): ?> menu-open <?php endif; ?>">
                        <a href="javascript:void(0)" class="nav-link <?php if($c == 'sms-apis' || $c == 'sms-templates' || $c == 'sms-campaigns'): ?> active <?php endif; ?>">
                            <i class="nav-icon fas fa-sms"></i>
                            <p>
                                <?php echo app('translator')->get('SMS'); ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['sms-api-read', 'sms-api-create', 'sms-api-update', 'sms-api-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('sms-apis.index')); ?>" class="nav-link <?php if($c == 'sms-apis'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-map-signs"></i>
                                        <p><?php echo app('translator')->get('SMS Gateway'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['sms-template-read', 'sms-template-create', 'sms-template-update', 'sms-template-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('sms-templates.index')); ?>" class="nav-link <?php if($c == 'sms-templates'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-crop-alt"></i>
                                        <p><?php echo app('translator')->get('SMS Tempaltes'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['sms-campaign-read', 'sms-campaign-create', 'sms-campaign-update', 'sms-campaign-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('sms-campaigns.index')); ?>" class="nav-link <?php if($c == 'sms-campaigns'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-bullhorn"></i>
                                        <p><?php echo app('translator')->get('SMS Campaigns'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-read', 'role-create', 'role-update', 'role-delete', 'user-read', 'user-create', 'user-update', 'user-delete', 'smtp-read', 'smtp-create', 'smtp-update', 'smtp-delete','company-read', 'company-create', 'company-update', 'company-delete', 'currencies-read', 'currencies-create', 'currencies-update', 'currencies-delete','tax-rate-read', 'tax-rate-create', 'tax-rate-update', 'tax-rate-delete'])): ?>
                    <li class="nav-item has-treeview <?php if($c == 'roles' || $c == 'users' || $c == 'apsetting' || $c == 'smtp-configurations' || $c == 'general' || $c == 'currency' || $c == 'tax' ): ?> menu-open <?php endif; ?>">
                        <a href="javascript:void(0)" class="nav-link <?php if($c == 'roles' || $c == 'users' || $c == 'apsetting' || $c == 'smtp-configurations' || $c == 'general' || $c == 'currency' || $c == 'tax'  ): ?> active <?php endif; ?>">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                <?php echo app('translator')->get('Settings'); ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['role-read', 'role-create', 'role-update', 'role-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('roles.index')); ?>" class="nav-link <?php if($c == 'roles'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-cube nav-icon"></i>
                                        <p><?php echo app('translator')->get('Role Management'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['user-read', 'user-create', 'user-update', 'user-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php if($c == 'users'): ?> active <?php endif; ?> ">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p><?php echo app('translator')->get('User Management'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($roleName['0'] = "Super Admin"): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('apsetting')); ?>" class="nav-link <?php if($c == 'apsetting' && $m == null): ?> active <?php endif; ?> ">
                                        <i class="fa fa-globe nav-icon"></i>
                                        <p><?php echo app('translator')->get('Application Settings'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['smtp-read', 'smtp-create', 'smtp-update', 'smtp-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('smtp-configurations.index')); ?>" class="nav-link <?php if($c == 'smtp-configurations'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-mail-bulk nav-icon"></i>
                                        <p><?php echo app('translator')->get('SMTP Settings'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['company-read', 'company-create', 'company-update', 'company-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('general')); ?>" class="nav-link <?php if($c == 'general'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-align-left nav-icon"></i>
                                        <p><?php echo app('translator')->get('General Settings'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['currencies-read', 'currencies-create', 'currencies-update', 'currencies-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('currency.index')); ?>" class="nav-link <?php if($c == 'currency'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-coins nav-icon"></i>
                                        <p><?php echo app('translator')->get('Currencies'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['tax-rate-read', 'tax-rate-create', 'tax-rate-update', 'tax-rate-delete'])): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('tax.index')); ?>" class="nav-link <?php if($c == 'tax'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-percentage nav-icon"></i>
                                        <p><?php echo app('translator')->get('Tax Rates'); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if($roleName['0'] == "Super Admin"): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('update.index')); ?>" class="nav-link <?php if($c == 'update'): ?> active <?php endif; ?> ">
                                        <i class="fas fa-sync-alt nav-icon"></i>
                                        <p><?php echo e(__('Update')); ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH /home3/etahaorg/public_html/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>
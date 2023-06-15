<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?php echo e(route('admin.home')); ?>">
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="<?php echo e(active_menu('admin-home')); ?>">
                        <a href="<?php echo e(route('admin.home')); ?>"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo app('translator')->get('dashboard'); ?></span>
                        </a>
                    </li>
                    <?php if('super_admin' == auth()->user()->role): ?>
                    <li
                        class="
                        <?php echo e(active_menu('admin-home/new-user')); ?>

                        <?php echo e(active_menu('admin-home/all-user')); ?>

                        "
                    >
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i> <span><?php echo e(__('Admin Role Manage')); ?></span></a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/all-user')); ?>"><a href="<?php echo e(route('admin.all.user')); ?>"><?php echo e(__('All Admin')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/new-user')); ?>"><a href="<?php echo e(route('admin.new.user')); ?>"><?php echo e(__('Add New Admin')); ?></a></li>
                        </ul>
                    </li>
                        <li
                            class="
                            <?php echo e(active_menu('admin-home/newsletter')); ?>

                            <?php if(request()->is('admin-home/newsletter/*')): ?> active <?php endif; ?>
                            "
                        >
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i> <span><?php echo e(__('Newsletter Manage')); ?></span></a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/newsletter')); ?>"><a href="<?php echo e(route('admin.newsletter')); ?>"><?php echo e(__('All Subscriber')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/newsletter/all')); ?>"><a href="<?php echo e(route('admin.newsletter.mail')); ?>"><?php echo e(__('Send Mail To All')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                  <li class="main_dropdown <?php if(request()->is(['package/payment-logs','package/payment-logs/report/*','package/order-manage/*','package/order-page','package/order-report'])): ?> active <?php endif; ?>">
                  <a href="javascript:void(0)" aria-expanded="true">
                      <i class="ti-package"></i>
                      <span><?php echo e(__('Package Orders Manage')); ?></span></a>
                  <ul class="collapse">

                      <li class="<?php echo e(active_menu('package/order-manage/all')); ?>"><a
                                  href="<?php echo e(route('admin.package.order.manage.all')); ?>"><?php echo e(__('All Order')); ?></a></li>

                      <li class="<?php echo e(active_menu('package/order-manage/pending')); ?>"><a
                                  href="<?php echo e(route('admin.package.order.manage.pending')); ?>"><?php echo e(__('Pending Order')); ?></a></li>

                      <li class="<?php echo e(active_menu('package/order-manage/in-progress')); ?>"><a
                                  href="<?php echo e(route('admin.package.order.manage.in.progress')); ?>"><?php echo e(__('In Progress Order')); ?></a></li>

                      <li class="<?php echo e(active_menu('package/order-manage/completed')); ?>"><a
                                  href="<?php echo e(route('admin.package.order.manage.completed')); ?>"><?php echo e(__('Completed Order')); ?></a></li>

                      <li class="<?php echo e(active_menu('package/order-manage/success-page')); ?>"><a
                                  href="<?php echo e(route('admin.package.order.success.page')); ?>"><?php echo e(__('Success Order Page')); ?></a></li>

                      <li class="<?php echo e(active_menu('package/order-manage/cancel-page')); ?>"><a
                                  href="<?php echo e(route('admin.package.order.cancel.page')); ?>"><?php echo e(__('Cancel Order Page')); ?></a></li>

                      <li class="<?php echo e(active_menu('package/order-page')); ?>">
                          <a href="<?php echo e(route('admin.package.order.page')); ?>"><?php echo e(__('Order Page Manage')); ?></a>
                      </li>

                      <li class="<?php echo e(active_menu('package/order-report')); ?>">
                          <a href="<?php echo e(route('admin.package.order.report')); ?>"><?php echo e(__('Order Report')); ?></a>
                      </li>

                      <li class="<?php echo e(active_menu('package/payment-logs')); ?>"><a
                                  href="<?php echo e(route('admin.payment.logs')); ?>"><?php echo e(__('All Payment Logs')); ?></a></li>

                      <li class="<?php echo e(active_menu('package/payment-logs/report')); ?>"><a
                                  href="<?php echo e(route('admin.payment.report')); ?>"><?php echo e(__('Payment Report')); ?></a></li>
                  </ul>
                  </li>

                        <li class="<?php echo e(active_menu('admin-home/home-variant')); ?>">
                            <a href="<?php echo e(route('admin.home.variant')); ?>"
                               aria-expanded="true">
                                <i class="ti-file"></i>
                                <span><?php echo e(__('Home Variant')); ?></span>
                            </a>
                        </li>

                        <li class="<?php echo e(active_menu('admin-home/navbar-settings')); ?>">
                            <a href="<?php echo e(route('admin.navbar.settings')); ?>"
                               aria-expanded="true">
                                <i class="ti-file"></i>
                                <span><?php echo e(__('Nabvar Settings')); ?></span>
                            </a>
                        </li>
                        <li class="<?php if(request()->is('admin-home/home-page-01/*')  ): ?> active <?php endif; ?>
                        <?php echo e(active_menu('admin-home/header')); ?>

                        <?php echo e(active_menu('admin-home/keyfeatures')); ?>

                                ">
                            <a href="javascript:void(0)"
                               aria-expanded="true">
                                <i class="ti-home"></i>
                                <span><?php echo e(__('Home Page Manage')); ?></span>
                            </a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/header')); ?>">
                                    <a href="<?php echo e(route('admin.header')); ?>" >
                                        <?php echo e(__('Header Area')); ?>

                                    </a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/keyfeatures')); ?>">
                                    <a href="<?php echo e(route('admin.keyfeatures')); ?>"><?php echo e(__('Key Features')); ?></a>
                                </li>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/build-dream')); ?>"><a href="<?php echo e(route('admin.homeone.build.dream')); ?>"><?php echo e(__('Build Dream Area')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/service-area')); ?>"><a href="<?php echo e(route('admin.homeone.service.area')); ?>"><?php echo e(__('Service Area')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/counterup')); ?>"><a href="<?php echo e(route('admin.homeone.counterup')); ?>"><?php echo e(__('Counterup Area')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/recent-work')); ?>"><a href="<?php echo e(route('admin.homeone.recent.work')); ?>"><?php echo e(__('Recent Work Area')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/testimonial')); ?>"><a href="<?php echo e(route('admin.homeone.testimonial')); ?>"><?php echo e(__('Testimonial Area')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/latest-news')); ?>"><a href="<?php echo e(route('admin.homeone.latest.news')); ?>"><?php echo e(__('Latest News Area')); ?></a></li>
                                <?php if(get_static_option('home_page_variant') == '02' || get_static_option('home_page_variant') == '03'): ?>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/price-plan')); ?>"> <a href="<?php echo e(route('admin.homeone.price.plan')); ?>"><?php echo e(__('Price Plan Area')); ?></a></li>
                                <?php endif; ?>
                                <?php if(get_static_option('home_page_variant') == '03'): ?>
                                    <li class="<?php echo e(active_menu('admin-home/home-page-01/team-member')); ?>"> <a href="<?php echo e(route('admin.homeone.team.member')); ?>"><?php echo e(__('Team Member Area')); ?></a></li>
                                <?php endif; ?>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/newsletter')); ?>"> <a href="<?php echo e(route('admin.homeone.newsletter')); ?>"><?php echo e(__('Newsletter Area')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/home-page-01/section-manage')); ?>"> <a href="<?php echo e(route('admin.homeone.section.manage')); ?>"><?php echo e(__('Section Manage')); ?></a></li>
                            </ul>
                        </li>

                        <li class="<?php if(request()->is('admin-home/about-page/*')  ): ?> active <?php endif; ?> ">
                            <a href="javascript:void(0)"
                               aria-expanded="true">
                                <i class="ti-home"></i>
                                <span><?php echo e(__('About Page Manage')); ?></span>
                            </a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/about-page/about-us')); ?>"><a href="<?php echo e(route('admin.about.page.about')); ?>"><?php echo e(__('About Us Section')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/about-page/team-member')); ?>"><a href="<?php echo e(route('admin.about.team.member')); ?>"><?php echo e(__('Team Member Section')); ?></a></li>

                            </ul>
                        </li>
                        <li class="<?php if(request()->is('admin-home/service-page/*')  ): ?> active <?php endif; ?>
                                ">
                            <a href="javascript:void(0)"
                               aria-expanded="true">
                                <i class="ti-home"></i>
                                <span><?php echo e(__('Service Page Manage')); ?></span>
                            </a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/service-page/price-plan')); ?>"><a href="<?php echo e(route('admin.service.page.price.plan')); ?>"><?php echo e(__('Price Plan Section')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/service-page/cta')); ?>"><a href="<?php echo e(route('admin.service.page.cta')); ?>"><?php echo e(__('Call TO Action Section')); ?></a></li>
                            </ul>
                        </li>
                        <li class="<?php if(request()->is('admin-home/team-page/*')  ): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)"
                               aria-expanded="true">
                                <i class="ti-home"></i>
                                <span><?php echo e(__('Team Page Manage')); ?></span>
                            </a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/team-page/about-team')); ?>"><a href="<?php echo e(route('admin.team.page.about')); ?>"><?php echo e(__('About Team Section')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/team-page/team-member')); ?>"><a href="<?php echo e(route('admin.team.page.team.member')); ?>"><?php echo e(__('Team Members Section')); ?></a></li>
                            </ul>
                        </li>
                        <li class="<?php if(request()->is('admin-home/contact-page/*')  ): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)"
                               aria-expanded="true">
                                <i class="ti-home"></i>
                                <span><?php echo e(__('Contact Page Manage')); ?></span>
                            </a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/contact-page/contact-info')); ?>"><a href="<?php echo e(route('admin.contact.info')); ?>"><?php echo e(__('Contact Info')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/contact-page/form-area')); ?>"><a href="<?php echo e(route('admin.contact.page.form.area')); ?>"><?php echo e(__('Form Area')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/contact-page/map')); ?>"><a href="<?php echo e(route('admin.contact.page.map')); ?>"><?php echo e(__('Google Map Area')); ?></a></li>
                            </ul>
                        </li>

                        <li class="main_dropdown <?php if(request()->is('admin-home/quote-manage/*','admin-home/quote-page')): ?> active <?php endif; ?> ">
                         <a href="javascript:void(0)" aria-expanded="true"><i class="ti-home"></i>
                             <span><?php echo e(__('Quote Manage')); ?></span></a>
                         <ul class="collapse">
                             <li class="<?php echo e(active_menu('admin-home/quote-manage/all')); ?>"><a
                                         href="<?php echo e(route('admin.quote.manage.all')); ?>"><?php echo e(__('All Quote')); ?></a></li>
                             <li class="<?php echo e(active_menu('admin-home/quote-manage/pending')); ?>"><a
                                         href="<?php echo e(route('admin.quote.manage.pending')); ?>"><?php echo e(__('Pending Quote')); ?></a>
                             </li>
                             <li class="<?php echo e(active_menu('admin-home/quote-manage/completed')); ?>"><a
                                         href="<?php echo e(route('admin.quote.manage.completed')); ?>"><?php echo e(__('Complete Quote')); ?></a>
                             </li>
                             <li class="<?php echo e(active_menu('admin-home/quote-page')); ?>">
                                 <a href="<?php echo e(route('admin.quote.page')); ?>"><?php echo e(__('Quote Page Manage')); ?></a>

                             </li>
                         </ul>
                     </li>

                        <li class="<?php echo e(active_menu('admin-home/order-page')); ?>">
                            <a href="<?php echo e(route('admin.order.page')); ?>"
                               aria-expanded="true">
                                <i class="ti-dashboard"></i>
                                <span><?php echo e(__('Order Page Manage')); ?></span>
                            </a>
                        </li>
                    <li class="<?php echo e(active_menu('admin-home/topbar')); ?>">
                        <a href="<?php echo e(route('admin.topbar')); ?>"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo e(__('Top Bar Settings')); ?></span>
                        </a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/widgets')); ?>">
                        <a href="<?php echo e(route('admin.widgets')); ?>"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span><?php echo e(__('Widget Builder')); ?></span>
                        </a>
                    </li>

                    <li class="
                    <?php if(request()->is('admin-home/services/*')): ?> active <?php endif; ?>
                    <?php echo e(active_menu('admin-home/services')); ?>

                            ">
                        <a href="javascript:void(0)"
                           aria-expanded="true">
                            <i class="ti-layout"></i>
                            <span><?php echo e(__('Services')); ?></span>
                        </a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/services')); ?>"><a href="<?php echo e(route('admin.services')); ?>"><?php echo e(__('All Services')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/services-new')); ?>"><a href="<?php echo e(route('admin.services.new')); ?>"><?php echo e(__('Add New')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/services/category')); ?>"><a href="<?php echo e(route('admin.service.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                        </ul>
                    </li>
                    <li class="
                    <?php if(request()->is('admin-home/works/*')): ?> active <?php endif; ?>
                    <?php echo e(active_menu('admin-home/works')); ?>

                            ">
                        <a href="javascript:void(0)"
                           aria-expanded="true">
                            <i class="ti-layout"></i>
                            <span><?php echo e(__('Works')); ?></span>
                        </a>
                        <ul class="collapse">
                            <li class="<?php echo e(active_menu('admin-home/works')); ?>"><a href="<?php echo e(route('admin.work')); ?>"><?php echo e(__('All Works')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/works/add')); ?>"><a href="<?php echo e(route('admin.work.add')); ?>"><?php echo e(__('Add New Work')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/works/category')); ?>"><a href="<?php echo e(route('admin.work.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                        </ul>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/faq')); ?>">
                        <a href="<?php echo e(route('admin.faq')); ?>" aria-expanded="true"><i class="ti-control-forward"></i> <span><?php echo e(__('Faq')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/brands')); ?>">
                        <a href="<?php echo e(route('admin.brands')); ?>" aria-expanded="true"><i class="ti-control-forward"></i> <span><?php echo e(__('Brand Logos')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/price-plan')); ?>">
                        <a href="<?php echo e(route('admin.price.plan')); ?>" aria-expanded="true"><i class="ti-control-forward"></i> <span><?php echo e(__('Price Plan')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/team-member')); ?>">
                        <a href="<?php echo e(route('admin.team.member')); ?>" aria-expanded="true"><i class="ti-control-forward"></i> <span><?php echo e(__('Team Members')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/testimonial')); ?>">
                        <a href="<?php echo e(route('admin.testimonial')); ?>" aria-expanded="true"><i class="ti-control-forward"></i> <span><?php echo e(__('Testimonial')); ?></span></a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/blog-page')); ?>">
                        <a href="<?php echo e(route('admin.blog.page')); ?>"
                           aria-expanded="true">
                            <i class="ti-file"></i>
                            <span><?php echo e(__('Blog Page')); ?></span>
                        </a>
                    </li>
                    <li class="<?php echo e(active_menu('admin-home/counterup')); ?>">
                        <a href="<?php echo e(route('admin.counterup')); ?>" aria-expanded="true"><i class="ti-exchange-vertical"></i> <span><?php echo e(__('Counterup')); ?></span></a>
                    </li>

                    <?php if('super_admin' == auth()->user()->role || 'admin' == auth()->user()->role || 'editor' == auth()->user()->role): ?>
                        <li
                                class="
                        <?php echo e(active_menu('admin-home/blog')); ?>

                                <?php echo e(active_menu('admin-home/blog-category')); ?>

                                <?php echo e(active_menu('admin-home/new-blog')); ?>

                                <?php if(request()->is('admin-home/blog-edit/*')): ?> active <?php endif; ?>
                                        "
                        >
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i> <span><?php echo e(__('Blogs')); ?></span></a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/blog')); ?>"><a href="<?php echo e(route('admin.blog')); ?>"><?php echo e(__('All Blog')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/blog-category')); ?>"><a href="<?php echo e(route('admin.blog.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/new-blog')); ?>"><a href="<?php echo e(route('admin.blog.new')); ?>"><?php echo e(__('Add New Post')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                  <li class="main_dropdown <?php if(request()->is('admin-home/form-builder/*')): ?> active <?php endif; ?>">
                      <a href="javascript:void(0)"
                         aria-expanded="true">
                          <i class="ti-layout"></i>
                          <span><?php echo e(__('Form Builder')); ?></span>
                      </a>
                      <ul class="collapse">
                          <li class="<?php echo e(active_menu('admin-home/form-builder/order-form')); ?>"><a
                                      href="<?php echo e(route('admin.form.builder.order')); ?>"><?php echo e(__('Order Form')); ?></a></li>
                          </li>

                          <li class="<?php echo e(active_menu('admin-home/form-builder/contact-form')); ?>"><a
                                      href="<?php echo e(route('admin.form.builder.contact')); ?>"><?php echo e(__('Contact Form')); ?></a>
                          </li>

                          <li class="<?php echo e(active_menu('admin-home/form-builder/quote-form')); ?>"><a
                                     href="<?php echo e(route('admin.form.builder.quote')); ?>"><?php echo e(__('Quote Form')); ?></a></li>

                      </ul>
                  </li>
                    <?php if(!empty(get_static_option('site_maintenance_mode'))): ?>
                        <li class="main_dropdown <?php echo e(active_menu('admin-home/maintains-page/settings')); ?>">
                            <a href="<?php echo e(route('admin.maintains.page.settings')); ?>"
                               aria-expanded="true">
                                <?php echo e(__('Maintain Page Manage')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if('super_admin' == auth()->user()->role || 'admin' == auth()->user()->role): ?>
                        <li class="<?php if(request()->is('admin-home/footer/*')): ?> active <?php endif; ?>">
                            <a href="javascript:void(0)"
                               aria-expanded="true">
                                <i class="ti-layout"></i>
                                <span><?php echo e(__('Footer Area')); ?></span>
                            </a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/footer/general')); ?>"><a href="<?php echo e(route('admin.footer.general')); ?>"><?php echo e(__('General Settings')); ?></a></li>
                            </ul>
                        </li>
                        <li
                        class="
                        <?php echo e(active_menu('admin-home/menu')); ?>

                        <?php if(request()->is('admin-home/menu-edit/*')): ?> active <?php endif; ?>
                        "
                        >
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i> <span><?php echo e(__('Menus Manage')); ?></span></a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/menu')); ?>"><a href="<?php echo e(route('admin.menu')); ?>"><?php echo e(__('All Menus')); ?></a></li>
                            </ul>
                        </li>
                        <li
                        class="
                        <?php echo e(active_menu('admin-home/page')); ?>

                        <?php echo e(active_menu('admin-home/new-page')); ?>

                        <?php if(request()->is('admin-home/page-edit/*')): ?> active <?php endif; ?>
                        "
                        >
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i> <span><?php echo e(__('Pages')); ?></span></a>
                            <ul class="collapse">
                                <li class="<?php echo e(active_menu('admin-home/page')); ?>"><a href="<?php echo e(route('admin.page')); ?>"><?php echo e(__('All Pages')); ?></a></li>
                                <li class="<?php echo e(active_menu('admin-home/new-page')); ?>"><a href="<?php echo e(route('admin.page.new')); ?>"><?php echo e(__('Add New Page')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                     <?php if('super_admin' == auth()->user()->role ): ?>
                    <li class="<?php if(request()->is('admin-home/general-settings/*')): ?> active <?php endif; ?>">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i> <span><?php echo e(__('General Settings')); ?></span></a>
                        <ul class="collapse ">
                            <li class="<?php echo e(active_menu('admin-home/general-settings/site-identity')); ?>"><a href="<?php echo e(route('admin.general.site.identity')); ?>"><?php echo e(__('Site Identity')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/basic-settings')); ?>"><a href="<?php echo e(route('admin.general.basic.settings')); ?>"><?php echo e(__('Basic Settings')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/typography-settings')); ?>"><a href="<?php echo e(route('admin.general.typography.settings')); ?>"><?php echo e(__('Typography Settings')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/seo-settings')); ?>"><a href="<?php echo e(route('admin.general.seo.settings')); ?>"><?php echo e(__('SEO Settings')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/scripts')); ?>"><a href="<?php echo e(route('admin.general.scripts.settings')); ?>"><?php echo e(__('Third Party Scripts')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/email-template')); ?>"><a href="<?php echo e(route('admin.general.email.template')); ?>"><?php echo e(__('Email Template')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/smtp-settings')); ?>"><a href="<?php echo e(route('admin.general.smtp.settings')); ?>"><?php echo e(__('SMTP Settings')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/page-settings')); ?>"><a href="<?php echo e(route('admin.general.page.settings')); ?>"><?php echo e(__('Page Settings')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/custom-css')); ?>"><a href="<?php echo e(route('admin.general.custom.css')); ?>"><?php echo e(__('Custom Css')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/payment-settings')); ?>"><a href="<?php echo e(route('admin.general.payment.settings')); ?>"><?php echo e(__('Payment Gateway Settings')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/cache-settings')); ?>"><a href="<?php echo e(route('admin.general.cache.settings')); ?>"><?php echo e(__('Cache Settings')); ?></a></li>
                            <li class="<?php echo e(active_menu('admin-home/general-settings/license-setting')); ?>"><a href="<?php echo e(route('admin.general.license.settings')); ?>"><?php echo e(__('Licence Settings')); ?></a></li>
                        </ul>
                    </li>
                        <li
                            class="<?php if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ): ?> active <?php endif; ?>">
                            <a href="<?php echo e(route('admin.languages')); ?>" aria-expanded="true"><i class="ti-signal"></i> <span><?php echo e(__('Languages')); ?></span></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH /home/xgenxchi/public_html/laravel/zixer/@core/resources/views/backend/partials/sidebar.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PWA | {{$title}}</title>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Craft admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
        <meta name="keywords" content="Craft, bootstrap, bootstrap 5, admin themes, dark mode, free admin themes, bootstrap admin, bootstrap dashboard" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{asset('assets/plugin_tenp/logo.svg')}}" />
    
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
        <!--end::Fonts-->
    
        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        <link href="{{asset('assets/plugin_tenp/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugin_tenp/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/costum/config.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->

        <!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{asset('assets/sweetalert/sweetalert2.all.min.js')}} "></script>
        <script src="{{asset('assets/plugin_tenp/plugins.bundle.js')}}"></script>
        <script src="{{asset('assets/plugin_tenp/scripts.bundle.js')}}"></script>
        <!--end::Global Javascript Bundle-->

        @include('Template.Head')
    
        <script>
            var defaultThemeMode = "light";
            var themeMode;
    
            if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                    if (localStorage.getItem("data-bs-theme") !== null) {
                        themeMode = localStorage.getItem("data-bs-theme");
                    } else {
                        themeMode = defaultThemeMode;
                    }
                }
    
                if (themeMode === "system") {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
    
                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }
    
        </script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <!--end::Theme mode setup on page load-->
    </head>
    <!--end::Head-->
    <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
        <div class="preload-wrapper preloader" style="display: none;">
            <div id="preloader_3"></div>
        </div>
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                @include('Template.Sidebar')

                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @include('Template.Header')
                    <!--begin::Content-->
                    <div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
                        @yield('content')
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
                        <!--begin::Container-->
                        <div class=" container-fluid  d-flex flex-column flex-md-row flex-stack">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-2">{{date('Y');}}&copy;</span>
                                <a href="" target="_blank" class="text-gray-800 text-hover-primary">KGDR</a>
                            </div>
                            <!--end::Copyright-->

                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item"><a href="" target="_blank" class="menu-link px-2">About</a></li>
                                <li class="menu-item"><a href="" target="_blank" class="menu-link px-2">Support</a></li>
                                <li class="menu-item"><a href="" target="_blank" class="menu-link px-2">Purchase</a></li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::page-->
        </div>

        <!--begin::Chat drawer-->
        <div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">

            <!--begin::Messenger-->
            <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
                <!--begin::Card header-->
                <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                    <!--begin::Title-->
                    <div class="card-title">
                        <!--begin::User-->
                        <div class="d-flex justify-content-center flex-column me-3">
                            <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian Cox</a>

                            <!--begin::Info-->
                            <div class="mb-0 lh-1">
                                <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                <span class="fs-7 fw-semibold text-muted">Active</span>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <div class="me-2">
                            <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="bi bi-three-dots fs-3"></i>
                            </button>

                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                        Contacts
                                    </div>
                                </div>
                                <!--end::Heading-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_users_search">
                                        Add Contact
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_invite_friends">
                                        Invite Contacts

                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Specify a contact email to send an invitation"></i>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="right-start">
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">Groups</span>
                                        <span class="menu-arrow"></span>
                                    </a>

                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">
                                                Create Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">
                                                Invite Members
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">
                                                Settings
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3" data-bs-toggle="tooltip" title="Coming soon">
                                        Settings
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->

                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                        fill="currentColor" />
                                </svg>

                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body" id="kt_drawer_chat_messenger_body">
                    <!--begin::Messages-->
                    <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                        data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">



                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10 ">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-25.jpg" /></div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">2 mins</span>
                                    </div>
                                    <!--end::Details-->

                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                    data-kt-element="message-text">
                                    How likely are you to recommend our company to your friends and family ? </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->

                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10 ">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">5 mins</span>
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-1.jpg" /></div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                    data-kt-element="message-text">
                                    Hey there, we’re just writing to let you know that you’ve been subscribed to a
                                    repository on GitHub. </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->

                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10 ">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-25.jpg" /></div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">1 Hour</span>
                                    </div>
                                    <!--end::Details-->

                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                    data-kt-element="message-text">
                                    Ok, Understood! </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->

                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10 ">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">2 Hours</span>
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-1.jpg" /></div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                    data-kt-element="message-text">
                                    You’ll receive notifications for all issues, pull requests! </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->

                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10 ">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-25.jpg" /></div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">3 Hours</span>
                                    </div>
                                    <!--end::Details-->

                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                    data-kt-element="message-text">
                                    You can unwatch this repository immediately by clicking here: <a
                                        href="https://keenthemes.com">Keenthemes.com</a> </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->

                        <!--begin::Message(out)-->
                        <div class="d-flex justify-content-end mb-10 ">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">4 Hours</span>
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-1.jpg" /></div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                    data-kt-element="message-text">
                                    Most purchased Business courses during this sale! </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(out)-->

                        <!--begin::Message(in)-->
                        <div class="d-flex justify-content-start mb-10 ">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-25.jpg" /></div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">5 Hours</span>
                                    </div>
                                    <!--end::Details-->

                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                    data-kt-element="message-text">
                                    Company BBQ to celebrate the last quater achievements and goals. Food and drinks
                                    provided </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(in)-->

                        <!--begin::Message(template for out)-->
                        <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-end">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Details-->
                                    <div class="me-3">
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-1.jpg" /></div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                    data-kt-element="message-text">
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(template for out)-->

                        <!--begin::Message(template for in)-->
                        <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start">
                                <!--begin::User-->
                                <div class="d-flex align-items-center mb-2">
                                    <!--begin::Avatar-->
                                    <div class="symbol  symbol-35px symbol-circle "><img alt="Pic"
                                            src="https://preview.keenthemes.com/craft/assets/media/avatars/300-25.jpg" /></div>
                                    <!--end::Avatar-->
                                    <!--begin::Details-->
                                    <div class="ms-3">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">Brian Cox</a>
                                        <span class="text-muted fs-7 mb-1">Just now</span>
                                    </div>
                                    <!--end::Details-->

                                </div>
                                <!--end::User-->

                                <!--begin::Text-->
                                <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                    data-kt-element="message-text">
                                    Right before vacation season we have the next Big Deal for you. </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Message(template for in)-->
                    </div>
                    <!--end::Messages-->
                </div>
                <!--end::Card body-->

                <!--begin::Card footer-->
                <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                    <!--begin::Input-->
                    <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                        placeholder="Type a message">

                </textarea>
                    <!--end::Input-->

                    <!--begin:Toolbar-->
                    <div class="d-flex flex-stack">
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center me-2">
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                data-bs-toggle="tooltip" title="Coming soon"><i class="bi bi-paperclip fs-3"></i></button>
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                data-bs-toggle="tooltip" title="Coming soon"><i class="bi bi-upload fs-3"></i></button>
                        </div>
                        <!--end::Actions-->

                        <!--begin::Send-->
                        <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                        <!--end::Send-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card footer-->
            </div>
            <!--end::Messenger-->
        </div>
        <!--end::Chat drawer-->
    </body>
</html>

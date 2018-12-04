<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        <a href="{{ url('/') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="hyper/images/logo.png" alt="" height="16">
            </span>
            <span class="logo-sm">
                <img src="hyper/images/logo_sm.png" alt="" height="16">
            </span>
        </a>
        <!-- End logo -->

        <!--- Sidemenu -->
        <ul class="metismenu side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            {{--Dashboard--}}
            <li class="side-nav-item">
                <a href="{{ url('/') }}" class="side-nav-link">
                    <i class="dripicons-meter"></i>
                    <span class="badge badge-success float-right">7</span>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="dripicons-copy"></i>
                    <span> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{ route('alarm.index') }}">Remote</a>
                    </li>
                    <li>
                        <a href="pages-profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="pages-invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="pages-faq.html">FAQ</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

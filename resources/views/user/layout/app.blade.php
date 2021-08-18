
    <!DOCTYPE html>
<html lang="en">

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    <title>profile</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/libs/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/fonts/line-awesome/css/line-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/fonts/montserrat/styles.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('asset/libs/tether/css/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/libs/jscrollpane/jquery.jscrollpane.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/libs/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/styles/common.min.css')}}">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/styles/themes/primary.min.css')}}">
    <link class="ks-sidebar-dark-style" rel="stylesheet" type="text/css" href="{{asset('assets/styles/themes/sidebar-black.min.css')}}">
    <!-- END THEME STYLES -->

    <link rel="stylesheet" type="text/css" href="{{asset('asset/libs/plyr/plyr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/styles/widgets/panels.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/assets/styles/profile/social.min.css')}}">

</head>
<!-- END HEAD -->

<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->



@yield('body')


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/responsejs/response.min.js"></script>
<script src="libs/loading-overlay/loadingoverlay.min.js"></script>
<script src="libs/tether/js/tether.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>
<script src="libs/jscrollpane/jquery.jscrollpane.min.js"></script>
<script src="libs/jscrollpane/jquery.mousewheel.js"></script>
<script src="libs/flexibility/flexibility.js"></script>
<script src="libs/noty/noty.min.js"></script>
<script src="libs/velocity/velocity.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="assets/scripts/common.min.js"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="libs/plyr/plyr.js"></script>
<script type="application/javascript">
    (function ($) {
        $(document).ready(function () {
            plyr.setup();

            $('[data-toggle="tooltip"]').tooltip({
                delay: {
                    show: 500
                }
            });
        });
    })(jQuery);
</script>
<div class="ks-mobile-overlay"></div>

<!-- BEGIN SETTINGS BLOCK -->
<div class="ks-settings-slide-block">
    <a class="ks-settings-slide-control">
        <span class="ks-icon la la-cog"></span>
    </a>

    <div class="ks-header">
        <span class="ks-text">Layout Options</span>
        <a class="ks-settings-slide-close-control">
            <span class="ks-icon la la-close"></span>
        </a>
    </div>

    <ul class="ks-settings-list">
        <li>
            <span class="ks-text">Collapsed Sidebar</span>
            <label class="ks-checkbox-slider ks-on-off ks-primary ks-sidebar-checkbox-toggle">
                <input type="checkbox" value="1">
                <span class="ks-indicator"></span>
                <span class="ks-on">On</span>
                <span class="ks-off">Off</span>
            </label>
        </li>
        <li>
            <span class="ks-text">Fixed page header</span>
            <label class="ks-checkbox-slider ks-on-off ks-primary ks-page-header-checkbox-toggle">
                <input type="checkbox" value="0" checked>
                <span class="ks-indicator"></span>
                <span class="ks-on">On</span>
                <span class="ks-off">Off</span>
            </label>
        </li>
        <li>
            <span class="ks-text">Dark/Light Sidebar</span>
            <label class="ks-checkbox-slider ks-on-off ks-primary ks-sidebar-style-checkbox-toggle">
                <input type="checkbox" value="0" checked>
                <span class="ks-indicator"></span>
                <span class="ks-on">On</span>
                <span class="ks-off">Off</span>
            </label>
        </li>
        <li>
            <span class="ks-text">White/Gray Content Background</span>
            <label class="ks-checkbox-slider ks-on-off ks-primary ks-content-bg-checkbox-toggle">
                <input type="checkbox" value="0" checked>
                <span class="ks-indicator"></span>
                <span class="ks-on">On</span>
                <span class="ks-off">Off</span>
            </label>
        </li>
    </ul>
</div>
<!-- END SETTINGS BLOCK -->
</body>
</html>

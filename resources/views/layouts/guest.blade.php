
<!doctype html>
<html lang="en">

<head>
    <title>MD Razib hasan</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets')}}/vendor/font-awesome/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets')}}/css/main.css">
    <link rel="stylesheet" href="{{ asset('backend/assets')}}/css/color_skins.css">
</head>

<body class="theme-blue">
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle auth-main">
            <div class="auth-box">
                <div class="top">
                    <img src="{{ asset('backend/assets')}}/images/logo-white.svg" alt="Lucid">
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->

<!-- Javascript -->
<script src="{{ asset('backend/assets')}}/bundles/libscripts.bundle.js"></script>
<script src="{{ asset('backend/assets')}}/bundles/vendorscripts.bundle.js"></script>

<script src="{{ asset('backend/assets')}}/bundles/mainscripts.bundle.js"></script>
</body>
</html>

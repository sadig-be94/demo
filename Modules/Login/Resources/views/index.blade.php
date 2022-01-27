<!DOCTYPE html>
<html lang="az" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <meta name="theme-color" content="#ffffff">
    <script src="/assets/js/config.js"></script>
    <script src="/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link href="/assets/css/main.css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
                var container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
        </script>
        <div class="row flex-center min-vh-100 py-6">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <a class="d-flex flex-center mb-4" href="{{route('index')}}">
                    <span class="font-sans-serif fw-bolder fs-5 d-inline-block">Əsas Səhifə</span></a>
                <div class="card">
                    <div class="card-body p-4 p-sm-5">
                        <div class="row flex-between-center mb-2">
                            <div class="col-auto">
                                <h5>Şifrə</h5>
                            </div>
                        </div>
                        <form method="post" action="{{route('login.post')}}">
                            @CSRF
                            <div class="mb-3">
                                <input class="form-control" name="password" type="password" placeholder="Şifrəni daxil edin" />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit">Giriş</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

@include('core::components.customize')

<script src="/vendors/popper/popper.min.js"></script>
<script src="/vendors/bootstrap/bootstrap.min.js"></script>
<script src="/vendors/anchorjs/anchor.min.js"></script>
<script src="/vendors/is/is.min.js"></script>
<script src="/vendors/fontawesome/all.min.js"></script>
<script src="/vendors/lodash/lodash.min.js"></script>
<script src="/polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
<script src="/vendors/list.js/list.min.js"></script>
<script src="/assets/js/theme.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
@if(session()->has('success'))
    <script type="text/javascript">
        alertify.success('{{session('success')}}');
    </script>
@endif
@if(session()->has('error'))
    <script type="text/javascript">
        alertify.error('{{session('error')}}');
    </script>
@endif

{{-- Validation --}}
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                alertify.error('{{ $error }}');
            </script>
        @endforeach
    </ul>
@endif
</body>
</html>

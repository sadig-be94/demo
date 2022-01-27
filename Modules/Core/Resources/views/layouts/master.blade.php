<!DOCTYPE html>
<html lang="az" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
@include('core::components.header')
<body>
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
        @include('core::components.sideBar')
        @include('core::components.sideBarIn')
        @yield('body')
    </div>
</main>

@include('core::components.customize')

@include('core::components.footer')
</body>
</html>

<script src="/vendors/popper/popper.min.js"></script>
<script src="/vendors/bootstrap/bootstrap.min.js"></script>
<script src="/vendors/anchorjs/anchor.min.js"></script>
<script src="/vendors/is/is.min.js"></script>
<script src="/vendors/echarts/echarts.min.js"></script>
<script src="/vendors/fontawesome/all.min.js"></script>
<script src="/vendors/lodash/lodash.min.js"></script>
<script src="/vendors/list.js/list.min.js"></script>
<script src="/assets/js/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="/assets/js/flatpickr.js"></script>
<script src="{{asset('assets/js/tagsinput.js')}}"></script>

<script src="/assets/js/main.js"></script>

<!--// edit or new employye-->
<script src="/vendors/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script src="/vendors/lottie/lottie.min.js"></script>
<script src="/vendors/validator/validator.min.js"></script>
<script src="/vendors/prism/prism.js"></script>
<script>
    $(document).ready(function (){
        CKEDITOR.replace('text');
        CKEDITOR.replace('info');
        Dropzone.options.imageUpload = {
            maxFilesize:6,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
        $('#output').on('click',function (){
           $('#imgInput').click();
        });
    });
    $('#js-logout').on('click',function () {
        alertify.confirm('Profildən Çıxış','Çıxış Etmək İstədiyinizə Əminsiniz?<br>Yeniden Giriş Üçün Şifrə Tələb Olunacaq..', function(){
            },
            function(){ alertify.error('İstək Ləğv Edildi')}).set('labels', {ok:'<a href="{{ route('login.logout') }}">Çıxış</a>', cancel:'İMTİNA ET'});
    });
</script>
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

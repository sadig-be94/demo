@extends('core::layouts.master')
@section('body')
    <div class="row mt-5">
        <div class="col-lg-12 col-md-12 col-xl-12 col-xxl-12 h-100">
            <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i></span>
                <div class="col">
                    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Yeni Bloq</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                    <p class="mb-0">Aşağıdakı lazımı xanalara məlumatları daxil edin. "*" olan yerlər boş saxlanıla bilməz</p>
                </div>
            </div>
            <form class="p-0" method="post"  enctype="multipart/form-data" action="{{route('blog.update',$data->id)}}">
                @CSRF @method('put')
                <div class="col-lg-12 col-md-12 col-xl-12 col-xxl-12">
                    <div class="col-md">
                        <input type="file" style="display: none;"  id="imgInput" name="image" accept="image/*" onchange="loadFile(event)">
                        <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0">
                            <div class="avatar" style="width: 250px;">
                                <label class="form-label">Şəkil</label>
                                <img id="output" src="{{$data->img}}" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                            </div>
                        </div>
                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                }
                            };
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xl-6 col-xxl-6">
                        <label class="form-label" for="datepicker">Tarix *</label>
                        <input class="form-control datetimepicker" name="date" id="datepicker" type="text" value="{{date("Y-m-d", strtotime($data->created_at))}}" data-options='{"disableMobile":true}' />
                    </div>
                    <div class="col-lg-6 col-md-6 col-xl-6 col-xxl-6">
                        <label class="form-label" for="timepicker1">Saat *</label>
                        <input class="form-control datetimepicker" name="hour" id="timepicker1" type="text"
                               value="{{date("H:i", strtotime($data->created_at))}}" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":false}' />
                    </div>
                    <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">Başlıq *</label>
                        <input class="form-control" value="{{$data->title}}" name="title" type="text" /></div>
                    <div class="mb-3"><label class="form-label" for="exampleFormControlTextarea1">Content *</label>
                        <textarea class="form-control" name="text" rows="3">{!! $data->content !!}</textarea></div>
                </div>
                <button class="btn btn-primary me-1 mb-1 float-end" type="submit">Dəyişdirin</button>
            </form>
        </div>
    </div>
@endsection

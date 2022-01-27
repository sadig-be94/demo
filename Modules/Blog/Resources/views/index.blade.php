@extends('core::layouts.master')
@section('body')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Bloq</h3>
                    <p class="mt-2">Məlumat xarakterli content Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et porta ex.
                        Curabitur ullamcorper at quam in porta. Nunc non tincidunt nulla. Suspendisse aliquam lacus non eros fermentum, in
                        fermentum quam accumsan. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                        Aliquam consectetur mi sed arcu semper iaculis ac ac magna. Maecenas faucibus vestibulum nulla..</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <div class="search-box">
                        <form class="position-relative"  data-bs-display="static">
                            <input class="form-control search-input fuzzy-search" id="blogSearch" type="search" placeholder="Axtarış..." aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div id="bulk-select-replace-element">
                        <a href="{{route('blog.create')}}">
                        <button class="btn btn-falcon-success btn-sm" type="button">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="ms-1">Yeni</span>
                        </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-1495d2ac-c29e-4883-b8fb-8c2ddb50f5c8"
                     id="dom-1495d2ac-c29e-4883-b8fb-8c2ddb50f5c8">
                    <div id="tableExample" data-list='{"valueNames":["id","name"],"page":5,"pagination":true}'>
                        <div class="table-responsive scrollbar">
                            <table class="table table-bordered table-striped fs--1 mb-0">
                                <thead class="bg-200 text-900">
                                <tr>
                                    <th class="sort" data-sort="id">Sıra</th>
                                    <th class="sort" data-sort="name">Ad</th>
                                    <th class="text-end" scope="col">Əməliyyat</th>
                                </tr>
                                </thead>
                                <tbody class="list" id="appendBlog">
                                @foreach($data as $key)
                                    <tr id="js-delete-blog-{{$key->id}}">
                                        <td class="id">{{$key->id}}</td>
                                        <td class="name">{{$key->title}}</td>
                                        <td class="text-end">
                                            <div class="dropdown font-sans-serif position-static">
                                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown"
                                                        data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h fs--1"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end border py-0">
                                                    <div class="bg-white py-2">
                                                        <a class="dropdown-item" href="{{route('blog.edit',$key->id)}}">Dəyişdir</a>
                                                        <a class="dropdown-item text-danger js-delete-blog" data-id="{{$key->id}}"  href="#!">Sil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3"><button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="pagination mb-0"></ul><button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

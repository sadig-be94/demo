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

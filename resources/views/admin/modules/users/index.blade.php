@extends('admin.layouts.layout')
@section('title', 'Quản lý người dùng')
@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--end::Notice-->
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">

                    <div class="card-header">

                        <div class="card-title">
                            <div class="row">
                                <h3 class="card-label">Danh sách người dùng</h3>
                                <form class="col lg-3" action="{{ route('admin.users.search-name') }}" method="get">
                                    <input value="{{ request()->input('search_name') }}" type="text" class=""
                                        name="search_name" placeholder="Name" />
                                    <input value="{{ request()->input('search_email') }}" type="text" class=""
                                        name="search_email" placeholder="Email" />
                                    <button type="submit" class="menu-text">Search</button>
                                </form>
                            </div>

                        </div>
                        <div class="card-toolbar">

                        </div>
                        <div class="card-toolbar">
                            {{-- <div class="dropdown dropdown-inline mr-2">
                                    <a href="{{ route('export') }}" class="btn btn-info font-weight-bolder font-size-sm
                            mr-3">Export</a>
                        </div> --}}
                        <div class="dropdown dropdown-inline mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                fill="#000000" opacity="0.3"></path>
                                            <path
                                                d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>Export</button>
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi flex-column navi-hover py-2">
                                    <li
                                        class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                        Choose an option:</li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-print"></i>
                                            </span>
                                            <span class="navi-text">Print</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="{{ route('export') }}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-excel-o"></i>
                                            </span>
                                            <span class="navi-text">Excel</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="{{ route('exportCSV') }}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-text-o"></i>
                                            </span>
                                            <span class="navi-text">CSV</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="{{ route('exportPDF') }}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="la la-file-pdf-o"></i>
                                            </span>
                                            <span class="navi-text">PDF</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <a href="{{ route('admin.users.create') }}" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-info font-weight-bolder font-size-sm mr-3">Thêm người dùng</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="format-table">
                                <th scope="col">STT</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($users as $user)

                        <tbody>
                            <tr class="format-table">
                                <td>{{$i++}}</td>
                                <td><a href="{{ route('admin.users.detail-user', $user->id) }}">{{$user->name}}</a></td>
                                <td><img style="width:100px" src="{{ asset('public/img/' . $user->image) }}" alt="">
                                </td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <span class="label label-inline label-light-primary font-weight-bold">Pending</span>
                                </td>
                                <td class="action-button">
                                    <button data-id="{{ $user->id }}"  data-toggle="modal" data-target="#exampleModalEdit"title="Cập nhật thông tin"
                                        class="btn btn-icon btn-light btn-hover-primary btn-edit-user btn-sm mx-3">
                                      
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)">
                                                    </path>
                                                    <path
                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </button>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            </a>
                                    </form>
                                </td>
                            </tr>

                        </tbody>

                        @endforeach
                        <div class="row">
                            <div class="col col lg-5">
                                {{-- {!! $users->links() !!}     --}}
                            </div>
                        </div>
                    </table>
                    {{-- modal add user --}}
                    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sửa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-sample" id="form-add-user">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Họ và tên <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="name" class="form-control"
                                                                id="form_create_name" placeholder="Họ và tên" />
                                                            <p class="error-message" id="err-name"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Số điện thoại <span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="phone_number"
                                                                id="form_create_phone_number"
                                                                placeholder="Số điện thoại" />
                                                            <p class="error-message" id="err-phone_number"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Ảnh đại diện<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="file" id="image"
                                                                accept="image/png, image/jpeg">
                                                            <img src="" id="profile-img-tag" width="200px" />
                                                            <p class="error-message" id="err-image"></p>
                                                            <input multipart type="hidden" id="file-name">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Địa chỉ<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" placeholder="Địa chỉ"
                                                                type="text" id="form_create_address" name="address">
                                                            <p class="error-message" id="err-address"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Email<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" placeholder="Email"
                                                                id="form_create_email" name="Email">
                                                            <p class="error-message" id="err-email"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Password<span
                                                                class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="password"
                                                                placeholder="Password" id="form_create_password"
                                                                name="password">
                                                            <p class="error-message" id="err-password"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success btn-submit"
                                        onclick="submitAddUser()">Thêm</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var routeShowEdit = "{{route('admin.users.show-edit')}}"
    function submitAddUser() {
        var data = {
            'name': $("#form_create_name").val(),
            'email': $("#form_create_email").val(),
            'password': $("#form_create_password").val(),
            'address': $("#form_create_address").val(),
            'image': $("#file-name").val(),
            'phone_number': $("#form_create_phone_number").val(),

        }
        // var formData = new FormData();
        // formData.append('name', $("#form_create_name").val())
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.users.store') }}",
            dateType: 'json',
            data: data,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                console.log(response.success)
                if (response.success == 1) {
                    window.location.href = "{{route('admin.users.index')}}";
                } else {
                    if (response.error) {
                        $.each(response.error, function (key, value) {
                            var idElement = '#err-' + key
                            $(idElement).html(value)
                        });
                    }
                }
            }

        })
    }
    function ShowEditUser(id) {
    }
    $('.btn-edit-user').click(function(){

        var id = $(this).data('id');
        $('.btn-submit-edit').attr('data-iduser', id);
        const url = route('admin.users.edit', {id: id});

        axios
            .get(url)
            .then((response) => {
                $('#exampleModalEdit').html(response.data.view);
                $('#exampleModalEdit').modal('show');
            })
    });

    $('#exampleModalEdit').on('click','.btn-submit-edit',function(){
        var data = {
            'name': $("#form_edit_name").val(),
            'email': $("#form_edit_email").val(),
            'password': $("#form_edit_password").val(),
            'address': $("#form_edit_address").val(),
            'image': $("#form_edit_image").val(),
            'phone_number': $("#form_edit_phone_number").val(),
            'id': $('.id-user').val(),
        }
        const routes = route('admin.users.update', {id: data['id']});
        $.ajax({
            type: 'POST',
            url: routes,
            data: data,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                console.log(response);
                if (response.mess == "Success") {
                    window.location.reload();
                } else {
                    if (response.error) {
                        $.each(response.error, function (key, value) {
                            var idElement = '#err-' + key
                            $(idElement).html(value)
                        });
                    }
                }
            }

        })
    });

    $('#image').on('change', function (e) {
        var files = e.target.files
        var dataUpload = files[0]

        var formData = new FormData();
        formData.append('image', dataUpload)

        $.ajax({
            type: 'POST',
            url: "{{ route('admin.users.uploadFile') }}",
            dateType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.dir) {
                    $("#profile-img-tag").attr("src", response.dir);
                }
                if (response.file_name) {
                    $("#file-name").val(response.file_name);
                }
            }

        })
    });



</script>
@endsection

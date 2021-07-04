
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
                <form class="form-sample" id="form-edit-user">
                    <input type="hidden" value="{{ $user->id }}" class="id-user">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Họ và tên <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$user->name}}" name="name" class="form-control"
                                        id="form_edit_name" placeholder="Họ và tên" />
                                    <p class="error-message" id="err-name"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Số điện thoại <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" value="{{$user->phone_number}}" name="phone_number"
                                        id="form_edit_phone_number" placeholder="Số điện thoại" />
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
                                    <input  value="{{ $user->image }}" class="form-control" type="file" 
                                        accept="image/png, image/jpeg">
                                    <img style="width:100px" src="{{ asset('public/img/' . $user->image) }}" alt="">
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
                                    <input class="form-control" value="{{$user->address}}" placeholder="Địa chỉ"
                                        type="text" id="form_edit_address" name="address">
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
                                    <input class="form-control" value="{{$user->email}}" type="text"
                                        placeholder="Email" id="form_edit_email" name="email">
                                    <p class="error-message" id="err-email"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button data-iduser="0" type="button" class="btn btn-success btn-submit-edit">Sửa</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Hủy</button>
        </div>
    </div>
</div>
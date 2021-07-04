{{-- @extends('admin.layouts.layout')
@section('title', 'Thêm người dùng')
@section('content')

<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Thêm người dùng</h3>
                        </div>
                    </div>
                    <form action="{{ route('admin.users.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="card-body">
                            <div class="col-xl-12 form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Họ tên:</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="img">Select image:</label>
                                        <input type="file" id="img" name="image" >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email:</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Phone number</label>
                                        <input type="number" name="phone_number" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Adress</label>
                                        <input type="text" name="adress" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ml-4">Submit</button>
                            <button type="button" class="btn btn-secondary ml-2 cancel">Cancel</button>
                        </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){

            $('.cancel').click(function(){
                const url = route('admin.users.index');
                window.location.href = url;
            })

        });
    </script>
@endsection --}}
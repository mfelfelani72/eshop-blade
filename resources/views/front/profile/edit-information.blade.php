<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            @php
                echo view('front/profile/header-user-profile', compact('userProfile'))->render();
            @endphp
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-personal-info">
                            <h4 class="text-primary mb-4">Edit Information</h4>
                        </div>
                        <div class="basic-form">
                            <form action="{{ route('store-edit-information') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="last_name"
                                            value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="mobile"
                                            value="{{ old('mobile') }}">
                                        @error('mobile')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Image</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="image">
                                    </div>
                                </div>
                                @error('img')
                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Cover</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="cover">
                                    </div>
                                </div>
                                @error('cover')
                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="col-12">
                                    <button type="submit" class="float-end btn btn-primary mb-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

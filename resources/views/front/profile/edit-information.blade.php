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
                                    @php
                                        $value = '';
                                        if (old('name') == '') {
                                            $value = $userProfile->name;
                                        } else {
                                            $value = old('name');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="name"
                                            value="{{ $value }}">
                                        @error('name')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('last_name') == '') {
                                            $value = $userProfile->last_name;
                                        } else {
                                            $value = old('last_name');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="last_name"
                                            value="{{ $value }}">
                                        @error('last_name')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('email') == '') {
                                            $value = $userProfile->email;
                                        } else {
                                            $value = old('email');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="email"
                                            value="{{ $value }}">
                                        @error('email')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('mobile') == '') {
                                            $value = $userProfile->mobile;
                                        } else {
                                            $value = old('mobile');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="mobile"
                                            value="{{ $value }}">
                                        @error('mobile')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('bio') == '') {
                                            $value = $userProfile->bio;
                                        } else {
                                            $value = old('bio');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Bio</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="bio"
                                            value="{{ $value }}">
                                        @error('bio')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('about') == '') {
                                            $value = $userProfile->about;
                                        } else {
                                            $value = old('about');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">About Your Self</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="about"
                                            value="{{ $value }}">
                                        @error('about')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if ($userProfile->image)
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Image</label>
                                        <div class="col-sm-10">
                                            <img class="" width="200"
                                                src={{ asset('front/img/profile/' . $userProfile->image) }}>
                                        </div>
                                    </div>
                                @endif
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Upload Image</span>
                                    <div class="form-file">
                                        <input type="file" class="form-file-input form-control" name="image">
                                    </div>
                                </div>
                                @error('image')
                                    <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                                @if ($userProfile->cover)
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-lg">Cover</label>
                                        <div class="col-sm-10">
                                            <img class="" width="200"
                                                src={{ asset('front/img/profile/' . $userProfile->cover) }}>
                                        </div>
                                    </div>
                                @endif

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

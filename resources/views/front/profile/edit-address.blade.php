<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            @php
                echo view('front/profile/header-user-profile', compact('userProfile'))->render();
            @endphp
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user-store-address', $id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('country') == '') {
                                            $value = $userProfileAddress->country;
                                        } else {
                                            $value = old('country');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Country</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="country"
                                            value="{{ $value }}">
                                        @error('country')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('province') == '') {
                                            $value = $userProfileAddress->province;
                                        } else {
                                            $value = old('province');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Province</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="province"
                                            value="{{ $value }}">
                                        @error('province')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('city') == '') {
                                            $value = $userProfileAddress->city;
                                        } else {
                                            $value = old('city');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="city"
                                            value="{{ $value }}">
                                        @error('city')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('street') == '') {
                                            $value = $userProfileAddress->street;
                                        } else {
                                            $value = old('street');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Street</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="street"
                                            value="{{ $value }}">
                                        @error('street')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('avenue') == '') {
                                            $value = $userProfileAddress->avenue;
                                        } else {
                                            $value = old('avenue');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Avenue</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="avenue"
                                            value="{{ $value }}">
                                        @error('avenue')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('home_number') == '') {
                                            $value = $userProfileAddress->home_number;
                                        } else {
                                            $value = old('home_number');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Home Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="home_number"
                                            value="{{ $value }}">
                                        @error('home_number')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('zip_code') == '') {
                                            $value = $userProfileAddress->zip_number;
                                        } else {
                                            $value = old('zip_code');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Zip Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="zip_code"
                                            value="{{ $value }}">
                                        @error('zip_code')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('floor') == '') {
                                            $value = $userProfileAddress->floor;
                                        } else {
                                            $value = old('floor');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Floor</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="floor"
                                            value="{{ $value }}">
                                        @error('floor')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('unit') == '') {
                                            $value = $userProfileAddress->unit;
                                        } else {
                                            $value = old('unit');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Unit</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="unit"
                                            value="{{ $value }}">
                                        @error('unit')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    @php
                                        $value = '';
                                        if (old('location') == '') {
                                            $value = $userProfileAddress->location;
                                        } else {
                                            $value = old('location');
                                        }

                                    @endphp
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="location"
                                            value="{{ $value }}">
                                        @error('location')
                                            <div class="pt-1 pb-1 mt-2 alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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

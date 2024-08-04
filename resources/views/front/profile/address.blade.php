<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded" style="background: url({{ asset($userProfile->cover) }})">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src={{ asset($userProfile->image) }} class="img-fluid rounded-circle"
                                    alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">{{ $userProfile->user->name }}</h4>
                                    <p>{{ $userProfile->bio }}</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">Role</h4>
                                    <p>{{ Auth::user()->role }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    @php
                                        $active = 'active show';
                                    @endphp
                                    @foreach ($userProfileAddress as $item)
                                        <li class="nav-item"><a href="#address-{{ $item->id }}" data-bs-toggle="tab"
                                                class="nav-link {{ $active }}">
                                                {{ $item->street }} ...
                                                {{ $item->home_number }}</a>
                                        </li>
                                        @php
                                            $active = '';
                                        @endphp
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @php
                                        $active = 'active show';
                                    @endphp
                                    @foreach ($userProfileAddress as $row)
                                        <div id="address-{{ $row->id }}"
                                            class="tab-pane {{ $active }} fade">
                                            <div class="my-post-content pt-3 mx-1">
                                                <h4 class="text-primary mb-4">Full Address</h4>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-6">
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Country <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->country }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Province <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->province }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">City <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->city }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Street <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->street }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Avenue <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->avenue }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-6">
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Home Number <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->home_number }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Zip Code <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->zip_code }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Floor <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->floor }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Unit <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->unit }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-4 col-5">
                                                                <h5 class="f-w-500">Location <span
                                                                        class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-8 col-7">
                                                                <span>{{ $row->location }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $active = '';
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-about-me">
                            <div class="pt-4 border-bottom-1 pb-3">
                                <h4 class="text-primary">About Me</h4>
                                <p class="mb-2">{{ $userProfile->about }}</p>
                            </div>
                        </div>
                        <div class="profile-personal-info">
                            <h4 class="text-primary mb-4">Personal Information</h4>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>{{ $userProfile->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Last Name <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>{{ $userProfile->last_name }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>{{ $userProfile->email }}</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-3 col-5">
                                    <h5 class="f-w-500">Mobile <span class="pull-end">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-9 col-7"><span>{{ $userProfile->mobile }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

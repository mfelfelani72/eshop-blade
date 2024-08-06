<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            @php
                echo view('front/profile/header-user-profile', compact('userProfile'))->render();
            @endphp
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

                            <div class="col-12">
                                <a href="{{ route('user-edit-information') }}"
                                    class="float-end btn btn-rounded btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

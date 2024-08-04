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
            <div class="row">
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
                                            <li class="nav-item"><a href="#address-{{ $item->id }}"
                                                    data-bs-toggle="tab" class="nav-link {{ $active }}">
                                                    {{ $item->street }} ...
                                                    {{ $item->home_number }}</a>
                                            </li>
                                            @php
                                                $active = '';
                                            @endphp
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        <div id="my-posts" class="tab-pane fade active show">
                                            <div class="my-post-content pt-3">

                                            </div>
                                        </div>
                                        <div id="about-me" class="tab-pane fade">

                                        </div>
                                        <div id="profile-settings" class="tab-pane fade">

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
</div>

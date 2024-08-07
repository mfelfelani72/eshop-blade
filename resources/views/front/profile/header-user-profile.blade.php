 @php
     $basePath = '/front/img/profile/';
     $image = '/administrator/images/avatar/1.png';
     $cover = '/front/img/profile/cover.jpg';

     if ($userProfile->image) {
         $image = $basePath . $userProfile->image;
     }
     if ($userProfile->cover) {
         $cover = $basePath . $userProfile->cover;
     }
 @endphp
 <div class="col-lg-12">
     <div class="profile card card-body px-3 pt-3 pb-0">
         <div class="profile-head">
             <div class="photo-content">
                 <div class="cover-photo rounded" style="background: url({{ asset($cover) }})">
                 </div>
             </div>
             <div class="profile-info">
                 <div class="profile-photo">
                     <img src={{ asset($image) }} class="img-fluid rounded-circle" alt="">
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

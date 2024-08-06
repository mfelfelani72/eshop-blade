 <div class="col-lg-12">
     <div class="profile card card-body px-3 pt-3 pb-0">
         <div class="profile-head">
             <div class="photo-content">
                 <div class="cover-photo rounded"
                     style="background: url({{ asset('/front/img/profile/' . $userProfile->cover) }})">
                 </div>
             </div>
             <div class="profile-info">
                 <div class="profile-photo">
                     <img src={{ asset('/front/img/profile/' . $userProfile->image) }} class="img-fluid rounded-circle"
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

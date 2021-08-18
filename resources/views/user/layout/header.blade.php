
<div class="ks-social-profile-header">
    <div class="ks-cover" style="background-image: url('{{asset('asset/assets/img/profile/cover.png')}}')"></div>
    <div class="ks-user">
        <div class="ks-info">
            <img src="{{asset($profile['profile_image'])}}" class="ks-avatar" width="167" height="167">
            <div class="ks-body">
                <div class="ks-name">{{$profile['first_name'] ." ". $profile['last_name']}}</div>
                <div class="ks-description">company</div>
                <div class="ks-actions">
                    <button class="btn btn-primary">Follow</button>
                    <button class="btn btn-success">Send message</button>
                </div>
            </div>
        </div>
        <div class="ks-statistics">
            <div class="ks-item">
                <div class="ks-amount">102</div>
                <div class="ks-text">followers</div>
            </div>
            <div class="ks-item">
                <div class="ks-amount">7</div>
                <div class="ks-text">posts</div>
            </div>
            <div class="ks-item">
                <div class="ks-amount">21</div>
                <div class="ks-text">videos</div>
            </div>

        </div>
    </div>
</div>

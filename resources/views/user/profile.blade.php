<?php $account = \Illuminate\Support\Facades\Auth::user(); ?>
@extends('user.layout.app')
@section('body')
<div class="ks-column ks-page" style="margin-top: -120px">


    <div class="ks-page-content">

        <div class="ks-page-content-body ks-social-profile">

            <div class="ks-social-profile-header">
                <div class="ks-cover" style="background-image: url('{{asset('asset/assets/img/profile/cover.png')}}')"></div>
                <div class="ks-user">
                    <div class="ks-info">
                        <img src="{{asset($profile['profile_image'])}}" class="ks-avatar" width="167" height="167">
                        <div class="ks-body">
                            <div class="ks-name">{{$profile['first_name'] ." ". $profile['last_name']}}</div>
                            <div class="ks-description">company</div>
                            <div class="ks-actions">
                                <a href="{{route('logout')}}"><button class="btn btn-danger">logout</button></a>
                                <a href="{{route('userEdit', $account->id)}}"><button class="btn btn-success">settings</button></a>
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

            <div class="ks-social-profile-body">
                <div class="ks-widgets">
                    <div class="card panel panel-default ks-solid ks-widget ks-widget-info">
                        <h5 class="card-header">About</h5>
                        <div class="card-block">
                            <div class="ks-item">
                                <span>Username</span>
                                <span>{{$account->email}}</span>
                            </div>
                            <div class="ks-item">
                                <span>Joined</span>
                                <span>{{$profile['created_at']}}</span>
                            </div>
                            <div class="ks-item">
                                <span>Birthday</span>
                                <span>{{$profile['dob']}}</span>
                            </div>
                            <div class="ks-item">
                                <span>Location</span>
                                <span>{{$profile['address_2']}}</span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="ks-feed">
                    <div class="card panel panel-default ks-post-box">
                        <label class="ks-message">
                            <img class="ks-avatar" src="{{asset('asset/assets/img/avatars/avatar-1.jpg')}}" width="36" height="36">
                            <textarea class="form-control" placeholder="What's new?"></textarea>
                        </label>
                        <div class="ks-controls">
                            <div class="ks-actions">
                                <a href="#" class="ks-action">
                                    <span class="la la-camera"></span>
                                </a>
                                <a href="#" class="ks-action">
                                    <span class="la la-film"></span>
                                </a>
                                <a href="#" class="ks-action">
                                    <span class="la la-music"></span>
                                </a>
                                <a href="#" class="ks-action">
                                    <span class="la la-file-o"></span>
                                </a>
                            </div>
                            <button class="btn btn-primary">Post</button>
                        </div>
                    </div>

                    <div class="card panel panel-default ks-post">
                        <div class="ks-header">
                            <a href="#" class="ks-user">
                                <img src="assets/img/avatars/avatar-4.jpg" class="ks-avatar" width="36" height="36">
                                <span class="ks-name">Lisa Morris</span>
                            </a>
                            <span class="ks-date-created">September 29, 2016</span>
                        </div>
                        <div class="ks-body">
                            <div class="ks-text">
                                Express Wi-Fi empowers entrepreneurs to build a business by providing their community with access to the internet. Facebook designed the technology, and local internet providers add the connectivity. Express Wi-Fi is part of our Internet.org initiative.
                            </div>
                            <div class="ks-photos">
                                <a href="#" class="ks-photo">
                                    <img src="assets/img/profile/p-1.png">
                                </a>
                                <a href="#" class="ks-photo">
                                    <img src="assets/img/profile/p-2.png">
                                </a>
                            </div>
                        </div>
                        <div class="ks-footer">
                            <div class="ks-block">
                                    <span class="ks-control" data-toggle="tooltip" data-placement="top" title="Comment">
                                        <span class="la la-comment-o ks-icon"></span>
                                        <span class="ks-amount">12</span>
                                    </span>
                            </div>
                            <div class="ks-block">
                                    <span class="ks-control" data-toggle="tooltip" data-placement="top" title="Share">
                                        <span class="la la-bullhorn ks-icon"></span>
                                        <span class="ks-amount">1</span>
                                    </span>
                                <span class="ks-control" data-toggle="tooltip" data-placement="top" title="Like">
                                        <span class="la la-heart-o ks-icon"></span>
                                        <span class="ks-amount">3</span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    </div>


                <div class="ks-widgets">

                    {{--how to folow--}}
                    <div class="card panel panel-default ks-solid ks-widget ks-widget-users">
                        <h5 class="card-header">Who to follow</h5>
                        <div class="card-block">
                            <div class="ks-user">
                                <img class="ks-avatar" src="assets/img/avatars/avatar-1.jpg" width="36" height="36">
                                <div class="ks-info">
                                    <a href="#" class="ks-name">Carl Nelson</a>
                                    <span class="ks-occupation">UI/UX Designer</span>
                                </div>
                                <a href="#" class="ks-add">+</a>
                            </div>
                            <div class="ks-user">
                                <img class="ks-avatar" src="assets/img/avatars/avatar-3.jpg" width="36" height="36">
                                <div class="ks-info">
                                    <a href="#" class="ks-name">Kevin Fernandez</a>
                                    <span class="ks-occupation">Front-end Developer</span>
                                </div>
                                <a href="#" class="ks-add">+</a>
                            </div>
                            <div class="ks-user">
                                <img class="ks-avatar" src="assets/img/avatars/avatar-4.jpg" width="36" height="36">
                                <div class="ks-info">
                                    <a href="#" class="ks-name">Gloria Graham</a>
                                    <span class="ks-occupation">Back-end Developer</span>
                                </div>
                                <a href="#" class="ks-add">+</a>
                            </div>
                            <div class="ks-user">
                                <img class="ks-avatar" src="assets/img/avatars/avatar-5.jpg" width="36" height="36">
                                <div class="ks-info">
                                    <a href="#" class="ks-name">Zachary McCoy</a>
                                    <span class="ks-occupation">CTO</span>
                                </div>
                                <a href="#" class="ks-add">+</a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>
</div>


@stop

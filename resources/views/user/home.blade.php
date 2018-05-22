@extends('layouts.app')

@push('after-styles')
    <link href="{{ mix('css/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row profile">
    <div class="col-md-2">
        <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
                <img data-src="holder.js/150x150">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                    {{ Auth::user()->name }}
                </div>
                <div class="profile-usertitle-job">
                    @foreach (Auth::user()->getRoleNames() as $roleName)
                        {{ $roleName }}
                    @endforeach
                </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
                <button type="button" class="btn btn-success btn-sm">Follow</button>
                <button type="button" class="btn btn-danger btn-sm">Message</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
                <ul class="nav flex-column nav-pills nav-stacked" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <li class="active">
                        <a href="#">
                            <i class="fas fa-home"></i>
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-user-tie"></i>
                            Account Settings
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-check"></i>
                            Tasks
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="far fa-life-ring"></i>
                            Help
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END MENU -->
        </div>
    </div>
    <div class="col-md-10">
        <div class="profile-content">

            @hasanyrole(config('auth.access.users.roles.super-admin') . '|' . config('auth.access.users.roles.admin'))
                I am either a writer or an admin or both!
            @else
                I have none of these roles...
            @endhasanyrole

            <p>Some user related content goes here...</p>
        </div>
    </div>
</div>
@endsection

<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 17/4/2022
 * Time: 08:19
 */
?>
<ul class="side-nav">
    <hr>

    <li class="side-nav-item">
        <a href="{{auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN ? route('admin.home'):route('home')}}"
           aria-expanded="false"
           aria-controls="sidebarDashboards" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
        </a>
    </li>

    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
        <li class="side-nav-item">
            <a href="{{route('adverts')}}" class="side-nav-link">
                <i class="uil-shopping-cart-alt"></i>
                <span> Adverts </span>
            </a>
        </li>
    @endif

    <li class="side-nav-item">
        <a href="{{route('plans')}}" class="side-nav-link">
            <i class="uil-money-withdrawal"></i>
            <span>Membership Plans </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{route('clubs')}}" class="side-nav-link">
            <i class="uil-weight"></i>
            <span>Registered Clubs </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{route('requisitions.index')}}" class="side-nav-link">
            <i class="uil-anchor"></i>
            <span>Join Club Requests </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{route('trainers')}}" class="side-nav-link">
            <i class="mdi mdi-run-fast"></i>
            <span>Individual Trainers </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{route('routines')}}" class="side-nav-link">
            <i class="uil-schedule"></i>
            <span>Training Routines </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{route('health-status')}}" class="side-nav-link">
            <i class="uil-heart-alt"></i>
            <span>Health Status </span>
        </a>
    </li>
    <li class="side-nav-item">
        <a href="{{route('payments')}}" class="side-nav-link">
            <i class="uil-moneybag-alt"></i>
            <span>Payments </span>
        </a>
    </li>
    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
        <li class="side-nav-item">
            <a href="{{route('users')}}" class="side-nav-link">
                <i class="uil-users-alt"></i>
                <span>Members </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('expired-subscriptions')}}" class="side-nav-link">
                <i class="mdi mdi-exclamation"></i>
                <span>Expired subscriptions </span>
            </a>
        </li>
    @endif

    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN ||auth()->user()->user_type==\App\Enums\UserTypeEnum::TRAINER)
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#reports" aria-expanded="false"
               aria-controls="sidebarEcommerce" class="side-nav-link">
                <i class="uil-graph-bar"></i>
                <span> Reports </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="reports">
                <ul class="side-nav-second-level">
                    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                        <li>
                            <a href="{{route('members')}}">Members Month / Year</a>
                        </li>
                        <li>
                            <a href="{{route('income')}}">Income Per Month</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{route('training-clients')}}">Training Clients</a>
                    </li>
                    @if(auth()->user()->user_type==\App\Enums\UserTypeEnum::ADMIN)
                        <li>
                            <a href="{{route('audits')}}">Audit Report</a>
                        </li>
                    @endif
                </ul>
            </div>
        </li>
    @endif

</ul>

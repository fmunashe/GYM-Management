<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 17/4/2022
 * Time: 08:30
 */
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
<meta content="Coderthemes" name="author"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
<link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
<link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@livewireStyles

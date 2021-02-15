@extends('layouts.app')

@section('content')

    @include('dashboard.top_nav')

@include('dashboard.side-nav')


    <div id="layoutSidenav_content">
        <main id="dashboard">
            <div class="container-fluid">
                <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row dashboardLinks">
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('inbox') }}">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body"><h1>Inbox <span class="badge badge-light">{{ auth()->user()->inbox_emails()->count() }}</span></h1></div>
                        </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('sent') }}">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><h1>Sent <span class="badge badge-light">{{ auth()->user()->sent_emails()->count() }}</span></h1></div>
                        </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('trash') }}">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><h1>Trash <span class="badge badge-light">{{ auth()->user()->inbox_emails()->onlyTrashed()->count() + auth()->user()->sent_emails()->onlyTrashed()->count() }}</span></h1></div>
                        </div>
                        </a>
                    </div>
                </div>






            </div>
        </main>

    </div>


@endsection






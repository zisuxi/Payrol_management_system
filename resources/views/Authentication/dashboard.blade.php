@extends('layouts.app')
{{-- @section('title') --}}
@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Anonymous+Pro);

        /* Base */
        body {

            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            position: relative;
            /* color: hsl(0, 0%, 68%); */
            color: black;
            font-weight: bold;
            letter-spacing: 5px;
            overflow: hidden;
            border-right: 2px solid hsl(0, 0%, 80%);
            white-space: nowrap;
            animation: typewriter 5s steps(44) 1s 1 normal both,
                blinkTextCursor 500ms infinite;
        }

        @keyframes typewriter {
            from {
                width: 0;
            }

            to {
                width: 710px;
            }
        }

        @keyframes blinkTextCursor {
            from {
                border-right-color: hsl(0, 0%, 80%);
            }

            to {
                border-right-color: transparent;
            }
        }
    </style>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">

                <h2 style="font-size: 22px;    margin-block: 14px;"> <?php
                date_default_timezone_set('Asia/karachi'); // Set your timezone

                $currentTime = date('H:i:s');
                if ($currentTime >= '00:00:00' && $currentTime < '12:00:00') {
                    $greeting = 'Good Morning, ' . ucfirst($user->name) . '.';
                } elseif ($currentTime >= '12:00:00' && $currentTime < '18:00:00') {
                    $greeting = 'Good Afternoon, ' . ucfirst($user->name) . '.';
                } else {
                    $greeting = 'Good Evening, ' . ucfirst($user->name) . '.';
                }
                echo $greeting;
                ?>

                </h2>


            </div>
            <div class="col-sm-6 mt-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url('/logout') }}">Logout</a> </li>
                </ol>
            </div>
        </div>






        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">All Category</span>
                            <span class="info-box-number">{{ $allCategory }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Active User</span>
                            <span class="info-box-number">{{ $activeUser }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">All Staff</span>
                            <span class="info-box-number">{{ $allstaff }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Monthly Ledger<strong
                                    class="float-right">{{ $start_month . ' / ' . $end_month }}</strong></span>
                            <span class="info-box-number">{{ $allledger }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"> Weekly Ledger <strong
                                    class="float-right">{{ $start_week . ' / ' . $end_week }}</strong></span>

                            <span class="info-box-number"> {{ $tdayLedgerPrices }}</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>

                        </div>

                    </div>

                </div>


            </div>



            <div class="row">

                <section class="col-lg-7 connectedSortable">


                    <div id="regions_div" style="width: 700px; height: 500px;"></div>
                </section>


                <section class="col-lg-5 connectedSortable">

                    <div id="chart_div" style="width: 470px; height: 500px;"></div>


                </section>

            </div>

        </div>
    @endsection

@extends('layouts.dashboard')

@section('content')
<header class="flex justify-between items-center w-full">
    <div class="flex items-center">
        <!-- if your user doesnt have any avatar, you can uncomment th code bellow -->
        <!-- <span class="bg-theme-primary text-white py-3 px-4 rounded-full">M</span> -->
        <img src="{{ Auth::user()->profile_photo_path != null ? asset('storage/'.Auth::user()->profile_photo_path) : asset('storage/nopic.png') }}" class="h-14 w-14 rounded-full" alt="User Avatar">

        <div class="ml-5">
            <h4 class="font-bold">สวัสดี คุณ {{Auth::user()->name }}!</h4>
            <small class="text-gray-500">These are stats for your dashboard</small>
        </div>
    </div>
    <div class="hidden md:block">
        <button class="btn btn-lg btn-primary">+ Add new task</button>
    </div>
</header>

<!-- Top cards section -->
<section class="mt-6">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="card hover:shadow">
            <div class="card-header">
                <h5>View Our Job</h5>

                <span class="icon-area">
                    👀
                </span>
            </div>
            <div class="card-body">
                <h6 class="font-bold inline-block">24.5k </h6>
                <span class="badge badge-danger inline-block">-21%</span>
            </div>
        </div>

        <div class="card hover:shadow">
            <div class="card-header">
                <h5>View Our Job</h5>
                <span class="icon-area">
                    🧳
                </span>
            </div>
            <div class="card-body">
                <h6 class="font-bold inline-block">24.5k </h6>
                <span class="badge badge-success inline-block">-21%</span>
            </div>
        </div>

        <div class="card hover:shadow">
            <div class="card-header">
                <h5>View Our Job</h5>
                <span class="icon-area">
                    🎉
                </span>
            </div>
            <div class="card-body">
                <h6 class="font-bold inline-block">24.5k </h6>
                <span class="badge badge-yellow inline-block">-21%</span>
            </div>
        </div>

        <div class="card hover:shadow">
            <div class="card-header">
                <h5>View Our Job</h5>
                <span class="icon-area">
                    🚀
                </span>
            </div>
            <div class="card-body">
                <h6 class="font-bold inline-block">24.5k </h6>
                <span class="badge badge-info inline-block">-21%</span>
            </div>
        </div>
    </div>
</section>

<!-- Second section -->
<section class="mt-6 grid grid-cols-1 lg:grid-cols-12 gap-4">
    <div class="lg:col-span-8">
        <div class="card hover:shadow">
            <div class="card-header justify-between">
                <h5 class='font-bold flex items-center'>
                    <ion-icon class='text-gray-400 mr-2' name="stats-chart"></ion-icon>
                    Website analytics
                </h5>

                <button class="pt-2">
                    <ion-icon name="ellipsis-horizontal"></ion-icon>
                </button>
            </div>
            <div class="card-body">
                <canvas id="analyticsChart"></canvas>
            </div>
        </div>
    </div>
    <div class="lg:col-span-4">
        <div class="card hover:shadow">
            <div class="card-header justify-between mb-4">
                <h5 class='font-bold flex items-center'>
                    <ion-icon class='text-gray-400 mr-2' name="notifications"></ion-icon>
                    Recent notifications
                </h5>

                <button class="pt-2">
                    <ion-icon name="ellipsis-horizontal"></ion-icon>
                </button>
            </div>
            <div class="card-body space-y-3">

                <div class="card card-bg-gray flex-card items-center">
                    <span class="border py-1 px-2 border-gray-200 rounded-full mr-3">
                        <ion-icon class='mt-1' name="dice-outline"></ion-icon>
                    </span>
                    <div>
                        <div class="card-header text-lg font-bold">This notification title</div>
                        <div class="card-body">
                            This is notification body, what do you think about it?
                        </div>
                    </div>
                </div>

                <div class="card card-bg-gray flex-card items-center">
                    <span class="border py-1 px-2 border-gray-200 rounded-full mr-3">
                        <ion-icon class='mt-1' name="dice-outline"></ion-icon>
                    </span>
                    <div>
                        <div class="card-header text-lg font-bold">This notification title</div>
                        <div class="card-body">
                            This is notification body, what do you think about it?
                        </div>
                    </div>
                </div>

                <div class="card card-bg-gray flex-card items-center">
                    <span class="border py-1 px-2 border-gray-200 rounded-full mr-3">
                        <ion-icon class='mt-1' name="dice-outline"></ion-icon>
                    </span>
                    <div>
                        <div class="card-header text-lg font-bold">This notification title</div>
                        <div class="card-body">
                            This is notification body, what do you think about it?
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-center">
                <a class='mt-4 block text-theme-primary hover:text-theme-darked-primary' href="#">View all</a>
            </div>
        </div>
    </div>
</section>
@endsection

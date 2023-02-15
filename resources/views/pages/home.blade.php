@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card card-pending">
            <h2>Pending</h2>
            <p>Order status: Pending</p>
            <span>12</span>
        </div>
        <div class="card card-loading">
            <h2>Loading</h2>
            <p>Order status: Loading</p>
            <span>3</span>
        </div>
        <div class="card card-dispatched">
            <h2>Dispatched</h2>
            <p>Order status: Dispatched</p>
            <span>5</span>
        </div>
        <div class="card card-delivered">
            <h2>Delivered</h2>
            <p>Order status: Delivered</p>
            <span>20</span>
        </div>
    </div>
    <div class="container">
        <div class="row mb-5" style="display: flex; justify-content: space-around; flex-direction: row;">
            <div class="col-md-4 vehicle-status-card-1">
                <i class="fa fa-car vehicle-status-card-icon-1"></i>
                <h3 class="vehicle-status-card-title-1">Available Vehicles</h3>
                <p class="vehicle-status-card-subtitle-1">5</p>
            </div>
            <div class="col-md-4 vehicle-status-card-1">
                <i class="fa fa-truck vehicle-status-card-icon-2"></i>
                <h3 class="vehicle-status-card-title-2">Loading Vehicles</h3>
                <p class="vehicle-status-card-subtitle-2">3</p>
            </div>
            <div class="col-md-4 vehicle-status-card-1">
                <i class="fa fa-bus vehicle-status-card-icon-3"></i>
                <h3 class="vehicle-status-card-title-3">In Transit Vehicles</h3>
                <p class="vehicle-status-card-subtitle-3">7</p>
            </div>
        </div>
    </div>


    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue2!'
            }
        })
    </script>
@endsection

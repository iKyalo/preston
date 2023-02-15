@extends('layouts.default')

@section('content')
    <div id="orders-table" class="container" style="margin-top: 2rem">
        <div class="row">
            <div class="col col-sm-6">
                <h2>Orders</h2>
            </div>
            <div class="col col-sm-6">
                <a href="/orders/create" style="float: left;" class="btn btn-primary ml-5">
                    Add New
                </a>
            </div>
        </div>
        <hr />
        <br />

        <table class="vehicle-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Order Number</th>
                    <th>Order Status</th>
                    <th>Delivery Address</th>
                    <th>City, County</th>
                    <th>Instructions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the vehicles and display their details in each row -->
                @foreach ($orders as $vv)
                    <tr class="vehicle-table-row">
                        <td>{{ $vv->id }}</td>
                        <td>{{ $vv->customer_id }}</td>
                        <td>{{ $vv->order_number }}</td>
                        <td>{{ $vv->order_status }}</td>
                        <td>{{ $vv->delivery_address }}</td>
                        <td>{{ $vv->delivery_city }}, {{ $vv->delivery_state }}</td>
                        <td>{{ $vv->delivery_instructions }}</td>
                        <td>
                            <a href="/orders/edit/{{ $vv->id }}" class="mr-1 edit-vehicle-btn">
                                Edit
                            </a>
                            <button @click="showAlert({{ $vv->id }})" class="ml-1 delete-vehicle-btn">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script type="application/javascript">
        var app = new Vue({
            el: '#orders-table',
            data() {
                return {};
            },
            methods: {
                showAlert(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            axios.post('/orders/delete', { id: id })
                            .then(response => {
                                console.log(response.data);
                                Swal.fire(
                                    'Deleted!',
                                    'Item has been deleted.',
                                    'success'
                                )
                                window.location.reload();
                            })
                            .catch(error => {
                                console.error(error);
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'Something went wrong!',
                                    showConfirmButton: false,
                                    timer: 1500
                                    })
                            });
                           
                        }
                    })
                },
            },
        })
    </script>
@endsection

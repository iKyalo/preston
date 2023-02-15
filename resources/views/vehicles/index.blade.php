@extends('layouts.default')

@section('content')
    <div id="vehicles-table" class="container" style="margin-top: 2rem">
        <div class="row">
            <div class="col col-sm-6">
                <h2>Vehicles</h2>
            </div>
            <div class="col col-sm-6">
                <a href="/vehicles/create" style="float: left;" class="btn btn-primary ml-5">
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
                    <th>Number Plate</th>
                    <th>Capacity</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Current Location</th>
                    <th>Last Dispatch</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the vehicles and display their details in each row -->
                @foreach ($vehicles as $vv)
                    <tr class="vehicle-table-row">
                        <td>{{ $vv->id }}</td>
                        <td>{{ $vv->number_plate }}</td>
                        <td>{{ $vv->capacity }}</td>
                        <td>{{ $vv->type }}</td>
                        <td>{{ $vv->type }}</td>
                        <td>{{ $vv->current_location }}</td>
                        <td>{{ $vv->last_dispatch_at }}</td>
                        <td>
                            <a href="/vehicles/edit/{{ $vv->id }}" class="edit-vehicle-btn">
                                Edit
                            </a>
                            <button @click="showAlert({{ $vv->id }})" class="delete-vehicle-btn">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>


    <script type="application/javascript">
        var app = new Vue({
            el: '#vehicles-table',
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
                            axios.post('/vehicles/delete', { id: id })
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

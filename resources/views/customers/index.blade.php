@extends('layouts.default')

@section('content')
    <div id="customers-table" class="container" style="margin-top: 2rem">
        <div class="row">
            <div class="col col-sm-6">
                <h2>Customers</h2>
            </div>
            <div class="col col-sm-6">
                <a href="/customers/create" style="float: left;" class="btn btn-primary ml-5">
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>County</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the vehicles and display their details in each row -->
                @foreach ($customers as $cc)
                    <tr class="vehicle-table-row">
                        <td>{{ $cc->id }}</td>
                        <td>{{ $cc->name }}</td>
                        <td>{{ $cc->email }}</td>
                        <td>{{ $cc->phone }}</td>
                        <td>{{ $cc->address }}</td>
                        <td>{{ $cc->city }}</td>
                        <td>{{ $cc->county }}</td>
                        <td>
                            <a href="/customers/edit/{{ $cc->id }}" class="edit-vehicle-btn">
                                Edit
                            </a>
                            <button @click="showAlert({{ $cc->id }})" class="delete-vehicle-btn">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script type="application/javascript">
        var app = new Vue({
            el: '#customers-table',
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
                            axios.post('/customers/delete', { id: id })
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

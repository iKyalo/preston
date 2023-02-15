@extends('layouts.default')

@section('content')
    <div class="container" style="margin-top: 2rem">
        <h2>Depots</h2>
        <hr />
        <br />
        <table class="vehicle-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the vehicles and display their details in each row -->
                <tr class="vehicle-table-row">
                    <td>1</td>
                    <td>Toyota</td>
                    <td>Camry</td>
                    <td>2022</td>
                    <td>
                        <button class="edit-vehicle-btn">Edit</button>
                        <button class="delete-vehicle-btn">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
@endsection

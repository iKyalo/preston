@extends('layouts.default')

@section('content')
    <div class="container">
        <form method="POST" action="/vehicles/create">
            <h2> {{ $editing ? 'Edit' : 'Add New' }} Vehicle</h2>
            <hr />
            <br>
            @csrf
            <div class="form-group">
                <label for="number_plate">Number Plate:</label>
                <input type="text" id="number_plate" name="number_plate"
                    value="{{ $editing && isset($vehicle) ? $vehicle->number_plate : '' }}" required>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" value="{{ $editing ? $vehicle->capacity : '' }}"
                    required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="">-- Select Type --</option>
                    <option value="car">Car</option>
                    <option value="truck">Truck</option>
                    <option value="motorcycle">Motorcycle</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <div class="radio-group">
                    <input type="radio" id="available" name="status" value="available" required>
                    <label for="available">Available</label>
                    <input type="radio" id="unavailable" name="status" value="unavailable" required>
                    <label for="unavailable">Unavailable</label>
                </div>
            </div>
            <hr />
            <br>
            <button type="submit">Submit</button>
        </form>

    </div>
@endsection

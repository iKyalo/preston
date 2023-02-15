@extends('layouts.default')

@section('content')
    <div id="orderForm" class="container">
        <form>
            <h2>{{ $editing ? 'Edit ' : 'Place New ' }}Order</h2>
            <hr />
            <button @click="showAlert" class="btn btn-primary">Assign to Vehicle</button>
            <hr />
            <br>
            @csrf
            <div class="form-group">
                <label for="customer_id">Customer ID:</label>
                <input type="text" id="customer_id" name="customer_id" value="{{ $editing ? $order->customer_id : '' }}"
                    required>
            </div>

            <div class="form-group">
                <label for="order_number">Order Number:</label>
                <input type="text" id="order_number" name="order_number"
                    value="{{ $editing ? $order->order_number : '' }}" required>
            </div>

            <div class="form-group">
                <label for="order_status">Order Status:</label>
                <select id="order_status" name="order_status" required>
                    <option value="">-- Select Status --</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                </select>
            </div>

            <div class="form-group">
                <label for="delivery_location">Delivery Location:</label>
                <input type="text" id="delivery_location" name="delivery_location"
                    value="{{ $editing ? $order->delivery_location : '' }}" required>
            </div>

            <div class="form-group">
                <label for="delivery_town">Delivery Town:</label>
                <input type="text" id="delivery_town" name="delivery_town"
                    value="{{ $editing ? $order->delivery_town : '' }}" required>
            </div>

            <div class="form-group">
                <label for="delivery_county">Delivery County:</label>
                <input type="text" id="delivery_county" name="delivery_county"
                    value="{{ $editing ? $order->delivery_county : '' }}" required>
            </div>

            <div class="form-group">
                <label for="delivery_instructions">Delivery Instructions:</label>
                <textarea id="delivery_instructions" name="delivery_instructions"
                    value="{{ $editing ? $order->delivery_instructions : '' }}" rows="6"></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>

    </div>

    <script type="application/javascript">
        var app = new Vue({
            el: '#orderForm',
            data() {
                return {
                    vehicles: [],
                    numberPlates: []
                };
            },
            mounted() {
                axios.get('/vehicles/available')
                .then(response => {
                    console.log(response)
                    this.vehicles = response.data;
                    this.numberPlates = this.vehicles.map(vehicle => vehicle.number_plate);
                })
                
                .catch(error => {
                    console.log(error);
                });
            },
            methods: {
                showAlert(event) {
                    event.preventDefault();

                    const url = window.location.href;
                    const parts = url.split("/");
                    const order_id = parts[parts.length - 1];
                    
                    (async () => {
                        const { value: plate } = await Swal.fire({
                        title: 'Select vehicle',
                        input: 'select',
                        inputOptions: this.numberPlates,
                        inputPlaceholder: 'Select a vehicle',
                        showCancelButton: true,
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                resolve()
                            })
                        }
                        })

                        if (plate) {
                            console.log(this.numberPlates);
                            var plate_num = this.numberPlates[plate];
                            axios.post('/orders/assign', {
                                order_id: order_id, 
                                vehicle: plate_num 
                                })
                                .then(response => {
                                // Handle the response here
                                console.log(response)
                                window.location.replace('/orders');
                                })
                                .catch(error => {
                                console.log(error);
                                });
                        }
                    })()
                },
            },
        })
    </script>
@endsection

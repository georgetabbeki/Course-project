<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .center {
            margin: auto;
            width: 100%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;

        }

        .font_size {
            text-align: center;
            font-size: 40px;
            padding-top: 40px;
        }

        .img_size {
            width: 200px;
            height: 120px;
        }

        .th_color {
            background: skyblue;
        }

        .th_deg {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                        {{ session()->get('message') }}

                    </div>
                @endif

                <h2 class="font_size">All Orders</h2>

                <div style="padding-left:  40%;padding-top: 20px;">
                    <form action="{{ url('search') }}" method="get">
                        @csrf
                        <input type="text" style="color: skyblue;" name="search" placeholder="Search For Something">
                        <input type="submit" style="font-size: 20px; background-color:skyblue" value="search"
                            class="btn btn-outline-primary">
                    </form>
                </div>


                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">customers name</th>
                        <th class="th_deg">email</th>
                        <th class="th_deg">phone</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">User ID</th>
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Pric</th>
                        <th class="th_deg">Payment status</th>
                        <th class="th_deg">Delivery status</th>
                        <th class="th_deg">image</th>
                        <th class="th_deg">Delivered</th>
                        <th class="th_deg">Print PDF</th>
                        <th class="th_deg">Send Email</th>


                    </tr>
                    @forelse ($order as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                <img class="img_size" src="/product/{{ $order->image }}">
                            </td>
                            <td>

                                @if ($order->delivery_status == 'processing')
                                    <a href="{{ url('delivered', $order->id) }}"
                                        onclick="return confirm('Are You Sure This Product Is Delevired !!!!')"
                                        class="btn btn-primary">Delivered</a>
                                @else
                                    <P style="color: skyblue;">Delivered</P>
                                @endif
                            </td>

                            <td>
                                <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secendary"
                                    style="background: green;">Print PDF</a>
                            </td>

                            <td>
                                <a href="{{ url('send_emil', $order->id) }}" class="btn btn-info">Send Email</a>
                            </td>

                        </tr>
                    @empty
                        <div>
                            <td colspan="16" style="color: red; font-size:20px;">No Data Found</td>
                        </div>
                    @endforelse

                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>

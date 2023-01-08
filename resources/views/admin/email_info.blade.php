<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: blue;
            padding-bottom: 20px;
        }

        label {
            display: inline-table;
            width: 20px;
        }

        .div_design {
            padding-bottom: 20px;

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
                <div class="main-panel">
                    <div class="content-wrapper">

                        <h1 style="text-align: center; font-size: 25px;"> Send Email TO : {{ $order->email }}</h1>
                        <form action="{{ url('send_user_email', $order->id) }}" method="post">
                            @csrf
                            <div style="padding-left: 35%; padding-top:30px;">
                                <label>Email Greeting</label>
                                <input style="color:skyblue;" type="text" name="greeting">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px;">
                                <label>Email FirstLine</label>
                                <input style="color: skyblue" type="text" name="firstline">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px;">
                                <label>Email Body</label>
                                <input style="color: skyblue" type="text" name="body">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px;">
                                <label>Email Button Name</label>
                                <input style="color: skyblue" type="text" name="button">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px;">
                                <label>Email Url</label>
                                <input style="color: skyblue" type="text" name="url">
                            </div>

                            <div style="padding-left: 35%; padding-top:30px;">
                                <label>Email Last Line</label>
                                <input style="color: skyblue" type="text" name="lastline">
                            </div>

                            <div style="padding-left: 40%;">
                                <input style="background-color: skyblue; font-size:20px;" type="submit"
                                    value="send email" class="btn btn-primary">
                            </div>

                        </form>

                    </div>
                </div>

                <!-- container-scroller -->
                <!-- plugins:js -->
                @include('admin.script')
                <!-- End custom js for this page -->
</body>

</html>

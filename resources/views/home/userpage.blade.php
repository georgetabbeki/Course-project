<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>G - Store</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    @include('sweetalert::alert')

    <div class="hero_area">
        <!-- header section strats -->

        <!-- end header section -->
        @include('home.header')
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>

    <!-- product section -->
    @include('home.product')
    <!-- end product section -->

    <!--Comment & Reply System Starts Here-->

    <div style="text-align: center;padding-bottom:30px;">
        <h1 style="color:skyblue; text-align: center;font-size:30px;padding-top:20px;padding-bottom:30px;">-- Comments
            --
        </h1>
        <form action="{{ url('add_comment') }}" method="" style="text-align:center">
            @csrf
            <textarea style="height: 1cm; width:600px;" placeholder="Comment Somthing Here" name="comment"></textarea>
            <br>
            <input type="submit" class="btn btn-primary" value="comment">
        </form>
    </div>

    <div style="padding-left: 10%">
        <h1 style="color:skyblue; font-size: 30px;padding-bottom:20px"> -- All Comments -- </h1>

        @foreach ($comment as $comment)
            <div>
                <b>{{ $comment->name }}</b>
                <p>{{ $comment->comment }}</p>
                <a style="color: skyblue;" href="javascript::void(0);" onclick="reply(this)"
                    data-commentid="{{ $comment->id }}">Reply</a>
                @foreach ($reply as $rep)
                    @if ($rep->comment_id == $comment->id)
                        <div style="padding-left: 3%;padding-bottom:10px;">
                            <b>{{ $rep->name }}</b>
                            <p>{{ $rep->reply }}</p>
                            <a style="color: skyblue;" href="javascript::void(0);" onclick="reply(this)"
                                data-commentid="{{ $comment->id }}">Reply</a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach

        <!-- reply-->
        <div style="display: none;" class="replyDiv">

            <form action="{{ url('add_reply') }}" method="POST">
                @csrf


                <input type="text" id="commentId" name="commentId" hidden="">


                <textarea style="height: 100px; width:500px;" placeholder="Write Somthing Here" name="reply"></textarea>
                <br>
                <button type="submit" style="background-color: red;" class="btn btn-primary">Reply</button>
                <a style="color: skyblue;" href="javascript::voide(0);" class="btn"
                    onclick="reply_close (this)">Close</a>
            </form>
        </div>

    </div>



    <!-- Comment & Reply System end Here-->




    <!-- client section -->
    @include('home.client')
    <!-- end client section -->

    <!-- why section -->
    @include('home.why')
    <!-- end why section -->

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© All Rights Reserved By <a href=""Free Html Templates</a><br>

                Distributed By <a href="" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {
            $('.replyDiv').hide();

        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>

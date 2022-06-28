<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Order Ticket</title>
    <!-- VENDOR CSS -->


    <link rel="stylesheet" href="{{ url('vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/jquery.steps.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('vendor/site.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body style="background: rgba(31,41,55,1);" class="theme-cyan font-montserrat">
    <script
        src="https://www.paypal.com/sdk/js?client-id=AZLvhWJ0xCC8u5DDs-xL9DhPBd2FPqiDt7jFfu7F3FsaIf0WkTeL2M3NJ-H-8brhhv7L1RJ1V6L9Hq0w">
        // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
    </script>



    <style>
        .disabled_anchor {
            pointer-events: none;
            background: #e2e4e7 !important;
        }

        .hungry .selection {
            margin: 5px;

        }

        .hungry .selection label {
            display: inline-block;
            width: 8em;
            background-color: #42b4d6;
            border-radius: 6px;
            color: #ffffff;
            padding: 0.5em;
            cursor: pointer;
        }

        .hungry .selection label:hover {
            background-color: #5fc0dc;
        }

        .hungry .selection input[type=radio] {
            display: none;
        }

        .hungry .selection input[type=radio]:checked~label {
            background-color: #f1592a;
        }


        /*Container styles*/
        .movie-container {
            margin: 20px 0;
        }

        .movie-container select {
            background-color: #fff;
            border: 0;
            border-radius: 5px;
            font-size: 14px;
            margin-left: 10px;
            padding: 5px 15px 5px 15px;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .container {
            perspective: 1000px;
            margin-bottom: 30px;
        }

        /*Screen styles*/
        .screen {
            background-color: #fff;
            height: 70px;
            width: 60%;
            margin: auto;
            transform: rotateX(-45deg);
            box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
        }

        /*Row and seat styles*/
        .row {
            display: flex;
        }

        .seat {
            background-color: #444451;
            height: 22px;
            width: 25px;
            margin: 5px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .seat.selected {
            background-color: #6feaf6;
        }

        .seat.occupied {
            background-color: #fff;
        }

        .seat:nth-of-type(2) {
            margin-right: 28px;
        }

        .seat:nth-last-of-type(2) {
            margin-left: 28px;
        }

        .seat:not(.occupied):hover {
            cursor: pointer;
            transform: scale(1.2);
        }

        .showcase .seat:not(.occupied):hover {
            cursor: default;
            transform: scale(1);
        }

        /*Showcase styles*/
        .showcase {
            background-color: rgba(0, 0, 0, 0.1);
            padding: 5px 10px;
            border-radius: 5px;
            color: #777;
            list-style-type: none;
            display: flex;
            justify-content: space-between;
        }

        .showcase li {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
        }

        .showcase li small {
            margin-left: 2px;
        }

        /*Text styles*/
        p.text {
            margin: 5px 0;
        }

        p.text span {
            color: #6feaf6;
        }

        /*Clear Selection button styles*/
        button {
            margin-top: 25px;

        }










        div.contenter {
            max-width: 1350px;
            margin: 0 auto;
            overflow: hidden
        }

        .upcomming {
            font-size: 45px;
            text-transform: uppercase;
            border-left: 14px solid rgba(255, 235, 59, 0.78);
            padding-left: 12px;
            margin: 18px 8px;
        }

        .contenter .item {
            width: 48%;
            float: left;
            padding: 0 20px;
            background: #fff;
            overflow: hidden;
            margin: 10px
        }

        .contenter .item-right,
        .contenter .item-left {
            float: left;
            padding: 20px
        }

        .contenter .item-right {
            padding: 79px 50px;
            margin-right: 20px;
            width: 25%;
            position: relative;
            height: 286px
        }

        .contenter .item-right .up-border,
        .contenter .item-right .down-border {
            padding: 14px 15px;
            background-color: #ddd;
            border-radius: 50%;
            position: absolute
        }

        .contenter .item-right .up-border {
            top: -8px;
            right: -35px;
        }

        .contenter .item-right .down-border {
            bottom: -13px;
            right: -35px;
        }

        .contenter .item-right .num {
            font-size: 30px;
            text-align: center;
            color: #111
        }

        .contenter .item-right .day,
        .contenter .item-left .event {
            color: #555;
            font-size: 20px;
            margin-bottom: 9px;
        }

        .contenter .item-right .day {
            text-align: center;
            font-size: 25px;
        }

        .contenter .item-left {
            width: 71%;
            padding: 34px 0px 19px 46px;
            border-left: 3px dotted #999;
        }

        .contenter .item-left .title {
            color: #111;
            font-size: 34px;
            margin-bottom: 12px
        }

        .contenter .item-left .sce {
            margin-top: 5px;
            display: block
        }

        .contenter .item-left .sce .icon,
        .contenter .item-left .sce p,
        .contenter .item-left .loc .icon,
        .contenter .item-left .loc p {
            float: left;
            word-spacing: 5px;
            letter-spacing: 1px;
            color: #888;
            margin-bottom: 10px;
        }

        .contenter .item-left .sce .icon,
        .contenter .item-left .loc .icon {
            margin-right: 10px;
            font-size: 20px;
            color: #666
        }

        .contenter .item-left .loc {
            display: block
        }

        .fix {
            clear: both
        }

        .contenter .item .tickets,
        .booked,
        .cancel {
            color: #fff;
            padding: 6px 14px;
            float: right;
            margin-top: 10px;
            font-size: 18px;
            border: none;
            cursor: pointer
        }

        .contenter .item .tickets {
            background: #777
        }

        .contenter .item .booked {
            background: #3D71E9
        }

        .contenter .item .cancel {
            background: #DF5454
        }

        .linethrough {
            text-decoration: line-through
        }

        @media only screen and (max-width: 1150px) {
            .contenter .item {
                width: 100%;
                margin-right: 20px
            }

            div.contenter {
                margin: 0 20px auto
            }
        }
    </style>
    <div class="container-fluid">
        <div class="block-header">
            <div class="clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Order Ticket </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Order</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>

        <div class="clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">

                    <div class="body">

                        <div id="wizard_horizontal">
                            <h2>I.Form Data</h2>
                            <section>
                                <div class="___class_+?12___">
                                    <div style="display:flex;">
                                        <div style="flex:1;">
                                            <img style="max-width:100%;
                                             max-height:100%;
                                             "
                                                src="{{ url('/thumb_mov' . '/' . $data->thumb) }}" alt="">
                                        </div>
                                        <div style="flex:4;padding:20px;display:flex;flex-direction: column;">
                                            <div style="flex:1;">
                                                <center>
                                                    <h1>Room</h1>
                                                </center>
                                                <div class="hungry"
                                                    style="display:flex;flex-wrap:wrap;justify-content: center">

                                                    @foreach (explode(',', $data->on_air) as $room)
                                                        <div class="selection">
                                                            <input value="{{ $room }}" id="{{ $room }}"
                                                                name="room" type="radio">
                                                            <label for="{{ $room }}">{{ $room }}</label>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div style="flex: 3;">
                                                <center>
                                                    <h1>Metadata Tiket</h1>
                                                </center>
                                                <div class="form-group">
                                                    <input id="name" type="text" name="name"
                                                        placeholder="Name *" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" name="date" id="date"
                                                        placeholder="date *" class="form-control" required>
                                                </div>

                                                {{-- <div class="form-group">
                                                    <input type="number" name="number" placeholder="number *"
                                                        class="form-control" required>
                                                </div> --}}



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h2>II. Select Seat</h2>
                            <section>


                                <input type="hidden" id="movie" name="movie" value="{{ $data->price }}">
                                <ul class="showcase">
                                    <li>
                                        <div class="seat"></div>
                                        <small>N/A</small>
                                    </li>
                                    <li>
                                        <div class="seat selected"></div>
                                        <small>Selected</small>
                                    </li>
                                    <li>
                                        <div class="seat occupied"></div>
                                        <small>Occupied</small>
                                    </li>
                                </ul>
                                <div class="container">
                                    <div class="screen"></div>

                                    @for ($i = 0; $i < 6; $i++)

                                        <div style="justify-content: center" class="row">

                                            @for ($j = 0; $j < 8; $j++)
                                                <div title="{{ $j + 1 }}{{ chr($i + 65) }}"
                                                    data-value="{{ $j + 1 }}{{ chr($i + 65) }}"
                                                    class="seat">
                                                </div>
                                            @endfor

                                        </div>
                                    @endfor

                                </div>
                                <p class="text">
                                    You have selected <span id="count">0</span> seats for a price of Rp.<span
                                        id="total">0</span>
                                    <input type="hidden" id="total_price" value="">
                                </p>





                            </section>
                            <h2>III. Verification</h2>
                            <section>
                                <div class="contenter" id="contenter">




                                </div>



                            </section>
                            <h2>IV.Payment</h2>
                            <section>
                                <center>
                                    <div id="paypal-button-container"></div>
                                </center>

                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>








    <script src="{{ url('vendor/libscripts.bundle.js') }}"></script>
    <script src="{{ url('vendor/vendorscripts.bundle.js') }}"></script>

    <script src="{{ url('vendor/jquery.validate.js') }}"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="{{ url('vendor/jquery.steps.js') }}"></script>
    <!-- JQuery Steps Plugin Js -->
    <script src="{{ url('vendor/mainscripts.bundle.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="{{ url('vendor/form-wizard.js')}}"></script> --}}
    <script>
        var title = @json($data->title);


        $(function() {




            //Horizontal form basic
            $('#wizard_horizontal_icon').steps({
                headerTag: 'h2',
                bodyTag: 'section',
                transitionEffect: 'slideLeft',
                onInit: function(event, currentIndex) {

                    setButtonWavesEffect(event);
                },
                onStepChanged: function(event, currentIndex, priorIndex) {
                    setButtonWavesEffect(event);
                }
            });

            //Horizontal form basic
            $('#wizard_horizontal').steps({
                headerTag: 'h2',
                bodyTag: 'section',
                transitionEffect: 'slideLeft',
                onInit: function(event, currentIndex) {
                    $('#next').addClass("disabled_anchor");
                    setInterval(() => {
                        // console.log($('input[name="room"]:radio:checked').val());
                        if (!$('#name').val() == "" && $('input[name="room"]:radio:checked')
                            .val() !== null && !$('#date').val() == '') {
                            $('#next').removeClass("disabled_anchor");

                        } else {
                            $('#next').addClass("disabled_anchor");
                        }

                    }, 1000);
                    setButtonWavesEffect(event);
                },

                onStepChanged: function(event, currentIndex, priorIndex) {

                    if (currentIndex == 1) {
                        // console.log("haeee");


                        // var dt = ;
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/check_cinema",
                            method: 'POST',
                            data: {
                                date: $('#date').val(),
                                movie_id: @json($data->id),
                                room: $('input[name="room"]:radio:checked').val()
                            },
                            success: function(result) {
                                const seat = document.querySelectorAll(".row .seat");
                                seat.forEach(element => {
                                    if (result.includes(element.getAttribute(
                                            'data-value'))) {
                                        element.classList.add("occupied");
                                        element.classList.remove("selected");
                                    } else {
                                        element.classList.remove("occupied");
                                    }
                                });
                                updateSelectedCount();

                            }
                        });



                        const container = document.querySelector(".container");
                        // console.log(container);
                        // console.log(container);
                        const seats = document.querySelectorAll(".row .seat:not(.occupied)");
                        // console.log('ini seats' +seats);
                        const count = document.getElementById("count");
                        const total = document.getElementById("total");
                        const movieSelect = document.getElementById("movie");
                        let ticketPrice = +movieSelect.value;


                        // Note: localStorage is not enabled in CodePen for security reasons.
                        function populateUI() {
                            const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
                            if (selectedSeats !== null && selectedSeats.length > 0) {
                                seats.forEach((seat, index) => {
                                    if (selectedSeats.indexOf(index) > -1) seat.classList.add(
                                        "selected");
                                });
                            }
                            const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");
                            if (selectedMovieIndex !== null)
                                movieSelect.selectedIndex = selectedMovieIndex;
                        }

                        function setMovieData(movieIndex, moviePrice) {
                            localStorage.setItem("selectedMovieIndex", movieIndex);
                            localStorage.setItem("selectedMoviePrice", moviePrice);
                        }

                        function updateSelectedCount() {
                            console.log("masuk ke update");
                            const selectedSeats = document.querySelectorAll(".row .seat.selected");
                            // const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
                            // localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));
                            const selectedSeatsCount = selectedSeats.length;
                            count.innerText = selectedSeatsCount;
                            total.innerText = selectedSeatsCount * ticketPrice;
                            $('#total_price').val(selectedSeatsCount * ticketPrice);
                        }

                        movieSelect.addEventListener("change", (e) => {
                            ticketPrice = +e.target.value;
                            // setMovieData(e.target.selectedIndex, e.target.value);
                            updateSelectedCount();
                        });

                        container.addEventListener("click", (e) => {
                            e.preventDefault();
                            e.stopImmediatePropagation();
                            console.log("ini class list " + e.target.classList);
                            if (
                                !e.target.classList.contains("selected") &&
                                !e.target.classList.contains("occupied")
                            ) {
                                console.log('haha');

                                e.target.classList.add("selected");
                                updateSelectedCount();
                            } else {
                                console.log("masuk else");
                                e.target.classList.remove("selected");
                                updateSelectedCount();
                            }
                        });
                        // $(window).click(function(e) {
                        //     e.preventDefault();
                        //     e.stopImmediatePropagation();
                        //     // alert(e.target.classList);
                        //     if (
                        //         e.target.classList.contains("seat") &&
                        //         !e.target.classList.contains("selected") &&
                        //         !e.target.classList.contains("occupied")
                        //     ) {
                        //         console.log('haha');

                        //         e.target.classList.add("selected");
                        //         updateSelectedCount();
                        //     } else {
                        //         console.log("masuk else");
                        //         e.target.classList.remove("selected");
                        //         updateSelectedCount();
                        //     }
                        // });


                        // function add(e) {

                        //     console.log("add");

                        //     if (
                        //     e.target.classList.contains("seat") &&
                        //     !e.target.classList.contains("occupied")
                        //   ) {
                        //     e.target.classList.toggle("selected");
                        //     updateSelectedCount();
                        //   }
                        // }

                        // Init
                        // populateUI();
                        // populateUI();
                        // updateSelectedCount();

                    } else if (currentIndex == 2) {
                        console.log('harganya ' + $('#total_price').val());

                        $('#contenter').html('');

                        var name = $('#name').val();
                        var date = $('#date').val();

                        var dt = date.split('-');


                        var room = $('input[name="room"]:checked').val();
                        var time = 0;
                        var list = document.querySelectorAll(".seat.selected");
                        var div_array = [...list]; // converts NodeList to Array
                        div_array.forEach(div => {
                            if (!time == 0) {



                                $('#contenter').append(`

            <div class="item">
<div class="item-right">
    <h2 class="num">${div.getAttribute('data-value')}</h2>
  <p class="day">${dt[2]}</p>
  <p class="day">${dt[1]}</p>
  <p class="day">${dt[0]}</p>
  <span class="up-border"></span>
  <span class="down-border"></span>
</div> <!-- end item-right -->

<div class="item-left">
  <p class="event">${name}</p>
  <h2 class="title">${title}</h2>

  <div class="sce">
    <div class="icon">
      <i class="fa fa-table"></i>
    </div>
    <p>${date} room : ${room}</p>
  </div>
  <div class="fix"></div>
  <div class="loc">
    <div class="icon">
      <i class="fa fa-map-marker"></i>
    </div>
    <p>Bogor</p>
  </div>
  <div class="fix"></div>
  <button class="tickets">Tickets</button>
</div> <!-- end item-right -->
</div> <!-- end item -->

            `);





                            }
                            time += 1;

                        });








                    } else if (currentIndex == 3) {

                        $('#paypal-button-container').html('');

                        paypal.Buttons({

                            createOrder: function(data, actions) {

                                // This function sets up the details of the transaction, including the amount and line item details.
                                return actions.order.create({

                                    purchase_units: [{

                                        amount: {

                                            value: Math.round($(
                                                    '#total_price')
                                                .val() * 0.000069)

                                        }

                                    }]

                                });

                            },

                            onApprove: function(data, actions) {

                                // This function captures the funds from the transaction.

                                return actions.order.capture().then(function(details) {



                                    // This function shows a transaction success message to your buyer.
                                    var time = 0;
                                    var list = document.querySelectorAll(
                                        ".seat.selected");
                                    var seat_array = [...list];
                                    var
                                        solve_array = []; // converts NodeList to Array
                                    seat_array.forEach(src => {
                                        if (time != 0) {
                                            solve_array.push(src
                                                .getAttribute(
                                                    'data-value'));

                                        } else {
                                            time += 1;
                                        }

                                    });

                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $(
                                                'meta[name="csrf-token"]'
                                            ).attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "/get_ticket",
                                        method: 'POST',
                                        data: {
                                            name: $('#name').val(),
                                            date: $('#date').val(),
                                            seat: solve_array,
                                            room: $(
                                                    'input[name="room"]:radio:checked'
                                                    )
                                                .val(),
                                            has_pay: 1,
                                            movie_id: @json($data->id),

                                        },
                                        success: function(result) {
                                            swal("Success!",
                                                "You're payment has success check your ticket!",
                                                "success");





                                        }
                                    });



                                });

                            }

                        }).render('#paypal-button-container');

                        //This function displays Smart Payment Buttons on your web page.

                    }

                    setButtonWavesEffect(event);
                }
            });

            //Advanced form with validation
            var form = $('#wizard_with_validation').show();
            form.steps({
                headerTag: 'h3',
                bodyTag: 'fieldset',
                transitionEffect: 'slideLeft',
                onStepChanging: function(event, currentIndex, newIndex) {

                    if (currentIndex > newIndex) {
                        return true;
                    }

                    if (currentIndex < newIndex) {
                        form.find('.body:eq(' + newIndex + ') label.error').remove();
                        form.find('.body:eq(' + newIndex + ') .error').removeClass('error');
                    }
                    // if (newIndex == 1){
                    //     set
                    // }

                    form.validate().settings.ignore = ':disabled,:hidden';
                    return form.valid();
                },
                onStepChanged: function(event, currentIndex, priorIndex) {
                    setButtonWavesEffect(event);
                },
                onFinishing: function(event, currentIndex) {
                    form.validate().settings.ignore = ':disabled';
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    swal("Good job!", "Submitted!", "success");
                }
            });

            form.validate({
                highlight: function(input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function(input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error);
                },
                rules: {
                    'confirm': {
                        equalTo: '#password'
                    }
                }
            });
        });

        function setButtonWavesEffect(event) {
            $(event.currentTarget).find('[role="menu"] li a').removeClass('');
            $(event.currentTarget).find('[role="menu"] li:not(.disabled) a').addClass('');
        }
    </script>


    {{-- <script>
    function coba() {
           // This function shows a transaction success message to your buyer.
           var time = 0;
                                 var list = document.querySelectorAll(".seat.selected");
                                var seat_array = [...list];
                                var solve_array = []; // converts NodeList to Array
                                seat_array.forEach(src => {
                                if (time != 0) {
                                    solve_array.push(src.getAttribute('data-value'));

                                }else {
                                    time += 1;
                                }

                        });

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/get_ticket",
                            method: 'POST',
                            data: {
                                name: $('#name').val(),
                                date: $('#date').val(),
                                seat : solve_array,
                                room: $('input[name="room"]:radio:checked').val(),
                                has_pay: 1,
                                movie_id:@json($data->id)

                            },
                            success: function(result) {
                                alert('beres');


                            }
                        });


    }
</script> --}}


</body>

</html>

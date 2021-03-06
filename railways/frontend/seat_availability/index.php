<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Seat Availability</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://gregfranko.com/jquery.selectBoxIt.js/css/jquery.selectBoxIt.css" />
        <link rel="stylesheet" type="text/css" href="../../css/seat_availability.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="../../js/bootstrap.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <!--datepicker-->
        <link href="../../css/datepicker.min.css" rel="stylesheet" type="text/css">
        <script src="../../js/datepicker.min.js"></script> 
        <script src="../../js/datepicker.en.js"></script>
        
        <script>
            // Initialization
            //$('#date').datepicker([options])
            // Access instance of plugin
            $('#datepicker').data('datepicker')

            function resize(){
                if($(window).width() < 768)
                {
                    $('#newnavbar').addClass('navbar-fixed-top navbar-inverse');
                    console.log('hello');
                }
                else
                {
                    $('#newnavbar').removeClass('navbar-fixed-top').removeClass('navbar-inverse');
                    console.log('bye');                    
                }

                //console.log($(window).width());
            }
            $(document).ready( function() {
                $(window).resize(resize);
                resize();
            });
        </script>
    </head>

    <body >
        <div class="top">
            <nav class="navbar" id="newnavbar" style="padding-top:10px;">
                <div class="container-fluid">
                    <div class=" navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>                    
                        <div class="navbar-brand logo" style="width:auto;"><a href="index.php">Seat Jugaad</a></div>

                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar" >
                        <ul class="nav navbar-nav menu" >

                            <li><a href="./new_seat_availability.php">SEAT AVAILABILITY</a></li>
                            <li><a href="index.php">PNR STATUS</a></li>
                            <li><a href="#">FAIR ENQUIRY</a></li>
                            <li><a href="train_live_status.php">LIVE TRAIN STATUS</a></li>
                            <li><a href="#">CANCELLED TRAINS</a></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="middle ">
                <div class="mid-first">
                    <div class="mid-first-icon">

                    </div>

                </div>
                <div class="mid-second">

                    <div class="form-top">
                        <span class="summary" id="summary"></span>
                        <span class="steps" id="steps"><b></b></span>
                    </div>
                    <form id="availability" action="../../backend/algo/seat_availability.php" method="POST">
                    <!-- <form id="availability" action="../backend/algo/check_seat_availability.php" method="POST"> -->
                    <!-- <form id="availability" action="new_seat_availability_result.php" method="POST"> -->
                        <div class="mid-content">
                            <div class="source " id="source">
                                <div class="details">
                                    <fieldset data-form-name="source">
                                        <legend> Enter Source</legend>
                                        <input class="" name="source" type="text" id="src" data-type="text" required >
                                        <label class="error-msg errsrc"></label>
                                    </fieldset>
                                </div>
                                <span class="submit">
                                    <img src="../../images/next.png" class="next2" onclick="rotate('next2'); ">
                                </span>
                            </div>

                            <div class="dest " id="destn">
                                <div class="details">
                                    <fieldset data-form-name="dest">
                                        <legend> Enter Destination</legend>
                                        <input class="" name="destination" type="text" id="dest" data-type="text" required>
                                        <label class="error-msg errdestn"></label>
                                    </fieldset>
                                </div>
                                <span class="submit">
                                    <img src="../../images/prev.png" onclick="rotate('prev1');">
                                    <img src="../../images/next.png" onclick="rotate('next3');">
                                </span>
                            </div>

                            <div class="date" id="date">
                                <div class="details">
                                    <fieldset data-form-name="date">
                                        <legend> Enter Date Of Journey</legend>
                                        <input class="date-picker form-control" name="doj" type="text" id="datepicker" data-type="text" required>
                                        <script>
                                            $('#datepicker').datepicker({
                                                dateFormat: 'dd-mm-yy',
                                                language: 'en',
                                                minDate: new Date() ,
                                                //maxDate: minDate.getDate()+120
                                            })
                                        </script>
                                        <label class="error-msg errdate"></label>
                                    </fieldset>
                                </div>
                                <span class="submit">
                                    <img src="../../images/prev.png" onclick="rotate('prev2');">
                                    <img src="../../images/next.png" onclick="rotate('next4');">
                                </span>
                            </div>

                            <div class="selclass" id="selclass">
                                <div class="details">
                                    <fieldset data-form-name="selclass">
                                        <legend> Select Your Preferred Class</legend>
                                        <select class="drop-down" name="class" id='travel_class'>
                                            <option value=ALL  selected  >All Classes</option>
                                            <option value=1A  >First AC</option>
                                            <option value=2A  >Second AC</option>
                                            <option value=3A  >Third AC</option>
                                            <option value=FC  >First Class</option>
                                            <option value=3E  >Third Economy</option>
                                            <option value=SL  >Sleeper</option>
                                            <option value=CC  >Chair Car</option>
                                            <option value=2S  >Second Seater</option>
                                        </select>
                                        
                                    </fieldset>
                                </div>
                                <span class="submit">
                                    <img src="../../images/prev.png" onclick="rotate('prev3');">
                                    <img src="../../images/next.png" onclick="rotate('next5');">
                                </span>
                            </div>

                            <div class="quota" id="quota">
                                <div class="details">
                                    <fieldset data-form-name="quota">
                                        <legend> Enter Your Preferred Quota </legend>
                                        <select class="drop-down" name="quota" id='quotadesc'>
                                            <option value=GN >General</option>
                                            <option value=CK >Tatkal</option>
                                            <option value=LD >Ladies</option>
                                            <option value=PT >Premium Tatkal</option>
                                            <option value=DF >Defence</option>
                                            <option value=FT >Foreign Tourist</option>
                                            <option value=SS >Lower Berth</option>
                                            <option value=YU >Yuva</option>
                                            <option value=DP >Duty Pass</option>
                                            <option value=HP >Handicaped</option>
                                            <option value=PH >Parliament House</option>
                                        </select>
                                        
                                    </fieldset>
                                </div>
                                <span class="submit">
                                    <img src="../../images/prev.png" onclick="rotate('prev4');">
                                    <button name="action" value="Find Trains" onclick="rotate('final');"><img src="../../images/next.png" alt="Submit"></button>
                                </span>
                            </div>



                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
    <script src="../../js/seat_availability.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script src="http://gregfranko.com/jquery.selectBoxIt.js/js/jquery.selectBoxIt.min.js"></script>
        <script>
        $(function() {
            var selectBox = $("select").selectBoxIt();
        });
        </script>
</html>

<!-- php code starts here -->
<?php
    $json = file_get_contents('station_list.json');
    $data = json_decode($json,true);
    $new = array();
    for($i=0;$i<count($data);$i++)
    {
        array_push($new, strtoupper($data[$i]['station'] . " - " . $data[$i]['station_code']));
    }
?>

<script>
    <?php
    $js_array = json_encode($new);
    ?>
    $(function() {
    $( "#src, #dest" ).autocomplete({
        source: <?php echo $js_array ?>,
            minLength: 2
        });
    });
</script>

<style>
  .ui-autocomplete {
    max-height: 200px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 200px;
  }
  </style>

<!doctype html>

<html>

<head>
    <!--Title & Meta-->
    <title>My Bobcat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width, height=device-height, viewport-fit=cover">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!--CSS & Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="/css/app.css?<?php echo time(); ?>" rel="stylesheet">

    <!--JS-->
    <script src="https://kit.fontawesome.com/f5fc528adb.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.css" integrity="sha512-BYn1UZcpzkgi4cForzUzU/FqsewIcfXDYAU0tThFfehimrUrp5hOtcWPI1Wpli8rKopUIhaDCbxXPttBDTISgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.2.0/swiper-bundle.min.js" integrity="sha512-XHnWZWvy5TkCnPgLU7XsWhGAks1JQ3uFutVxRSH0Z4+djsGkCkxVsYu+JgfrDicvbCmjfUf1HeMWYUvUYKgjzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6YM3Q8BBC5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6YM3Q8BBC5');
    </script>

</head>

<body>

    <!--Header-->
    <div id="header">
        <div>Home</div>
    </div>

    <!--Slider-->
    <div class="swiper">
        <div class="swiper-wrapper">

            <!--Home-->
            <div class="swiper-slide">
                <div id="DropDayLabel" class="card large">
                    <i class="fa-spin fal fa-spinner-third fa-2x"></i>
                </div>
                <div id="Clock" class="card medium">
                    <i class="fa-spin fal fa-spinner-third fa-2x"></i>
                </div>
                <div id="LunchSelect" class="card medium">
                    <label>
                        <input type="radio" name="Lunch" id="ALunch">
                        A Lunch
                    </label>
                    <hr class="hr">
                    <label>
                        <input type="radio" name="Lunch" id="BLunch">
                        B Lunch
                    </label>
                </div>
                <div class="card medium" id="AnnouncementsContainer">
                    <i class="fa-spin fal fa-spinner-third fa-2x"></i>
                </div>
            </div>

            <!--Schedule-->
            <div class="swiper-slide">
                <div class="card">
                    <div id="ScheduleTitle" class="large">
                        Schedule Dropdown
                    </div>
                    <select id="ScheduleSelect" class="medium">
                        <option for="none" value="0" disabled selected>---</option>
                        <optgroup label="Normal Schedule">
                            <option for="Drop1">Drop 1</option>
                            <option for="Drop2">Drop 2</option>
                            <option for="Drop3">Drop 3</option>
                            <option for="Drop4">Drop 4</option>
                            <option for="Drop5">Drop 5</option>
                            <option for="Drop6">Drop 6</option>
                            <option for="Drop7">Drop 7</option>
                            <option for="Drop8">Drop 8</option>
                            <option for="ADay">A Day</option>
                        </optgroup>
                        <optgroup label="Delay Schedules">
                            <option for="OneHourDelayDrop1">1 Hour Delay - Drop 1</option>
                            <option for="OneHourDelayDrop2">1 Hour Delay - Drop 2</option>
                            <option for="OneHourDelayDrop3">1 Hour Delay - Drop 3</option>
                            <option for="OneHourDelayDrop4">1 Hour Delay - Drop 4</option>
                            <option for="OneHourDelayDrop5">1 Hour Delay - Drop 5</option>
                            <option for="OneHourDelayDrop6">1 Hour Delay - Drop 6</option>
                            <option for="OneHourDelayDrop7">1 Hour Delay - Drop 7</option>
                            <option for="OneHourDelayDrop8">1 Hour Delay - Drop 8</option>
                            <option for="none" value="0" disabled>------------------------------</option>
                            <option for="TwoHourDelayDrop1">2 Hour Delay - Drop 1</option>
                            <option for="TwoHourDelayDrop2">2 Hour Delay - Drop 2</option>
                            <option for="TwoHourDelayDrop3">2 Hour Delay - Drop 3</option>
                            <option for="TwoHourDelayDrop4">2 Hour Delay - Drop 4</option>
                            <option for="TwoHourDelayDrop5">2 Hour Delay - Drop 5</option>
                            <option for="TwoHourDelayDrop6">2 Hour Delay - Drop 6</option>
                            <option for="TwoHourDelayDrop7">2 Hour Delay - Drop 7</option>
                            <option for="TwoHourDelayDrop8">2 Hour Delay - Drop 8</option>
                            <option for="TwoHourDelayADay">2 Hour Delay - A Day</option>
                            <option for="none" value="0" disabled>------------------------------</option>
                            <option for="ThreeHourDelayDrop1">3 Hour Delay - Drop 1</option>
                            <option for="ThreeHourDelayDrop2">3 Hour Delay - Drop 2</option>
                            <option for="ThreeHourDelayDrop3">3 Hour Delay - Drop 3</option>
                            <option for="ThreeHourDelayDrop4">3 Hour Delay - Drop 4</option>
                            <option for="ThreeHourDelayDrop5">3 Hour Delay - Drop 5</option>
                            <option for="ThreeHourDelayDrop6">3 Hour Delay - Drop 6</option>
                            <option for="ThreeHourDelayDrop7">3 Hour Delay - Drop 7</option>
                            <option for="ThreeHourDelayDrop8">3 Hour Delay - Drop 8</option>
                            <option for="ThreeHourDelayADay">3 Hour Delay - A Day</option>
                        </optgroup>
                    </select>
                    <div id="ScheduleTable"></div>
                </div>
            </div>

            <!--Calculator-->
            <div class="swiper-slide">
                <div class="card large" id="CalculatorSelector">
                    <div>GPA</div>
                    <div>Final Grade</div>
                </div>

                <!--GPA Calc-->
                <div id="GPA" class="card hide">
                    <div id="GPAItems">
                        <div class="GPAItem">
                            <input type="text" class="GPAClass" placeholder="Class">
                            <select class="GPACredits">
                                <option value="">---</option>
                                <option value="0.5">1 SEM</option>
                                <option value="1">2 SEM</option>
                            </select>
                            <select class="GPAGrade">
                                <option value="">--</option>
                                <option value="4.6">A+</option>
                                <option value="4.0">A</option>
                                <option value="3.6">B+</option>
                                <option value="3.0">B</option>
                                <option value="2.6">C+</option>
                                <option value="2.0">C</option>
                                <option value="1.0">D</option>
                                <option value="0.0">F</option>
                            </select>
                        </div>
                    </div>
                    <div id="GPAButtons">
                        <div id="GPAAdd">
                            <i class="fal fa-plus fa-2x"></i>
                        </div>
                        <div id="GPARemove">
                            <i class="fal fa-minus fa-2x"></i>
                        </div>
                        <div id="GPACalculate">
                            <i class="fas fa-calculator fa-2x"></i>
                        </div>
                    </div>
                    <div id="GPANotice" class="small">
                        *Use 1 SEM for courses with two quarters.
                        <br>
                        *Use 2 SEM for courses with four quarters.
                    </div>
                </div>

                <!--Final Grade Calc-->
                <div id="FinalGrade" class="hide card medium">
                    <div class="FinalGradeRow">
                        <div>Q1</div>
                        <div>Q2</div>
                        <div>Q3</div>
                        <div>Q4</div>
                        <div>F</div>
                    </div>
                    <div class="FinalGradeRow">
                        <select class="FinalGradeSelect">
                            <option value="">--</option>
                            <option value="4.6">A+</option>
                            <option value="4.0">A</option>
                            <option value="3.6">B+</option>
                            <option value="3.0">B</option>
                            <option value="2.6">C+</option>
                            <option value="2.0">C</option>
                            <option value="1.0">D</option>
                            <option value="0">F</option>
                        </select>
                        <select class="FinalGradeSelect">
                            <option value="">--</option>
                            <option value="4.6">A+</option>
                            <option value="4.0">A</option>
                            <option value="3.6">B+</option>
                            <option value="3.0">B</option>
                            <option value="2.6">C+</option>
                            <option value="2.0">C</option>
                            <option value="1.0">D</option>
                            <option value="0">F</option>
                        </select>
                        <select class="FinalGradeSelect">
                            <option value="">--</option>
                            <option value="4.6">A+</option>
                            <option value="4.0">A</option>
                            <option value="3.6">B+</option>
                            <option value="3.0">B</option>
                            <option value="2.6">C+</option>
                            <option value="2.0">C</option>
                            <option value="1.0">D</option>
                            <option value="0">F</option>
                        </select>
                        <select class="FinalGradeSelect">
                            <option value="">--</option>
                            <option value="4.6">A+</option>
                            <option value="4.0">A</option>
                            <option value="3.6">B+</option>
                            <option value="3.0">B</option>
                            <option value="2.6">C+</option>
                            <option value="2.0">C</option>
                            <option value="1.0">D</option>
                            <option value="0">F</option>
                        </select>
                        <select class="FinalGradeSelect">
                            <option value="">--</option>
                            <option value="4.6">A+</option>
                            <option value="4.0">A</option>
                            <option value="3.6">B+</option>
                            <option value="3.0">B</option>
                            <option value="2.6">C+</option>
                            <option value="2.0">C</option>
                            <option value="1.0">D</option>
                            <option value="0">F</option>
                        </select>
                    </div>
                    <div id="FinalGradeButton">
                        <i class="fas fa-calculator fa-2x"></i>
                    </div>
                    <div id="FinalGradeNotice" class="small">
                        <span>*Enter all grades that apply, anything else leave blank.</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Footer + Nav-->
    <div id="footer">
        <div id="nav">
            <div class="navItem active" slide="0" title="Home">
                <i class="fas fa-home-lg-alt fa-lg"></i>
            </div>
            <div class="navItem" slide="1" title="Schedule">
                <i class="fas fa-clock fa-lg"></i>
            </div>
            <div class="navItem" slide="2" title="Calculator">
                <i class="fas fa-calculator fa-lg"></i>
            </div>
        </div>
    </div>

    <!--End Scripts-->
    <script src="/js/app.js?<?php echo time(); ?>"></script>
    <script src="/js/app-home.js?<?php echo time(); ?>"></script>
    <script src="/js/app-schedule.js?<?php echo time(); ?>"></script>
    <script src="/js/app-calculator.js?<?php echo time(); ?>"></script>
</body>

</html>
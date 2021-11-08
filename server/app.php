<!--
    If you wanna help maintain My Bobcat reach out to zach@maltertech.com
-->

<!doctype html>

<html>

<head>
    <!--Title & Meta-->
    <title>My Bobcat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width, height=device-height, viewport-fit=cover">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!--CSS & Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
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
    <header id="header">
        <div>Home</div>
    </header>

    <!--Slider-->
    <div class="swiper">
        <div class="swiper-wrapper">

            <!--Home-->
            <div class="swiper-slide">
                <div id="dayLabel" class="card large">
                    <i class="fa-spin fal fa-spinner-third fa-2x"></i>
                </div>
                <div id="dayClock" class="card medium">
                    <i class="fa-spin fal fa-spinner-third fa-2x"></i>
                </div>
                <div id="announcements" class="card medium">
                    <i class="fa-spin fal fa-spinner-third fa-2x"></i>
                </div>
            </div>

            <!--Schedule-->
            <div class="swiper-slide">
                <div class="card">
                    <div id="scheduleTitle" class="large"> Schedule Dropdown </div>

                    <table id="scheduleTable" class="medium">
                        <tr>
                            <td>Day</td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>7:45-8:10</td>
                            <td>OH</td>
                            <td>OH</td>
                            <td>OH</td>
                            <td>OH</td>
                            <td>OH</td>
                            <td>OH</td>
                            <td>OH</td>
                            <td>OH</td>
                        </tr>
                        <tr>
                            <td>8:10-9:14</td>
                            <td>1</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>3</td>
                            <td>1</td>
                            <td>1</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>9:18-10:22</td>
                            <td>2</td>
                            <td>4</td>
                            <td>3</td>
                            <td>2</td>
                            <td>4</td>
                            <td>2</td>
                            <td>4</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>10:26-11:30</td>
                            <td>3</td>
                            <td>5</td>
                            <td>4</td>
                            <td>5</td>
                            <td>5</td>
                            <td>3</td>
                            <td>5</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>11:30-12:13</td>
                            <td><i class="fas fa-utensils"></i></td>
                            <td><i class="fas fa-utensils"></i></td>
                            <td><i class="fas fa-utensils"></i></td>
                            <td><i class="fas fa-utensils"></i></td>
                            <td><i class="fas fa-utensils"></i></td>
                            <td><i class="fas fa-utensils"></i></td>
                            <td><i class="fas fa-utensils"></i></td>
                            <td><i class="fas fa-utensils"></i></td>
                        </tr>
                        <tr>
                            <td>12:13-1:17</td>
                            <td>6</td>
                            <td>6</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>6</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>1:21-2:25</td>
                            <td>7</td>
                            <td>8</td>
                            <td>7</td>
                            <td>8</td>
                            <td>8</td>
                            <td>7</td>
                            <td>8</td>
                            <td>8</td>
                        </tr>
                    </table>
                    <div id="scheduleNotice" class="small">*OH - Office Hours</div>

                </div>
            </div>

            <!--Calculator-->
            <div class="swiper-slide">
                <div class="card large" id="calculatorSelector">
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
                <div id="finalGrade" class="hide card medium">
                    <div class="finalGradeRow">
                        <div>Q1</div>
                        <div>Q2</div>
                        <div>Q3</div>
                        <div>Q4</div>
                        <div>F</div>
                    </div>
                    <div class="finalGradeRow">
                        <select class="finalGradeSelect">
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
                        <select class="finalGradeSelect">
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
                        <select class="finalGradeSelect">
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
                        <select class="finalGradeSelect">
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
                        <select class="finalGradeSelect">
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
                    <div id="finalGradeButton">
                        <i class="fas fa-calculator fa-2x"></i>
                    </div>
                    <div id="finalGradeNotice" class="small">
                        <span>*Enter all grades that apply, anything else leave blank.</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Footer + Nav-->
    <footer id="footer">
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
    </footer>

    <!--End Scripts-->
    <script src="/js/app.js?<?php echo time(); ?>"></script>
    <script src="/js/app-home.js?<?php echo time(); ?>"></script>
    <script src="/js/app-calculator.js?<?php echo time(); ?>"></script>
</body>

</html>
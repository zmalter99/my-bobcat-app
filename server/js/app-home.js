// global time variable 
let currentTime = getSeconds();

// get the exact amount of seconds relative to 00:00
function getSeconds() {
    let exactDate = new Date();
    return (exactDate.getHours() * 3600) + (exactDate.getMinutes() * 60) + exactDate.getSeconds();
}

//-----------------------------------------------------------------------------------------------//

//any in given day there at the following time slots
const schedule = [{
        prefix: "Period",
        start: "08:10",
        end: "09:14",
        periodIndex: 0
    },
    {
        prefix: "Period",
        start: "09:18",
        end: "10:22",
        periodIndex: 1
    },
    {
        prefix: "Period",
        start: "10:26",
        end: "11:30",
        periodIndex: 2
    },
    {
        prefix: "Lunch",
        start: "11:30",
        end: "12:13",
    },
    {
        prefix: "Period",
        start: "12:13",
        end: "13:17",
        periodIndex: 3
    },
    {
        prefix: "Period",
        start: "13:17",
        end: "14:25",
        periodIndex: 4
    }
];

// each key in this object is dependent on the day
// for instance day 1 has periods 1,2,3,6,7
const periods = {
    1: [1, 2, 3, 6, 7],
    2: [1, 4, 5, 6, 8],
    3: [2, 3, 4, 5, 7],
    4: [1, 2, 5, 6, 8],
    5: [3, 4, 5, 7, 8],
    6: [1, 2, 3, 6, 7],
    7: [1, 4, 5, 6, 8],
    8: [2, 3, 4, 7, 8]
};

// convert every time in each time period
schedule.forEach(function (period) {
    period.start = convertTime(period.start);
    period.end = convertTime(period.end);
});

// convert military time to seconds from 00:00
function convertTime(timeString) {
    let timeArray = timeString.split(":");
    return (timeArray[0] * 3600) + (timeArray[1] * 60);
}

//-----------------------------------------------------------------------------------------------//

// return a message with the time remaing while given a time in seconds
function getTimeRemaining(timeIn) {
    let remainingTime = timeIn - currentTime;
    let min = Math.floor(remainingTime / 60);
    let sec = Math.floor(remainingTime % 60);
    return `<b>${min}</b> ${(min == 1) ? "minute" : "minutes"} and <b>${sec}</b> ${(sec == 1) ? "second" : "seconds"}`;
}

//check prefix we are wihtin school day
function updateClock() {
    // update exact time
    currentTime = getSeconds();

    //before office hours
    if (currentTime < convertTime("07:45")) {
        document.querySelector("#dayClock").innerHTML = "School hasn't started yet";
        return;
    }

    //first check if before office hours ends
    if (currentTime < convertTime("08:10")) {
        document.querySelector("#dayClock").innerHTML = `${getTimeRemaining(convertTime("08:10"))} remaining in office hours.`;
        return;
    }

    //check after school
    if (currentTime > convertTime("14:25")) {
        document.querySelector("#dayClock").innerHTML = "School has finished";
        return;
    }

    //check during school with for loop
    for (let i = 0; i < schedule.length; i++) {

        //check if within a period
        if (currentTime > schedule[i].start && currentTime < schedule[i].end) {
            // check if prefix equals Period
            if (schedule[i].prefix == "Period") {
                document.querySelector("#dayClock").innerHTML = `${getTimeRemaining(schedule[i].end)} remaining in Period <b>${periods[day][schedule[i].periodIndex]}</b>`;
            }
            // otherwise it's Lunch
            else {
                document.querySelector("#dayClock").innerHTML = `${getTimeRemaining(schedule[i].end)} remaining in <b>Lunch</b>`;
            }
            break;
        }

        //check if betweeen two periods
        if (currentTime > schedule[i].end && currentTime < schedule[i + 1].start) {
            // check if prefix equals Period
            if (schedule[i].prefix == "Period") {
                document.querySelector("#dayClock").innerHTML = `${getTimeRemaining(schedule[i+1].start)} until Period <b>${periods[day][schedule[i+1].periodIndex]}</b>`;
            }
            // note since period 3 and lunch both end and start at 11:30 there will never be an instance where an else is required
            break;
        }

    }

}


//-----------------------------------------------------------------------------------------------//

//Drop Day which also starts initalization
let day;
const randomNumber = new Date().getTime();
fetch(`/php/data/day.txt?${randomNumber}`)
    .then(function (data) {
        return data.text();
    }).then(function (data) {
        day = data;

        //if special alert
        if (day == 0) {
            document.querySelector("#dayLabel").innerHTML = `🚨<b>Special Alert</b>🚨`;
            fetch(`/php/data/info.txt?${randomNumber}`)
                .then(function (data) {
                    return data.text();
                }).then(function (data) {
                    document.querySelector("#dayClock").innerHTML = data;
                });
            return;
        }

        // if its a weekend
        if (new Date().getDay() == 6 || new Date().getDay() == 0) {
            document.querySelector("#dayLabel").innerHTML = `Next Day Is: <b>${day}</b>`;
            document.querySelector("#dayClock").innerHTML = "No School Today";
            return;
        }

        // is current time is pass 2:25PM school is over
        if (currentTime > convertTime("14:25")) {
            document.querySelector("#dayLabel").innerHTML = `Tomorrow Is Day: <b>${day}</b>`;
            document.querySelector("#dayClock").innerHTML = "School has finished";
            return;
        }

        // otherwise we update the clock every second
        document.querySelector("#dayLabel").innerHTML = `Today Is Day: <b>${day}</b>`;
        setInterval(function () {
            updateClock();
        }, 1000);

    });


//annocunements fetch request
fetch(`/php/data/announcements.txt?${randomNumber}`)
    .then(function (data) {
        return data.text();
    }).then(function (data) {
        document.querySelector("#announcements").innerHTML = data;
    });

//bobcat tv fetch request
fetch(`/php/data/ad.txt?${randomNumber}`)
    .then(function (data) {
        return data.text();
    })
    .then(function (data) {
        if (data != "1") {
            let rawURL = "https://www.youtube.com/watch?v=WKsPez_EuZg".split("?v=")[1];
            document.querySelector("#announcements").insertAdjacentHTML("afterend", `
                <img src="/php/data/ad.png?${randomNumber}" id="bobcatTV">
                <div id="bobcatTVFrame">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/${rawURL}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>        
            `);
            document.querySelector("#bobcatTV").addEventListener("click", function () {
                if (document.querySelector("#bobcatTVFrame").classList.contains("active")) {
                    document.querySelector("#bobcatTVFrame").classList.remove("active");
                } else {
                    document.querySelector("#bobcatTVFrame").classList.add("active");
                }
            });
        }
    });
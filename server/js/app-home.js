//Global time variable 
const date = new Date();
let currentTime = getCurrentDate();

function getCurrentDate() {
    let exactDate = new Date();
    return (exactDate.getHours() * 3600) + (exactDate.getMinutes() * 60) + exactDate.getSeconds();
}

//-----------------------------------------------------------------------------------------------//

//all my arrays of time
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

// each key in this object is dependent on the dropday
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

// convert military time to seconds from 
schedule.forEach(function (period) {
    period.start = convertTime(period.start);
    period.end = convertTime(period.end);
});

function convertTime(timeString) {
    let timeArray = timeString.split(":");
    return (timeArray[0] * 3600) + (timeArray[1] * 60);
}

//-----------------------------------------------------------------------------------------------//

function getTimeRemaining(timeIn) {
    let remainingTime = timeIn - currentTime;
    return `${Math.floor(remainingTime / 60)} minute(s) and ${remainingTime % 60} second(s)`;
}

//check prefix we are wihtin school day
function updateClock() {
    // update exact time
    currentTime = getCurrentDate();

    //before office hours
    if (currentTime < convertTime("07:45")) {
        document.querySelector("#Clock").innerHTML = "School hasn't started yet";
        return;
    }

    //first check if before office hours ends
    if (currentTime < convertTime("08:10")) {
        document.querySelector("#Clock").innerHTML = `${getTimeRemaining(convertTime("08:10"))} remaining in office hours.`;
        return;
    }

    //check after school
    if (currentTime > convertTime("14:25")) {
        document.querySelector("#Clock").innerHTML = "School has finished";
        return;
    }

    //check during school with for loop
    for (let i = 0; i < schedule.length; i++) {

        //check if within a period
        if (currentTime > schedule[i].start && currentTime < schedule[i].end) {
            // check if prefix equals Period
            if (schedule[i].prefix == "Period") {
                document.querySelector("#Clock").textContent = `${getTimeRemaining(schedule[i].end)} remaining in Period ${periods[DropDay][schedule[i].periodIndex]}`;
            }
            // otherwise it's Lunch
            else {
                document.querySelector("#Clock").textContent = `${getTimeRemaining(schedule[i].end)} remaining in Lunch`;
            }
            break;
        }

        //check if betweeen two periods
        if (currentTime > schedule[i].end && currentTime < schedule[i + 1].start) {
            // check if prefix equals Period
            if (schedule[i].prefix == "Period") {
                document.querySelector("#Clock").textContent = `${getTimeRemaining(schedule[i+1].start)} until Period ${periods[DropDay][schedule[i+1].periodIndex]}`;
            }
            // note since period 3 and lunch both end and start at 11:30 there will never be an instance where an else is required
            break;
        }

    }

}


//-----------------------------------------------------------------------------------------------//

//Drop Day which also starts initalization
let DropDay;
const randomNumber = new Date().getTime();
fetch(`/php/data/dropday.txt?${randomNumber}`)
    .then(function (data) {
        return data.text();
    }).then(function (data) {

        DropDay = data;

        //if special alert
        if (DropDay == 0) {
            document.querySelector("#DropDayLabel").innerHTML = "🚨<strong>Special Alert</strong>🚨";
            fetch(`/php/data/info.txt?${randomNumber}`)
                .then(function (data) {
                    return data.text();
                }).then(function (data) {
                    document.querySelector("#Clock").innerHTML = data;
                });

            return;
        }

        //if its a weekend
        if (date.getDay() == 6 || date.getDay() == 0) {
            document.querySelector("#DropDayLabel").innerHTML = "The Next Drop Is: " + "<strong>" + DropDay + "</strong>";
            document.querySelector("#Clock").innerHTML = "No School Today";

            return;
        }

        // otherwise just run normally with 1000 interval delay for loading animation

        // school is over and updated through php
        if (currentTime > convertTime("14:25")) {
            document.querySelector("#DropDayLabel").innerHTML = "The Next Drop Is: " + "<strong>" + DropDay + "</strong>";
        } else {
            document.querySelector("#DropDayLabel").innerHTML = "Today Is Drop: " + "<strong>" + DropDay + "</strong>";
        }

        // update clock
        setInterval(function () {
            updateClock();
        }, 1000);

    });


//annocunements fetch request
fetch(`/php/data/announcements.txt?${randomNumber}`)
    .then(function (data) {
        return data.text();
    }).then(function (data) {
        document.querySelector("#AnnouncementsContainer").innerHTML = data;
    });

//bobcat tv fetch request
fetch(`/php/data/ad.txt?${randomNumber}`)
    .then(function (data) {
        return data.text();
    })
    .then(function (data) {
        if (data != "1") {
            let rawURL = "https://www.youtube.com/watch?v=WKsPez_EuZg".split("?v=")[1];
            document.querySelector("#AnnouncementsContainer").insertAdjacentHTML("afterend", `
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
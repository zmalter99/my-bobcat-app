//Global time variable 
let currentTime, dateObj;

(function getTime() {
    dateObj = new Date();
    Day = dateObj.getDay();
    currentTime = (dateObj.getHours() * 3600) + (dateObj.getMinutes() * 60) + dateObj.getSeconds();
    setTimeout(getTime, 1000);
})();

//-----------------------------------------------------------------------------------------------//

//all my arrays of time
const RegDayA = [
    ["Period", "0745", "0834", 1],
    ["Period", "0838", "0930", 2],
    ["Period", "0934", "1023", 3],
    ["Period", "1027", "1116", 4],
    ["Lunch", "1120", "1146", "A"],
    ["Period", "1149", "1238", 5],
    ["Period", "1242", "1331", 6],
    ["Period", "1335", "1425", 7]
];

const RegDayB = [
    ["Period", "0745", "0834", 1],
    ["Period", "0838", "0930", 2],
    ["Period", "0934", "1023", 3],
    ["Period", "1027", "1116", 4],
    ["Period", "1120", "1209", 5],
    ["Lunch", "1212", "1238", "B"],
    ["Period", "1242", "1331", 6],
    ["Period", "1335", "1425", 7]
];

const ADayA = [
    ["Period", "0745", "0829", 1],
    ["Period", "0832", "0918", 2],
    ["Period", "0921", "1005", 3],
    ["Period", "1008", "1052", 4],
    ["Period", "1055", "1139", 5],
    ["Lunch", "1139", "1204", "A"],
    ["Period", "1207", "1251", 6],
    ["Period", "1254", "1338", 7],
    ["Period", "1341", "1425", 8]
];

const ADayB = [
    ["Period", "0745", "0829", 1],
    ["Period", "0832", "0918", 2],
    ["Period", "0921", "1005", 3],
    ["Period", "1008", "1052", 4],
    ["Period", "1055", "1139", 5],
    ["Period", "1142", "1226", 6],
    ["Lunch", "1226", "1251", "B"],
    ["Period", "1254", "1338", 7],
    ["Period", "1341", "1425", 8]
];

function convert(array) {
    //convert all numbers to seconds from military format
    for (let i = 0; i < array.length; i++) {
        //simply isolate each number into hours and minutees and convert them into seconds
        //console.log(array[i][1].substring(0, 2) * 3600);
        array[i][1] = (array[i][1]).substring(0, 2) * 3600 + (array[i][1]).substring(2, 4) * 60;
        array[i][2] = (array[i][2]).substring(0, 2) * 3600 + (array[i][2]).substring(2, 4) * 60;
    }
}

convert(ADayA);
convert(ADayB);
convert(RegDayA);
convert(RegDayB);

//-----------------------------------------------------------------------------------------------//

//check prefix we are wihtin school day
function updateClock(array) {

    //before 6:45AM
    if (currentTime < 24300) {
        document.querySelector("#Clock").innerHTML = "School Hasnt Started Yet";
        return;
    }

    //first check if before school && after 645
    if (currentTime > 24300 && currentTime < 27900) {
        let temp = 27900 - currentTime;
        document.querySelector("#Clock").innerHTML = "School starts in " + Math.floor(temp / 60) + " minute(s) and " + temp % 60 + " second(s)";
        return;
    }

    //check after school
    if (currentTime > 51900) {
        document.querySelector("#Clock").innerHTML = "School Has Finished";
        return;
    }

    //cehck durigng school with forloop
    for (let i = 0; i < array.length; i++) {
        let timeLeft = false;
        let msgType;
        //check if within period
        if (currentTime > array[i][1] && currentTime < array[i][2]) {
            timeLeft = array[i][2] - currentTime;
            msgType = "remaining in";

        }
        //check if betweeen two periods
        if (currentTime > array[i][2] && currentTime < array[i + 1][1]) {
            timeLeft = array[i + 1][1] - currentTime;
            msgType = "until";
        }
        if (timeLeft) {
            let prefix = array[i][0];
            let period = array[i][3];
            //only increase dorp day if the real dropday is equal periods or greater and not A OR B lunch
            if (period > 0 && period < 9 && period >= DropDay) {
                period++;
            }
            document.querySelector("#Clock").textContent = `${Math.floor(timeLeft / 60)} minute(s) and ${timeLeft % 60} second(s) ${msgType} ${prefix} ${period}`;
            break;
        }
    }

}

//-----------------------------------------------------------------------------------------------//

let lunch;
//check if there is already a stored lunch
if (localStorage.lunch) {
    lunch = localStorage.lunch;
    if (lunch == "A") {
        document.querySelector("#ALunch").checked = true;
    } else {
        document.querySelector("#BLunch").checked = true;
    }
} else {
    document.querySelector("#ALunch").checked = true;
    lunch = "A";
    localStorage.lunch = "A";
}

document.querySelectorAll("[name='Lunch']").forEach(function (element) {
    element.addEventListener("change", function () {
        if (document.querySelector("#ALunch").checked) {
            lunch = "A";
            localStorage.lunch = "A";
        } else {
            lunch = "B";
            localStorage.lunch = "B";
        }
    });
});

//-----------------------------------------------------------------------------------------------//

//Drop Day which also starts initalization
let DropDay;
const randomNumber = new Date().getTime();
fetch(`/php/data/dropday.txt?${randomNumber}`)
    .then(function (data) {
        return data.text();
    }).then(function (data) {

        const DropDay = data;

        //if special alert
        if (DropDay == 0) {
            document.querySelector("#DropDayLabel").innerHTML = "🚨<strong>Special Alert</strong>🚨";
            fetch(`/php/data/info.txt?${randomNumber}`)
                .then(function (data) {
                    return data.text();
                }).then(function (data) {
                    document.querySelector("#Clock").innerHTML = data;
                });

            //if its a weekend
        } else if (dateObj.getDay() == 6 || dateObj.getDay() == 0) {

            //check if a day
            if (DropDay == 9) {
                document.querySelector("#DropDayLabel").innerHTML = "The Next Drop Is: " + "<strong>" + "A" + "</strong>";
            } else {
                document.querySelector("#DropDayLabel").innerHTML = "The Next Drop Is: " + "<strong>" + DropDay + "</strong>";
            }
            document.querySelector("#Clock").innerHTML = "No School Today";

        } else {
            //else just run normally with 1000 interval delay for loading animation

            //DropDay Laberl Setter
            //school is over and updated through php
            if (currentTime > 51900) {
                if (DropDay == 9) {
                    document.querySelector("#DropDayLabel").innerHTML = "The Next Drop Is: " + "<strong>" + "A" + "</strong>";
                } else {
                    document.querySelector("#DropDayLabel").innerHTML = "The Next Drop Is: " + "<strong>" + DropDay + "</strong>";
                }
            } else {
                if (DropDay == 9) {
                    document.querySelector("#DropDayLabel").innerHTML = "Today Is Drop: " + "<strong>" + "A" + "</strong>";
                } else {
                    document.querySelector("#DropDayLabel").innerHTML = "Today Is Drop: " + "<strong>" + DropDay + "</strong>";
                }
            }

            //determine what array to pass to getClock && and we can say < 9 becease we alreayd checks for 0 above
            (function clockInterval() {
                if (DropDay < 9 && lunch == "A") {
                    updateClock(RegDayA);
                } else if (DropDay < 9 && lunch == "B") {
                    updateClock(RegDayB);
                } else if (DropDay == 9 && lunch == "A") {
                    updateClock(ADayA);
                } else if (DropDay == 9 && lunch == "B") {
                    updateClock(ADayB)
                }
                setTimeout(clockInterval, 1000);
            })();
        }

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
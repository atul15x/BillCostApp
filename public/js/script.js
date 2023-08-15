document.addEventListener("DOMContentLoaded", function () {
    updateDay();
    updateFullDate();
});

function updateDay() {
    var daysOfWeek = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
    ];
    var currentTime = new Date();
    var dayName = daysOfWeek[currentTime.getDay()];

    document.getElementById("current-day").innerText = dayName;
}

function updateFullDate() {
    var currentTime = new Date();
    var day = currentTime.getDate();
    var month = currentTime.getMonth() + 1; // Month is 0-indexed, so add 1
    var year = currentTime.getFullYear();

    // Format day, month, and year to have leading zeros if necessary
    day = (day < 10 ? "0" : "") + day;
    month = (month < 10 ? "0" : "") + month;

    var formattedDate = day + "/" + month + "/" + year;
    document.getElementById("current-fullday").innerText = formattedDate;
}

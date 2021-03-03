const today = new Date();
let currentYear = today.getFullYear();
let currentMonth = today.getMonth();
const baseURL = window.location.origin;

const months = [
  "Januari",
  "Februari",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "Juli",
  "Agustus",
  "September",
  "Oktober",
  "November",
  "Desember",
];

showCalendar(currentYear, currentMonth);

function showCalendar(year, month) {
  // Variable declaration
  const firstDay = new Date(year, month).getDay() - 1;
  const days = new Date(year, month, 0).getDate();
  const calendarBody = $(".body-calendar");
  // This will be written on table cell as date (1 - 28/29/30/31)
  let date = 1;

  // Clear content on calendar body first so it won't be doubled
  calendarBody.html("");

  // Rename Month and Year
  $(".month").html(`${months[month]} ${year}`);

  // initiate array
  let dataDate = [];
  let dataMonth = [];
  let dataYear = [];
  let dataID = [];
  // Request data
  $.ajax({
    type: "get",
    url: baseURL + "/ruang/dataruang",
    dataType: "json",
    success: function (response) {
      $.each(response, function (i, val) {
        // Format each start time event from response
        let format = moment(response[i].start_time).format("Y-M-D");
        let formatDate = new Date(format).getDate();
        let formatMonth = new Date(format).getMonth();
        let formatYear = new Date(format).getFullYear();

        // Push formatted data into array
        dataDate.push(formatDate);
        dataMonth.push(formatMonth);
        dataYear.push(formatYear);
        dataID.push(response[i].id);
      });
      // Do looping for making an element
      for (let i = 0; i < 6; i++) {
        // Create row element
        let row = document.createElement("tr");

        // Create cell element
        for (let j = 0; j < 7; j++) {
          // Day name on header was started with monday
          // Conditioning the first date by day
          if (i === 0 && j < firstDay) {
            let cell = document.createElement("td");
            let text = document.createTextNode("");
            cell.classList.add("border");
            cell.append(text);
            row.append(cell);

            // Break loop if date on moth reached
          } else if (date > days) {
            break;

            // Create cell element with data
          } else {
            let cell = document.createElement("td");
            let text = document.createTextNode(date);
            cell.classList.add("border");
            cell.append(text);
            row.append(cell);

            // This where i give sign to calendar when date has event
            for (let k = 0; k < response.length; k++) {
              if (
                date === dataDate[k] &&
                year === dataYear[k] &&
                month === dataMonth[k] &&
                response[k].status === "SETUJU"
              ) {
                $(function () {
                  cell.id = "dataLink";
                  cell.classList.add("bg-warning");
                  cell.setAttribute("dataID", dataID[k]);
                });
              }
            }

            // If cell date was today give background color blue
            if (
              date === today.getDate() &&
              year === today.getFullYear() &&
              month === today.getMonth()
            ) {
              cell.classList.add("bg-primary");
            }

            date++;
          }
        }

        // Append row into calendar body
        calendarBody.append(row);
      }
    },
    error: function (error) {
      console.log(error);
    },
  });

  setTimeout(() => {
    const dataLink = document.querySelectorAll("#dataLink");
    dataLink.forEach((element) => {
      element.setAttribute("role", "button");

      element.addEventListener("click", () => {
        $.ajax({
          type: "get",
          url: baseURL + "/ruang/dataRuang",
          data: { id: element.getAttribute("dataid") },
          dataType: "json",
          success: function (response) {
            console.log(response);
            $(".modal-body").css("font-size", "0.89em");
            $(".modal-body").html("");
            $(".modal-body").append(
              `<div class="row">
                <div class="col">
                  <span>Nama Peminjam</span>
                </div>
                <div class="col">
                  <span>${response.loaner_name}</span>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <span>Unit Kerja</span>
                </div>
                <div class="col">
                  <span>${response.division}</span>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <span>Nama Kegiatan</span>
                </div>
                <div class="col">
                  <span>${response.activity_name}</span>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <span>Tanggal</span>
                </div>  
                <div class="col">
                  <div class="row">
                    <span>${response.start_time} s/d</span>
                  </div>
                  <div class="row">
                    <span>${response.end_time}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <span>Ruang</span>
                </div>
                <div class="col">
                  <span>${response.room}</span>
                </div>
              </div>`
            );
          },
          error: function (error) {
            console.log("Response Error");
            console.log(element.getAttribute("dataid"));
          },
        });
        $("#detailModal").modal("show");
      });
    });

    $(dataLink).on("click");
  }, 1000);
}

// Go back to the previous month by click "<" button
$("#beforeMonth").on("click", function () {
  currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
  currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
  showCalendar(currentYear, currentMonth);
});

// Advance to the next month by click ">" button
$("#nextMonth").on("click", function () {
  currentYear = currentMonth === 11 ? currentYear + 1 : currentYear;
  currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
  showCalendar(currentYear, currentMonth);
});

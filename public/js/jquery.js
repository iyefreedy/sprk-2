// const { data } = require("jquery");

// Create calendar table
const today = new Date();
let currentYear = today.getFullYear();
let currentMonth = today.getMonth();

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

// Showing calendar table
showCalendar(currentYear, currentMonth);

// Show calendar function
function showCalendar(year, month) {
  const firstDay = new Date(year, month).getDay() - 1;
  const days = new Date(year, month, 0).getDate();
  const calendarBody = $(".body-calendar");

  // Clear all element on calendar body
  calendarBody.html("");

  // Get month header and write with current month and year
  $(".month").html(`${months[month]} ${year}`);

  // This will be written on table cell as date (1 - 28/29/30/31)
  let date = 1;

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

// This button is on edit profile page
// If you click button element it will trigger input file
$("#chooseFile").on("click", function () {
  $("#inputFile").trigger("click");
});

// This function is for previewing image that user change
$("#inputFile").on("change", function () {
  const image = $("#image");
  const fileReader = new FileReader();

  fileReader.readAsDataURL(this.files[0]);

  fileReader.onload = (e) => {
    image.attr("src", e.target.result);
  };
});

// Date time picker for form input
$("#startTime").datetimepicker({ format: "Y-m-d H:i" });
$("#endTime").datetimepicker({ format: "Y-m-d H:i" });

// This line for change color of active link in topbar
const roomLink = document.querySelectorAll("#room-link");

roomLink.forEach((i) => {
  if (i.getAttribute("href") == window.location.href) {
    i.classList.remove("text-white");
    i.classList.add("text-warning");
  }
});

// Modal

const labelModal = [
  "Nama Peminjam",
  "Divisi",
  "No. Telepon",
  "Nama Kegiatan",
  "Jenis Kegiatan",
  "Pihak",
  "Waktu Kegiatan",
  "Jumlah Undangan",
  "Ruang",
  "Proposal",
];

// Get element for modal
const modalBody = $(".container-fluid");

// Get all element button for every data that showed
const dataID = document.querySelectorAll("#btn-data");

// Add event listener for each button
dataID.forEach((i) => {
  i.addEventListener("click", function () {
    // Calling data
    $.ajax({
      type: "get",
      url: window.location.href,
      data: { id: i.value },
      dataType: "json",
      success: function (response) {
        console.log(response);

        // Clear modal body first before write data so it won't be doubled
        modalBody.html("");

        // This variable will be the index for labelModal array
        let i = 0;

        // Rewrite response object that need to be shown on modal
        let data = {
          loaner_name: response.loaner_name,
          division: response.division,
          phone: response.phone,
          activity_name: response.activity_name,
          activity_type: response.activity_type,
          involved_party: response.involved_party,
          activity_time: `${response.start_time} s/d ${response.end_time}`,
          invitation_number: response.invitation_number,
          room: response.room,
          proposal:
            response.proposal != null
              ? response.proposal
              : "Tidak ada proposal",
        };

        // Loop rewrited response and create element
        Object.values(data).forEach((val) => {
          modalBody.append(
            `<div class="row">
                <label for="" class="form-label col-lg-3">${labelModal[i]}</label>
                <div class="col-lg-9">
                  <b>${val}</b>
                </div>
              </div>`
          );
          i++;
        });
        $("#myModal").modal("show");
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
});

// Tester

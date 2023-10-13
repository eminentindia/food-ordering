//for datatable

// function initializeDynamicDataTable(
//   tableId,
//   dataUrl,
//   fixedColumnsLeft,
//   fixedColumnsRight,
//   rowCreationFunction
// ) {
// $(`#${tableId}`)
//     .DataTable({
//       dom:
//         "<'row '<'col-sm-12 col-md-6 tableexport'Q><'col-sm-12 col-md-6 tableexport'fB>>" +
//         "<'row'<'col-sm-12'tr>>" +
//         "<'row'<'col-sm-12 col-md-5 tableexport'li><'col-sm-12 col-md-7'p>>",
//       language: {
//         sSearch: "",
//         searchPlaceholder: "Search here...",
//         searchBuilder: {
//           add: "ADVANCE FILTER OPTION",
//           condition: "Comparator",
//           clearAll: "Reset",
//           delete: "Delete",
//           deleteTitle: "Delete Title",
//           data: "Column",
//           left: "Left",
//           leftTitle: "Left Title",
//           logicAnd: "A N D",
//           logicOr: "O R",
//           right: "Right",
//           rightTitle: "Right Title",
//           title: {
//             0: "",
//             _: "Adavance Filter (%d)",
//           },
//           value: "Option",
//           valueJoiner: "et",
//         },
//       },
//       sAjaxSource: dataUrl,
//       lengthChange: true,
//       paging: true,
//       autoWidth: false,
//       searching: true,
//       fixedColumns: true,
//       processing: true,
//       scrollX: true,
//       colReorder: true,
//       fixedColumns: {
//         left: fixedColumnsLeft,
//         right: fixedColumnsRight,
//       },
//       buttons: [
//         {
//           extend: "collection",
//           text: "Export Data",
//           buttons: ["copy", "excel", "csv", "print"],
//         },
//       ],
//       fnCreatedRow: function (nRow, aData, iDataIndex) {
//         if (typeof rowCreationFunction === "function") {
//           rowCreationFunction(nRow, aData, iDataIndex);
//         }
//       },
//     })
//     .buttons()
//     .container();
//   $(`#${tableId}_filter input`).addClass(
//     "form-control form-control-sm form-control-solid w-100"
//   );
// }


function validation_msg(text, icon, timer, Bar) {
  const Toast = Swal.mixin({
    toast: true,
    position: "center",
    showConfirmButton: true,
    timer: "" + timer + "",
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
  });

  Toast.fire({
    icon: "" + icon + "",
    title: "" + text + ""
  });
}

let table; // Declare a let variable to hold the DataTable instance

function initializeDynamicDataTable(tableId, dataUrl, fixedColumnsLeft, fixedColumnsRight, rowCreationFunction) {
  table = $(`#${tableId}`).DataTable({
    dom: "<'row '<'col-sm-12 col-md-6 tableexport'Q><'col-sm-12 col-md-6 tableexport'fB>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5 tableexport'li><'col-sm-12 col-md-7'p>>",
    language: {
      sSearch: "",
      searchPlaceholder: "Search here...",
      // Your language options here
    },
    ajax: dataUrl,
    lengthChange: true,
    paging: true,
    autoWidth: false,
    searching: true,
    processing: true,
    scrollX: true,
    colReorder: true,
    fixedColumns: {
      left: fixedColumnsLeft,
      right: fixedColumnsRight,
    },
    buttons: [
      {
        extend: "collection",
        text: "Export Data",
        buttons: ["copy", "excel", "csv", "print"],
      },
    ],
    createdRow: function (row, data, dataIndex) {
      if (typeof rowCreationFunction === "function") {
        rowCreationFunction(row, data, dataIndex);
      }
    },
  });

  // Customize the filter input
  $(`#${tableId}_filter input`).addClass("form-control form-control-sm form-control-solid w-100");
}


// check network connection functionality
function checkInternetConnectivity() {
  if (navigator.onLine) {
    $(".wrapperoffline").fadeOut();
    $(".offlineoverlay").fadeOut();
  } else {
    $(".wrapperoffline").fadeIn();
    $(".offlineoverlay").fadeIn();
    window.stop();
    document.close();
  }
}
// Check connectivity on page load
checkInternetConnectivity();
// Check connectivity when the online/offline status changes
window.addEventListener("online", checkInternetConnectivity);
window.addEventListener("offline", checkInternetConnectivity);
// Add event listener for ajaxSend
$(document).on("ajaxSend", function (event, jqXHR, ajaxOptions) {
  if (!navigator.onLine) {
    jqXHR.abort();
    window.stop();
    document.close();
  }
});

//custom popup
function showPopup(status, text) {
  var popup = document.querySelector(".popup");
  popup.classList.add("animated-popup" + status + "");
  popup.style.display = "block";
  popup.innerHTML = text;
  setTimeout(function () {
    $(".popup").fadeOut();
    popup.classList.remove("animated-popup" + status + "");
  }, 3000);
  setTimeout(function () {
    popup.classList.remove("animated-popup" + status + "");
  }, 4000);
}
// copy function
function copyValue(event) {
  const inputElement = event.target.previousElementSibling;
  inputElement.select();
  inputElement.setSelectionRange(0, 99999); // For mobile devices

  document.execCommand("copy");

  event.target.textContent = "Copied";

  // Reset the button text after a short delay (e.g., 2 seconds)
  setTimeout(() => {
    event.target.textContent = "Copy";
  }, 2000);

  // Clear the selection (avoids displaying selected text after copying)
  window.getSelection().removeAllRanges();
}

function showDeleteConfirmation(confirmFunction) {
  Swal.fire({
    title: "Confirm Delete",
    text: "Are you sure you want to delete?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
    confirmButtonColor: "#dc3545",
  }).then((result) => {
    if (result.isConfirmed) {
      confirmFunction(); // Call the passed function if confirmed
    }
  });
}



function showConfirmation(confirmFunction) {
  Swal.fire({
    title: "Confirm ",
    text: "Are you sure you want to change?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "YES",
    cancelButtonText: "NO",
    confirmButtonColor: "#dc3545",
  }).then((result) => {
    if (result.isConfirmed) {
      confirmFunction(); // Call the passed function if confirmed
    }
  });
}


function encryptpost(value) {
  return btoa(btoa(value));
}

const currentURL = window.location.href;
const links = document.querySelectorAll(".menu-link");
for (let i = 0; i < links.length; i++) {
  const linkURL = links[i].getAttribute("href");
  if (currentURL.indexOf(linkURL) !== -1) {
    // Add 'active' class to the link
    links[i].classList.add("active");
    const parentMenuSub = links[i].closest(".menu-sub");
    if (currentURL.includes("settings.php")) {
      //condition used only for better UI
    } else {
      if (parentMenuSub && !parentMenuSub.classList.contains("show")) {
        parentMenuSub.classList.add("show");
      }
    }
    
  }
}

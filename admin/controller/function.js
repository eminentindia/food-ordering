function delete_msg(text, icon, timer) {
  const Toast = Swal.mixin({
    toast: true,
    position: "center",
    showConfirmButton: true,
    timer: "" + timer + "",
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const b = Swal.getHtmlContainer().querySelector("b");
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft();
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
    }
  });
  Toast.fire({
    icon: "" + icon + "",
    title: "" + text + ""
  });
}

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

function rolecheck() {
  const Toast = Swal.mixin({
    toast: true,
    position: "center",
    showConfirmButton: true,
    confirmButtonColor: '#eab73d',
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
  });

  Toast.fire({
    icon: "warning",
    title: "Your ID is for testing purpose only !"
  });
}

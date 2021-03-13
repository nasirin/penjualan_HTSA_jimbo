const alert = $('.alert').data('alert');

if (alert) {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: alert
  })
}


// tombol hapus
$('.tombol-hapus').on('click', function (e){
    e.preventDefault();
    const href = $(this).attr('href');
    swal.fire({
        title: 'Apakah anda yakin?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {
        //   swal.fire(
        //     'Terhapus!',
        //     'Data berhasil dihapus',
        //     'success'
        //   )
          document.location.href = href;
        }
      })
});

// tombol keluar
$('.tombol-keluar').on('click', function (e){
  e.preventDefault();
  const href = $(this).attr('href');
  swal.fire({
      title: 'Exit',
      text: "Are you sure?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Logout'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
});
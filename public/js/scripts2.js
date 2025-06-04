// Misalnya, menambahkan fungsi konfirmasi penghapusan
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (event) {
        if (!confirm("Apakah Anda yakin ingin menghapus data sapi ini?")) {
            event.preventDefault();
        }
    });
});


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset ('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset ('sbadmin2/js/sb-admin-2.min.js') }}"></script>
    
    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('sbadmin2/js/demo/datatables-demo.js') }}"></script>


    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                showClass: {
                    popup: 'swal2-show swal2-slide-in-right'
                },
                hideClass: {
                    popup: 'swal2-hide swal2-slide-out-right'
                }
            })
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                showClass: {
                    popup: 'swal2-show swal2-slide-in-right'
                },
                hideClass: {
                    popup: 'swal2-hide swal2-slide-out-right'
                }
            })
        @endif
    </script>
</body>



</html>
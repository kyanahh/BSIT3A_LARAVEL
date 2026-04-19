<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

@include('navbar')

@if(session('success'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div class="toast bg-success text-white">
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

@if(session('error'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div class="toast bg-danger text-white">
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
</div>
@endif

    <div class="container mt-4">
        @yield('content')
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toastElList = document.querySelectorAll('.toast');

    toastElList.forEach(function(toastEl) {
        const toast = new bootstrap.Toast(toastEl, {
            delay: 3000 // 3 seconds
        });
        toast.show();
    });
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
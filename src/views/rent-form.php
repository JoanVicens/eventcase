<?php

$moviesId = $_GET['moviesId'];

require_once 'head.php';
?>

<main class="container pt-4">
    <h1>Complet your information</h1>

    <form action="/rent" method='post' class="row g-3 needs-validation mt-2" novalidate>

        <?php
        foreach ($moviesId as $id) {
            echo '<input type="hidden" name="moviesId[]" value=' . $id . '>';
        }
        ?>
        <div class="col-md-4">
            <label for="nameInput" class="mb-2">Name <small class="text-danger">*</small></label>
            <input id="nameInput" type="text" class="form-control" name="name" placeholder="Phil" required>
        </div>

        <div class="col-md-4">
            <label for="phoneInput" class="mb-2">Contact Phone <small class="text-danger">*</small></label>
            <input id="phoneInput" type="text" class="form-control" name="phone" placeholder="123-45-678" required>
        </div>

        <div class="col-md-4">
            <label for="shippingAddressInput" class="mb-2">Where to Shipping Addres <small class="text-danger">*</small></label>
            <input id="shippingAddressInput" type="text" class="form-control" name="shippingAddress" placeholder="5019 Leverton Cove Road" required>
        </div>

        <div class="col-md-6">
            <label for="emailInput" class="mb-2">Contact e-mail</label>
            <input id="emailInput" type="email" class="form-control" name="email" placeholder="email@address.com">
        </div>

        <div class="col-md-6">
            <label for="birthDateInput" class="mb-2">Date of birth</label>
            <input id="birthDateInput" type="date" class="form-control" name="birthDate">
        </div>

        <small class="text-danger">Required *</small>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Rent it!</input>
        </div>
    </form>
</main>

<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<?php

require_once 'footer.php';
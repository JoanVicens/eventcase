<?php

    $moviesId = $_GET['moviesId'];

    require_once 'head.php';
?>

<form action="/rent" method='post'>

    <?php
    foreach ($moviesId as $id) {
        echo '<input type="hidden" name="moviesId[]" value=' . $id . '>';
    }
    ?>
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="Phil" required>

    <label for="phone">Contact Phone</lable>
        <input type="text" name="phone" placeholder="123-45-678" required>

        <label for="shippingAddress">Where to Shipping Addres</labal>
            <input type="text" name="shippingAddress" placeholder="5019 Leverton Cove Road" required>

            <label for="email">Contact e-mail</label>
            <input type="email" name="email" placeholder="email@address.com">

            <label for="birthDate">Date of birth</label>
            <input type="date" name="birthDate">

            <input type="submit" value="Rent it!"></input>
</form>
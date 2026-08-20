<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>

<body>

    <?php  include 'navbar.php';  ?>

    <div class="container">
        <h1>Contact Us</h1>
        <form>
            <label>Name:</label><br>
            <input type="text" name="name"><br><br>

            <label>Email:</label><br>
            <input type="email" name="email"><br><br>

            <label>Message:</label><br>
            <textarea name="message"></textarea><br><br>

            <button type="submit">Send</button>
        </form>
    </div>


</body>

</html>
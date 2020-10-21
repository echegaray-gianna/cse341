<?php include $_SERVER['DOCUMENT_ROOT'] . '/eportfolio/modules/header.php'; ?>

<main>
    <h1 class="title">Contact</h1> 
    <div class="container-contact">
        <!--Form-->
        <div class="form">
            <form action="/eportfolio/view/thanks.php" enctype="multipart/form-data" name="c-contract" class="form-contact">
                <fieldset>
                    <label>
                        <span>Name</span>
                        <input name="fullname" type="text" value="" placeholder="Full Name" pattern="[a-zA-Z -._]{5,99}" required>
                    </label>

                    <label>
                        <span>Email</span>
                        <input name="email" type="email" value="" placeholder="email@email.com" required>
                    </label>

                    <label>
                        <span>Subject </span>
                        <input name="subject" type="text" value="" placeholder="Subject" pattern="[a-zA-Z -._]{5,99}">
                    </label>

                    <label>
                        <span>Message </span>
                        <textarea name="Message" rows="5" cols="150" placeholder="Message"></textarea>
                    </label>

                </fieldset>
                <div class="form-imput">
                    <input type="submit" value="Submit" class="submitbtn">
                </div>
            </form>
        </div>

    </div>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/eportfolio/modules/footer.php'; ?>

</body>

</html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/homepage/modules/head.php'; ?>

<main>

    <h1> Home Page </h1>
    <div class="introduction">
        <div class="intro-photo-frame">
            <div class="intro-photo">
                <img src="photos/46636063_10218285476070997_9031301614773731328_n.jpg" alt="Me and my daughter">
            </div>
        </div>
        <p class="intro-one">
            Hello my name is Gianna. I am a wife, a mother of a 4 year old daughter, and a student. I’m originally from
            Cordoba, Argentina. I have lived in Lehi, Utah since I got married 8 years ago.
        </p>

        <p class="intro_two">
            I am currently a student at BYU-I studying Web Design and Development with an emphasis in
            Development. I have 2 more semesters left to finish.
        </p>

        <p class="intro_three">
            I enjoy spending time with my family. I also like walks, going to the gym (since the pandemic I just
            exercise in my house), and doing DIY projects at my house.
            I spent this last month's break painting my house, renovating the guest bathroom, house
            entrance, my daughter's closet, and finishing some projects that I had pending.
        </p>

        <p class="intro_three">
            I learned to do most of the renovations by reading on the internet, following some accounts on
            Instagram,
            and watching videos on Youtube.
        </p>
    </div>

    <div class="renovation-photos">
        <p class="reno-one">
            Here are some before and after photos of the renovation I did with my husband. Some are finished
            others need to be finished.
        </p>

        <div id="carouselphotos" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselphotos" data-slide-to="0" class="active"></li>
                <li data-target="#carouselphotos" data-slide-to="1"></li>
                <li data-target="#carouselphotos" data-slide-to="2"></li>
                <li data-target="#carouselphotos" data-slide-to="3"></li>
                <li data-target="#carouselphotos" data-slide-to="4"></li>
                <li data-target="#carouselphotos" data-slide-to="5"></li>
                <li data-target="#carouselphotos" data-slide-to="6"></li>
                <li data-target="#carouselphotos" data-slide-to="7"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                    <img src="photos/mudroom1.jpg" class="reno-photo" alt="Mudroom Before">
                    <div class="carousel-caption">
                        <h3>Mudroom</h3>
                        <p>Before</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="photos/mudroom.jpg" class="reno-photo" alt="Mudroom After">
                    <div class="carousel-caption">
                        <h3>Mudroom</h3>
                        <p>After</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="photos/PHOTO-2020-09-11-20-13-11.jpg" class="reno-photo" alt="Closet Before">
                    <div class="carousel-caption">
                        <h3>Closet</h3>
                        <p>Before</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="photos/IMG_8168.jpg" class="reno-photo" alt="Closet After">
                    <div class="carousel-caption">
                        <h3>Closet</h3>
                        <p>After</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="photos/IMG_5926.JPG" class="reno-photo" alt="Stairs Before">
                    <div class="carousel-caption">
                        <h3>Stairs</h3>
                        <p>Before</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="photos/IMG_8276.JPG" class="reno-photo" alt="Stairs After">
                    <div class="carousel-caption">
                        <h3>Stairs</h3>
                        <p>After</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="photos/IMG_5927.JPG" class="reno-photo" alt="Third slide">
                    <div class="carousel-caption">
                        <h3>Bathroom</h3>
                        <p>Before</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="photos/IMG_8277.JPG" class="reno-photo" alt="Third slide">
                    <div class="carousel-caption">
                        <h3>Bathroom</h3>
                        <p>After</p>
                    </div>
                </div>


            </div>

            <a class="carousel-control-prev" href="#carouselphotos" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselphotos" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</main>


<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/homepage/modules/footer.php'; ?>
</footer>

<script src="/homepage/script/script.js"></script>

</body>

</html>
<?php
    include_once "connection.php";

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Escape Bay</title>
    <link rel="stylesheet" href="res.css">
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.20/dist/lenis.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="background"></div>
    <div class="main">
        <?php
            include_once "login.php";
        ?>
        <div class="page1" id="page1">
            <?php
                include_once "navbar.php";
            ?>
            <div class="blanknav"></div>
            <div class="enquirydate">
                <div class="enquirytext">
                    <h1>Gallery</h1>
                    <h2>Through the Lens of Imagination</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="Gallery">
                <?php
                $sel = "SELECT * FROM gallery where gallery_status = '1'";
                $exe = mysqli_query($con, $sel);
                while ($fetch = mysqli_fetch_assoc($exe)) {
                ?>
                    <div class="Gallery-card">
                        <a href="images/<?php echo $fetch['gallery_image'] ?>" class="lightbox">
                            <div class="card-image">
                                <img src="images/<?php echo $fetch['gallery_image'] ?>" alt="">
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


        <?php
            include_once "footer.php";
        ?>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
        const galleryItems = document.querySelectorAll(".Gallery a");
        const lightbox = document.createElement("div");
        lightbox.classList.add("lightbox-active");
        lightbox.style.display = "none";

        const img = document.createElement("img");
        const controls = document.createElement("div");
        controls.classList.add("lightbox-controls");

        const prevBtn = document.createElement("button");
        prevBtn.innerHTML = "&#9664;"; // Left arrow

        const nextBtn = document.createElement("button");
        nextBtn.innerHTML = "&#9654;"; // Right arrow

        const closeBtn = document.createElement("button");
        closeBtn.innerHTML = "&#10005;"; // Cross icon

        prevBtn.classList.add("prev");
        nextBtn.classList.add("next");
        closeBtn.classList.add("exit");

        controls.append(prevBtn, nextBtn, closeBtn);
        lightbox.append(img, controls);
        document.body.append(lightbox);

        let currentIndex = 0;

        function showLightbox(index) {
            currentIndex = index;
            img.src = galleryItems[index].href;
            lightbox.style.display = "flex";
        }

        function hideLightbox() {
            lightbox.style.display = "none";
        }

        function showNext() {
            currentIndex = (currentIndex + 1) % galleryItems.length;
            img.src = galleryItems[currentIndex].href;
        }

        function showPrev() {
            currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
            img.src = galleryItems[currentIndex].href;
        }

        galleryItems.forEach((item, index) => {
            item.addEventListener("click", (e) => {
                e.preventDefault();
                showLightbox(index);
            });
        });

        closeBtn.addEventListener("click", hideLightbox);
        nextBtn.addEventListener("click", showNext);
        prevBtn.addEventListener("click", showPrev);

        lightbox.addEventListener("click", (e) => {
            if (e.target === lightbox || e.target === closeBtn) {
                hideLightbox();
            }
        });
    });

    </script>

</body>
</html>
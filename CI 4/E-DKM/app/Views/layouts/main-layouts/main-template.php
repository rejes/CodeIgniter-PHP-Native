<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">

    <?= $this->renderSection('styles') ?>

    <title><?= $title ?? 'Home' ?> - Masjid Ar-Rahman</title>
  </head>
  <body>

    <?= $this->include('layouts/main-layouts/navbar') ?>

    <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-primary text-white rounded-circle"><i class="fa-solid fa-arrow-up"></i></button>
    
    <main>
      <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-primary pb-1 pt-3">
      <p class="text-white text-center">&copy; Masjid Ar-Rahman Jakarta 2021</p>
    </footer>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?= $this->renderSection('javascript') ?>

    <script>
      AOS.init({
        once: true
      });

      const $dropdown = $(".dropdown");
      const $dropdownToggle = $(".dropdown-toggle");
      const $dropdownMenu = $(".dropdown-menu");
      const showClass = "show";

      $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 768px)").matches) {
          $dropdown.hover(
            function() {
              const $this = $(this);
              $this.addClass(showClass);
              $this.find($dropdownToggle).attr("aria-expanded", "true");
              $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
              const $this = $(this);
              $this.removeClass(showClass);
              $this.find($dropdownToggle).attr("aria-expanded", "false");
              $this.find($dropdownMenu).removeClass(showClass);
            }
          );
        } else {
          $dropdown.off("mouseenter mouseleave");
        }
      });

      const upButton = document.getElementById("myBtn");

      window.onscroll = function() {
        scrollFunction()
        // scrollNavbar()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
          upButton.style.display = "block";
        } else {
          upButton.style.display = "none";
        }
      }
      
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }

      // function scrollNavbar() {
      //   const navbar = document.querySelector('.navbar');
      //   if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      //     navbar.classList.remove('bg-transparent');
      //     navbar.classList.add('bg-light', 'shadow-sm');
      //   } else {
      //     navbar.classList.remove('bg-light', 'shadow-sm');
      //     navbar.classList.add('bg-transparent');
      //   }
      // }
    </script>
    
  </body>
</html>

<?php
include($_SERVER['DOCUMENT_ROOT']."/test/header.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css" type="text/css">
    <title>GV Hospital</title>
    <!-- <style type="text/css">
        #mainPageScroll{
                height: 500px;
                width:95%;
                margin:3%;
        }
        .imageSize{
            height: 500px;
        }
        #mainPageContent{
            margin:5%;
            color:white;
        }
    </style> -->
  </head>
  <body>

  <div id="carouselExampleFade" class="carousel slide carousel-fade container-fluid" data-bs-ride="carousel">
        <div class="carousel-inner" id="mainPageScroll">
            <div class="carousel-item active">
            <img src="image1.jpeg" class="d-block w-100 imageSize" alt="Equiped with latest technology">
            </div>
            <div class="carousel-item">
            <img src="image2.jpeg" class="d-block w-100 imageSize" alt="Home like care">
            </div>
            <div class="carousel-item">
            <img src="image3.jpeg" class="d-block w-100 imageSize" alt="Ample space">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div id="mainPageContent">
            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel hendrerit risus. Vivamus venenatis rhoncus vestibulum. Nulla enim est, aliquet ut purus tincidunt, scelerisque porttitor ipsum. In quis ipsum ultrices sapien imperdiet commodo. Pellentesque sed finibus nibh. Ut tristique commodo viverra. Donec venenatis accumsan massa. In rutrum purus in mi condimentum, vel gravida quam rutrum. Sed efficitur consequat varius. Suspendisse et aliquam velit, dapibus commodo lorem. Integer vel ultrices erat, ac condimentum risus. Curabitur convallis urna non metus accumsan, quis semper libero mattis. Maecenas et massa dapibus, elementum leo et, tempus est. Vestibulum at leo commodo, vestibulum sapien sed, vestibulum lacus.

            </p>
        </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
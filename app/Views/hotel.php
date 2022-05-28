<?= $this->extend('User/Template') ?>
<?= $this->section('content') ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              class="first-slide"
              src="img/Hotel.png"
              alt="First slide"
            />
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Selamat Datang di Hotel Scada.</h1>
                <p>
                  Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                  Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                  Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                </p>
               
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="second-slide"
              src="img/gym room hotel.jpg"
              alt="Second slide"
            />
            <div class="container">
              <div class="carousel-caption">
                <h1>Selamat Datanag di Hotel Scada.</h1>
                <p>
                Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button"
                    >Learn more</a
                  >
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="third-slide"
              src="img/parkir hotel luas.jpeg"
              alt="Third slide"
            />
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>Selamat Datang di Hotel Scada.</h1>
                <p>
                Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                Hotel Scada merupakan hotel bintang 3 dengan tempat yang strategis.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button"
                    >Browse gallery</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#myCarousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#myCarousel"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <?= $this->endSection() ?>
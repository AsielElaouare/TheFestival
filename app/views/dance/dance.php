<?php
include __DIR__ . '/../header.php';
?>
<link rel="stylesheet" href="/style/style.css">
<main class="container my-5">

    <!-- Header Section -->
    <div class="row mb-5 header-section">
        <div class="col text-center p-5">
            <h1 class="display-4 impact-font pink">Dance Haarlem</h1>
            <p class="lead purple">
                Join us for a three-day celebration of the best in dance music.
                Below you’ll find our featured artists, full line-up, and event schedule.
            </p>
        </div>
    </div>

    <!-- Featured Artists Section -->
    <section class="my-5 text-center" id="featured-artists">
        <h2 class="impact-font purple mb-4">Featured Artists</h2>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center mb-4">
                <img src="/uploads/martingarrixfirst.jpg" class="img-fluid rounded-circle mb-2" style="max-width: 150px;">
                <h5 class="pink">Martin Garrix</h5>
            </div>

            <div class="col-md-3 text-center mb-4">
                <img src="/uploads/hardwellfirst.jpg" class="img-fluid rounded-circle mb-2" style="max-width: 150px;">
                <h5 class="pink">Hardwell</h5>
            </div>
        </div>
    </section>

    <!-- Line-Up Section -->
    <section class="my-5" id="line-up">
        <h2 class="impact-font purple mb-4 text-center">Line-Up</h2>
        <div class="row">
            <div class="col-md-4 col-lg-2 mb-4">
                <div class="card">
                    <img src="/uploads/arminvanbuurennoback.png" class="card-img-top object-fit-cover">
                    <div class="card-body text-center p-2">
                        <h6 class="mb-0 pink">Armin van Buuren</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4">
                <div class="card">
                    <img src="/uploads/nickyromero.jpg" class="card-img-top object-fit-cover">
                    <div class="card-body text-center p-2">
                        <h6 class="mb-0 pink">Nicky Romero</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4">
                <div class="card">
                    <img src="/uploads/afrojack.jpg" class="card-img-top object-fit-cover">
                    <div class="card-body text-center p-2">
                        <h6 class="mb-0 pink">Afrojack</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4">
                <div class="card">
                    <img src="/uploads/tietsonoback.png" class="card-img-top object-fit-cover">
                    <div class="card-body text-center p-2">
                        <h6 class="mb-0 pink">Tiësto</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4">
                <div class="card">
                    <img src="/uploads/hardwellnoback.png" class="card-img-top object-fit-cover">
                    <div class="card-body text-center p-2">
                        <h6 class="mb-0 pink">Hardwell</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4">
                <div class="card">
                    <img src="/uploads/martingarrix.jpg" class="card-img-top object-fit-cover">
                    <div class="card-body text-center p-2">
                        <h6 class="mb-0 pink">Martin Garrix</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="my-5" id="schedule">
        <h2 class="impact-font purple mb-4 text-center">Schedule</h2>
        <p class="font-weight-bold pink">Dance Event</p>

        <div class="bg-yellow p-3 rounded">
            <h5 class="purple">Friday</h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>20:00 - RICKY ROMERO / AFROJACK</span> <span>[Lichtfabriek]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>21:00 - TIESTO</span> <span>[Slachthuis]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>22:00 - ARMIN VAN BUUREN</span> <span>[OpenKikker]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>23:00 - NICKY ROMERO</span> <span>[The Club]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>00:00 - MARTIN GARRIX</span> <span>[The Constructions]</span>
                </li>
            </ul>
        </div>

        <div class="bg-yellow p-3 rounded mt-3">
            <h5 class="purple">Saturday</h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>14:00 - ARMIN VAN BUUREN</span> <span>[Caprera]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>14:30 - HARDWELL</span> <span>[Caprera]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>16:00 - AFROJACK</span> <span>[The Club]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>19:00 - TIESTO</span> <span>[Lichtfabriek]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>21:00 - NICKY ROMERO</span> <span>[Slachthuis]</span>
                </li>
            </ul>
        </div>

        <div class="bg-yellow p-3 rounded mt-3">
            <h5 class="purple">Sunday</h5>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>14:00 - AFROJACK</span> <span>[Caprera]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>15:00 - HARDWELL</span> <span>[Caprera]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>17:00 - AFROJACK</span> <span>[OpenKikker]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>19:00 - ARMIN VAN BUUREN</span> <span>[The Club]</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>18:00 - SLACHTHUIS</span> <span>[Slachthuis]</span>
                </li>
            </ul>
        </div>
    </section>

    <div class="text-center my-5">
        <button class="primary-button impact-font icon-size">View Full Line-Up</button>
    </div>

</main>

<?php
include __DIR__ . '/../footer.php';
?>

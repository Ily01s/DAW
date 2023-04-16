<div class="container__fluid">
    <div class="row">
        <h1 class="home_title">My courses</h1>
        <div class="container">
            <div class="cards__container course__card__list">
                <?php foreach($courses as $course){ ?>
                <?php include("../templates/my-course-card.php"); ?>
                <?php } ?>
            </div>
        </div>
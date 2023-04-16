<div class="container">
    <div class="row">
        <div class="container__home">
            <h1 class="home_title">Welcome <?php echo $user?></h1>
            <?php include("../forms/student-preview-form.php")?>
            <div class="home_container_btn">
                <a class="app__btn left" href="<?php echo W_STUDENT;?>/src/controllers/my-courses.php">My courses</a>
                <a class="app__btn right" href="<?php echo W_STUDENT;?>/src/controllers/search-courses.php">Search
                    courses</a>
            </div>
            <div class="container__statistics">
                <h3 class="statistics__title">Recomended courses</h3>
            </div>
            <div class="cards__container course__card__list">
                <?php foreach($recommendedCourses as $recommendedCourse){ ?>
                <?php include("../templates/recommended-course-card.php"); ?>
                <?php } ?>
            </div>
        </div>
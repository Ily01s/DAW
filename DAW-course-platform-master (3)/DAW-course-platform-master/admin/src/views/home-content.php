<div class="container__fluid">
    <div class="row">
        <div class="container__home">
            <h1 class="home_title">Welcome <?php echo $_SESSION['user']?></h1>
            <div class="home_container_btn">
                <a class="app__btn left" href="<?php echo W_ADMIN;?>/src/controllers/courses.php">Courses</a>
                <a class="app__btn right" href="<?php echo W_ADMIN;?>/src/controllers/students.php">Students</a>
            </div>
            <div class="container__statistics">
                <h3 class="statistics__title">statistics</h3>
                <div class="progressBar__courses">
                    <p>Number of courses: <?php echo $totalCourses['total']; ?></p>
                    <div class="load-bar"><span class="progress"></span></div>
                </div>
                <div class="progressBar__students">
                    <p>Number of students: <?php echo $totalRegisteredStudents['total']; ?></p>
                    <div class="load-bar"><span class="progress"></span></div>
                </div>
            </div>
        </div>
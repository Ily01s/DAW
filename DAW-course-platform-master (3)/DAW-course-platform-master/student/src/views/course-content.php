<div class="container__fluid">
    <div class="row">
        <h1 class="home_title"><?php echo $course["title"]; ?></h1>
        <div class="body__container__course">
            <fieldset>
                <legend class="title">Course Detail</legend>
                <div class="container__student-course">
                    <div class="course__image">
                        <img src="https://images.unsplash.com/profile-fb-1642446137-6bae7cc893b9.jpg?dpr=2&auto=format&fit=crop&w=60&h=60&q=60&crop=faces&bg=fff"
                            class="course__avatar" />
                    </div>
                    <div class="course__content">
                        <div class="content__title-date">
                            <div class="course__title">
                                <p>Title:<br /></p>
                                <span><?php echo $course["title"]; ?></span>
                            </div>

                            <div class="course__date">
                                <p>Inscription date:<br /></p>
                                <span><?php echo explode(' ', $inscriptionDate)[0]; ?></span>
                            </div>
                        </div>
                        <div class="content__teacher-level">
                            <div class="course__teacher">
                                <p>Teacher:<br /></p>
                                <span><?php echo $teacher; ?></span>
                            </div>
                            <div class="couser__level">
                                <p>Level:<br /></p>
                                <span>Level <?php echo $course["level"]; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course__description">
                    <p>Description:<br /></p>
                    <span><?php echo $course["description"]; ?></span>
                </div>
                
            </fieldset>
        </div>

        <div id="resourcesCardsContainer" class="cards__container resource__card__list">
            <?php foreach($resources as $resource){ ?>
            <?php include("../templates/resource-preview-card.php"); ?>
            <?php } ?>
        </div>

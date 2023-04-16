<div class="container__fluid">
    <div class="row">
        <div class="container__divided">
            <div class="container__left">
                <?php include("../forms/course-preview-form.php"); ?>
            </div>

            <div class="container__right">
                <div id="coursePreviewCardsContainer" class="cards__container course__card__list">
                    <?php foreach($courses as $course){ ?>
                    <?php include("../templates/search-course-card.php"); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
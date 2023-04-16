    <!-- recursos guardados en la base de datos -->

    <div class="container">
        <div class="row">
            <div class="course__body__container__divided">
                <div class="course__container__up">
                    <?php include("../forms/edit-course-form.php"); ?>
                </div>

                <?php if(isset($resources) ){ ?>
                <div class="course__container__bottom">
                    <h1 class="resource_title">
                        Resources</h1>
                    <div class="resource__container__divided">
                        <?php include("../forms/edit-resource-form.php"); ?>
                        <div id="resourcesCardsContainer" class="cards__container resource__card__list">
                            <?php foreach($resources as $resource){ ?>
                            <?php include("../templates/resource-preview-card.php"); ?>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                <?php } ?>
            </div>
<div class="container__fluid">
    <div class="row">
        <div class="container__divided">
            <div class="container__left">
                <?php include("../forms/create-student-form.php"); ?>
            </div>

            <div class="container__right">
                <div class="cards__container student__card__list">
                    <?php foreach($students as $student){ ?>
                    <?php include("../templates/student-preview-card.php"); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
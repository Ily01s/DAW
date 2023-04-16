<div class="alert"></div>
<div class="body__container__form">
    <div class="container__form">
        <form class="form__data" action="" method="POST" enctype="multipart/form-data" id="form">
            <fieldset>
                <legend>Create new course</legend>
                <div class="data__fields">
                    <?php if(isset($messageError)){?>
                    <p class="php__form__error"> <?php echo $messageError; ?></p>
                    <?php } ?>

                    <div class="form__divided">
                        <div class="data__left__side">
                            <div class="container__form__image">
                                <img src="<?php echo defaultImage('course');?>" class="image__avatar image__square" />
                                <input type="file" class="image__input createCourse" id="image__input"
                                    name="courseThumbnail" accept="image/*" />
                                <label for="image__input" class="image__label image__square">
                                    Choose Photo
                                </label>
                            </div>
                        </div>
                        <div class="data__right__side">
                            <div class="fields">
                                <label for="courseTitle">Title</label>
                                <input type="text" name="courseTitle" id="courseTitle" placeholder="Title">
                            </div>

                            <div class="fields">
                                <label for="courseType">Type</label>
                                <select id="courseType" name="courseType">
                                    <?php foreach($disciplines as $discipline){ ?>
                                    <option value="<?php echo $discipline ?>"><?php echo $discipline ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="fields">
                                <label for="courseLevel">Level</label>
                                <select id="courseLevel" name="courseLevel">
                                    <?php for ($i=1; $i<=10; $i++){ ?>
                                    <option value="<?php echo $i ?>">Level <?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <textarea placeholder="Description..." name="courseDescription" id="courseDescription" cols="30"
                        rows="10"></textarea>
                </div>
                <div class="btn__container"><button class="btn__submit btn__unique" type="submit"
                        value="createCourse">CREATE</button></div>

            </fieldset>
        </form>
    </div>
</div>
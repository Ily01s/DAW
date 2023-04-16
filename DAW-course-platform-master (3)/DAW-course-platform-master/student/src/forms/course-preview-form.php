<div class="alert"></div>
<div class="body__container__form">
    <div class="container__form">
        <form class="form__data" action="" method="POST" id="form">
            <fieldset>
                <legend><?php echo (isset($course))?$course['title']:"Course Preview"; ?></legend>
                <div class="data__fields">
                    <p id="minimumLevelError" class="php__form__error">
                        <?php echo (isset($messageError))?$messageError:""; ?>
                    </p>
                    <div class="container__form__image">
                        <img id="coursePreviewThumbnail"
                            src="<?php echo (isset($course))?verifyImage($course['thumbnail'],'course'):defaultImage('course');?>"
                            class="image__avatar image__square" />
                    </div>
                    <div class="fields__divided">
                        <div class="course__level">
                            <p <?php echo (isset($course))?"":"hidden"; ?> >Level: <span
                                    id="coursePreviewLevel"><?php echo (isset($course))?$course['level']:""; ?></span>
                            </p>
                        </div>
                        <div class="course__type">
                            <p <?php echo (isset($course))?"":"hidden"; ?>>Type: <span
                                    id="coursePreviewType"><?php echo (isset($course))?$course['type']:""; ?></span></p>
                        </div>
                    </div>
                    <div class="course__description center">
                        <p <?php echo (isset($course))?"":"hidden"; ?>>Description:</p>
                        <p><span id="coursePreviewDescription"><?php echo (isset($course))?$course['description']:""; ?></span></p>
                    </div>

                </div>
                <div class="btn__container">
                    <!-- <button class="btn__submit btn__disabled btn__unique" type="submit" value="register" disabled>REGISTER</button> -->
                    <button type="submit" name="register" value="register" id="btnRegister"
                        class="btn__submit <?php echo (isset($course))?"":"btn__disabled"; ?>  btn__unique"
                        <?php echo (isset($course))?"":"disabled"; ?>>REGISTER</button>
                </div>
                <input type="hidden" name="courseId" id="coursePreviewId"
                    value="<?php echo (isset($course))?$course['id']:""; ?> ">
            </fieldset>
        </form>
    </div>
</div>
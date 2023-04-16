<div class="form__data">
    <fieldset>
        <div class="data__fields">
            <div class="form__divided">
                <div class="data__left__side">
                    <div class="container__form__image">
                        <img src="<?php echo verifyImage($student['image'],'student');?>" alt="Student"
                            class="image__avatar image__circle" />
                    </div>
                    <div class="fields__end">
                        <div class="fields">
                            <p id="studentLevel">Level: <?php echo $student['level']; ?></p>
                        </div>
                        <div class="fields">
                            <p id="studentInterest">Interest: <?php echo $student['interest']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="data__right__side">
                    <div class="fields__divided">
                        <div class="fields__center">
                            <p id="studentLevel">Name: <?php echo $student['name']; ?></p>
                        </div>
                        <div class="fields__center">
                            <p id="studentLevel">Level: <?php echo $student['lastName']; ?></p>
                        </div>
                    </div>

                    <div class="fields__divided">
                        <div class="fields__center">
                            <p id="studentLevel">Gender: <?php echo $student['gender']; ?></p>
                        </div>
                        <div class="fields__center">
                            <p id="studentLevel">Date of birth: <?php echo $student['dateOfBirth']; ?></p>
                        </div>
                    </div>

                    <div class="fields__divided">
                        <div class="fields__center">
                            <p id="studentLevel">Email: <?php echo $student['email']; ?></p>
                        </div>
                        <div class="fields__center">
                            <p id="studentLevel">Password: <?php echo $student['password']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
<div class="alert"></div>
<div class="body__container__form">
    <div class="container__form">
        <form class="form__data" id="form" method="POST" enctype="multipart/form-data" autocomplete="off">
            <fieldset>
                <legend>Create new student</legend>
                <div class="data__fields">
                    <?php if(isset($messageError)){?>
                    <p class="php__form__error"> <?php echo $messageError; ?></p>
                    <?php } ?>
                    <!-- parent container created (some css of app__image put on paretnt container) -->
                    <div class="form__divided">
                        <div class="data__left__side">
                            <div class="container__form__image">
                                <img src="<?php echo defaultImage('student');?>" class="image__avatar image__circle" />
                                <input type="file" class="image__input" id="image__input" name="studentImage"
                                    accept="image/*" />
                                <label for="image__input" class="image__label image__circle">
                                    Choose Photo
                                </label>
                            </div>
                            <!-- fill with the DB or with a JSON file -->
                            <div class="fields__end">
                                <div class="fields">
                                    <label for="studentLevel">Level</label>
                                    <select id="studentLevel" name="studentLevel">
                                        <?php for ($i=0; $i<=10; $i++){ ?>
                                        <option value="<?php echo $i ?>">Level <?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="fields">
                                    <label for="studentInterest">Interest</label>
                                    <select id="studentInterest" name="studentInterest">
                                        <?php foreach($disciplines as $discipline){ ?>
                                        <option value="<?php echo $discipline ?>"><?php echo $discipline ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- changed class name: app__right-side -->
                        <div class="data__right__side__student">
                            <div class="fields__divided">
                                <div class="fields">
                                    <label for="studentName">Name</label>
                                    <input type="text" name="studentName" id="studentName" />
                                </div>

                                <div class="fields">
                                    <label for="studentLastName">Last Name</label>
                                    <input type="text" name="studentLastName" id="studentLastName" />
                                </div>
                            </div>

                            <div class="fields__divided">
                                <div class="fields">
                                    <label for="studentGender">Gender</label>
                                    <select name="studentGender" id="studentGender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="fields">
                                    <label for="studentDateOfBirth">Date of birth</label>
                                    <input type="date" name="studentDateOfBirth" id="studentDateOfBirth" />
                                </div>
                            </div>


                            <div class="fields">
                                <label for="studentEmail">Email</label>
                                <input type="email" name="studentEmail" id="studentEmail" />
                            </div>

                            <div class="fields">
                                <label for="studentPassword">Password</label>
                                <input type="password" name="studentPassword" id="studentPassword" />
                            </div>

                            <div class="fields">
                                <label for="studentRepeatPassword">Repeat password</label>
                                <input type="password" name="studentRepeatPassword" id="studentRepeatPassword" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn__container"> <button class="btn__submit btn__unique" type="submit"
                        value="createStudent">CREATE</button></div>
            </fieldset>
        </form>
    </div>
</div>
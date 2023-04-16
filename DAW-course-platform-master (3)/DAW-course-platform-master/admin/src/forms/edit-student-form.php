<div class="alert"></div>
<div class="body__container__form">
    <div class="container__form">
        <form method="POST" enctype="multipart/form-data" class="form__data" id="form">
            <fieldset>
                <legend>Edit student #<?php echo $student['id']; ?></legend>
                <div class=" data__fields">
                    <?php if(isset($messageError)){?>
                    <p class="php__form__error"> <?php echo $messageError; ?></p>
                    <?php } ?>
                    <div class="form__divided">
                        <div class="data__left__side">
                            <div class="container__form__image">
                                <img src="<?php echo verifyImage($student['image'],'student');?>"
                                    class="image__avatar image__circle" />
                                <input type="file" class="image__input" id="image__input" name="studentImage"
                                    accept="image/*" />
                                <label for="image__input" class="image__label image__circle">
                                    Choose Photo
                                </label>
                                <input type="hidden" name="studentImage_res" value="<?php echo $student['image'];?>"
                                    accept="image/*" />

                            </div>

                            <div class="fields__end">

                                <div class="fields">
                                    <label for="studentLevel">Level</label>
                                    <select id="studentLevel" name="studentLevel">
                                        <?php for ($i=1; $i<=10; $i++){ ?>
                                        <option <?php  echo ($student['level']==$i)?"selected ":""; ?>
                                            value="<?php echo $i ?>">
                                            Level <?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="fields">
                                    <label for="studentInterest">Interest</label>
                                    <select id="studentInterest" name="studentInterest">
                                        <?php foreach($disciplines as $discipline){ ?>
                                        <option <?php  echo ($student['interest']==$discipline)?"selected ":""; ?>
                                            value="<?php echo $discipline ?>">
                                            <?php echo $discipline ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="data__right__side">

                            <div class="fields__divided">
                                <div class="fields">
                                    <label for="studentName">Name:</label>
                                    <input type="text" required class="form-control"
                                        value="<?php echo $student['name']; ?>" name="studentName" id="studentName"
                                        placeholder="Name">
                                </div>

                                <div class="fields">
                                    <label for="studentLastName">Last name:</label>
                                    <input type="text" class="form-control" value="<?php echo $student['lastName']; ?>"
                                        name="studentLastName" id="studentLastName" placeholder="Last name">
                                </div>
                            </div>

                            <div class="fields__divided">
                                <div class="fields">
                                    <label for="studentGender">Gender</label>
                                    <select name="studentGender" id="studentGender">
                                        <option <?php  echo ($student['gender']=="MALE")?"selected ":""; ?>
                                            value="MALE">Male
                                        </option>
                                        <option <?php  echo ($student['gender']=="FEMALE")?"selected ":""; ?>
                                            value="FEMALE">
                                            Female</option>
                                        <option <?php  echo ($student['gender']=="OTHER")?"selected ":""; ?>
                                            value="OTHER">Other
                                        </option>
                                    </select>
                                </div>

                                <div class="fields">
                                    <label for="studentDateOfBirth">Date of birth</label>
                                    <input type="date" name="studentDateOfBirth" id="studentDateOfBirth"
                                        value="<?php echo $student['dateOfBirth']; ?>" />
                                </div>
                            </div>

                            <div class="fields">
                                <label for="studentUser">User:</label>
                                <input type="text" required class="form-control" value="<?php echo $student['user']; ?>"
                                    name="studentUser" id="studentUser" placeholder="User name">
                            </div>

                            <div class="fields">
                                <label for="studentPassword">Password:</label>
                                <input type="text" required class="form-control"
                                    value="<?php echo $student['password']; ?>" name="studentPassword"
                                    id="studentPassword" placeholder="password">
                            </div>


                            <div class="fields">
                                <label for="studentEmail">Email</label>
                                <input type="email" name="studentEmail" id="studentEmail"
                                    value="<?php echo $student['email']; ?>" />
                            </div>
                        </div>

                    </div>
                    <div class="btn__container">
                        <button type="submit" name="action" value="save"
                            class="btn__submit editStudent btn__save">Save</button>
                        <button type="submit" name="action" value="cancel"
                            class="btn__submit editStudent btn__cancel">Cancel</button>
                        <button type="submit" name="action" value="delete"
                            class="btn__submit editStudent btn__delete">Delete</button>
                    </div>
                    <input type="hidden" value="<?php echo $student['id']; ?>" name="studentId">
                </div>
            </fieldset>
        </form>
    </div>
</div>
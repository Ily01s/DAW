<form method="GET" action="student.php" class="card__item">
    <button type="submit">
        <img
        src="<?php echo verifyImage($student['image'],'student');?>"
        alt=""
        />
        <p><?php echo $student['user'];?></p>
    </button>
    <input type="hidden" name="studentId" value="<?php echo $student['id'];?>"/>
</form>
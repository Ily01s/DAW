<form method="GET" action="search-courses.php" class="card__item">
    <button type="submit">
        <img
        src="<?php echo verifyImage($recommendedCourse['thumbnail'],'course');?>"
        alt=""
        />
        <span><?php echo $recommendedCourse['type'];?></span>
        <p><?php echo $recommendedCourse['title'];?></p>
    </button>
    <input type="hidden" name="courseId" id="courseId" value="<?php echo $recommendedCourse['id'];?>"/>
</form>

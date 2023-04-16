<?php
include(APP_QCM.'qcm_'.$course['type'].'.php');
$qcm = new SimpleXMLElement($xmlstr);
?>

<div class="alert"></div>
<div class="body__container__form">
  <div class="container__form">
    <form class="form__data" id="formQCM" action="../controllers/course.php" method="post">
      <fieldset>
        <legend>QCM <?php echo $course['type']; ?></legend>

        <div class="data__fields">
          <?php
          $i=0;
          while($i<=1){
          $j=0;
          ?>
            <div>
              <p> <?php echo '<label class="qcm__question">'.$qcm->items->item[$i]->Question.'</label>';?> </p>

              <INPUT type="radio" name="<?php echo $i;?>" value=<?php $qcm->items->item[$i]->answer[$j]?>> <?php echo '<label>'.$qcm->items->item[0]->answer[0].'</label>'; $j++;?>
              <INPUT type="radio" name="<?php echo $i;?>" value=<?php $qcm->items->item[$i]->answer[$j]?>> <?php echo '<label>'.$qcm->items->item[0]->answer[1].'</label>'; $j++;?>
              <INPUT type="radio" name="<?php echo $i;?>" value=<?php $qcm->items->item[$i]->answer[$j]?>> <?php echo  '<label>'.$qcm->items->item[0]->answer[2].'</label>'; $j++;?>
              <INPUT type="radio" name="<?php echo $i;?>" value=<?php $qcm->items->item[$i]->answer[$j]?>> <?php echo  '<label>'.$qcm->items->item[0]->answer[3].'</label>'; $j++;?>
            
            </div>
          <?php
          $i++;
          }
          ?>
        </div>
        <div class="btn__container"><input type="submit"  class="btn__submit btn__unique"  name="submitbutton" value="OK" ></div>
      </fieldset>

      <input type="hidden" name="courseId" value="<?php echo $courseId; ?>">
      <input type="hidden" name="FFQCM">
    </form>
    </div>
</div>


<div class="card__item">
    <button>
        <img src="<?php echo defaultResourcePreview($resource['type']);?>" alt="" />
        <span><?php echo $resource['type'];?></span>
        <p><?php echo $resource['name']?></p>
        <input type="hidden" name="resourceUrl" value="<?php echo $resource['url']?>"/>
        <input type="hidden" name="resourceId" value="<?php echo $resource['id']?>"/>
    </button>
</div>
<a href="<?php 
    switch (strtolower($resource['type'])){
        case WORD_IMAGE:
            echo W_IMAGES . "/". $resource['url']; 
            break;

        case WORD_PDF:
            echo W_PDF . "/". $resource['url']; 
            break;

        case WORD_VIDEO:
            echo W_VIDEOS . "/". $resource['url']; 
            break;
    }
    ?>"
    target="_blank">
    <div class="card__item">
        <button>
            <img src="<?php echo defaultResourcePreview($resource['type']);?>" alt="" />
            <span><?php echo $resource['type'];?></span>
            <p><?php echo $resource['name']; ?></p>
        </button>
    </div>
</a>
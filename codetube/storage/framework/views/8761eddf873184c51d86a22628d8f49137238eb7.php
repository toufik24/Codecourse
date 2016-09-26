<div class="row">
    <div class="col-sm-3">
        <a href="/videos/<?php echo e($video->uid); ?>">
            <img src="<?php echo e($video->getThumbnail()); ?>" alt="<?php echo e($video->title); ?> image" class="img-responsive">
        </a>
    </div>
    <div class="col-sm-9">
        <a href="/videos/<?php echo e($video->uid); ?>"><?php echo e($video->title); ?></a>

        <?php if($video->description): ?>
            <p><?php echo e($video->description); ?></p>
        <?php else: ?>
            <p class="muted">No description</p>
        <?php endif; ?>

        <ul class="list-inline">
            <li><a href="/channel/<?php echo e($video->channel->slug); ?>"><?php echo e($video->channel->name); ?></a></li>
            <li><?php echo e($video->created_at->diffForHumans()); ?></li>
            <li><?php echo e($video->viewCount()); ?> <?php echo e(str_plural('view', $video->viewCount())); ?></li>
        </ul>
    </div>
</div>
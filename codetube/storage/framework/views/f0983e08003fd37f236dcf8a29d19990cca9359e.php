<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search for "<?php echo e(Request::get('q')); ?>"</div>

                    <div class="panel-body">
                        <?php if($channels->count()): ?>
                            <h4>Channels</h4>

                            <div class="well">
                                <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="/channel/<?php echo e($channel->slug); ?>">
                                                <img src="<?php echo e($channel->getImage()); ?>" alt="<?php echo e($channel->name); ?> image" class="media-object">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="/channel/<?php echo e($channel->slug); ?>" class="media-heading"><?php echo e($channel->name); ?></a>
                                            
                                            <ul class="list-inline">
                                                <li><?php echo e($channel->subscriptionCount()); ?> <?php echo e(str_plural('subscriber', $channel->subscriptionCount())); ?></li>
                                            </ul>

                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            </div>
                        <?php endif; ?>

                        <h4>Videos</h4>

                        <?php if($videos->count()): ?>
                            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="well">
                                    <?php echo $__env->make('video.partials._video_result', [
                                        'video' => $video
                                    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php else: ?>
                            <p>No videos found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
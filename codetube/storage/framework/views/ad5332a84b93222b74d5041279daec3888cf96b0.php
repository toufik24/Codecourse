<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="media">
                            <div class="media-left">
                                <img src="<?php echo e($channel->getImage()); ?>" alt="<?php echo e($channel->name); ?> image" class="media-object">
                            </div>
                            <div class="media-body">
                                <?php echo e($channel->name); ?>


                                <ul class="list-inline">
                                    <li>
                                        <subscribe-button channel-slug="<?php echo e($channel->slug); ?>"></subscribe-button>
                                    </li>
                                    <li>
                                        <?php echo e($channel->totalVideoViews()); ?> video <?php echo e(str_plural('view', $channel->totalVideoViews())); ?>

                                    </li>
                                </ul>

                                <?php if($channel->description): ?>
                                    <hr>
                                    <p><?php echo e($channel->description); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Videos</div>

                    <div class="panel-body">
                        <?php if($videos->count()): ?>
                            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="well">
                                    <?php echo $__env->make('video.partials._video_result', [
                                        'video' => $video
                                    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            <?php echo e($videos->links()); ?>

                        <?php else: ?>
                            <p><?php echo e($channel->name); ?> has no videos</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
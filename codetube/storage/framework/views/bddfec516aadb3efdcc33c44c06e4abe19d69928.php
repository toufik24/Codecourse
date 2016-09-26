<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <?php if($subscriptionVideos->count()): ?>
                            <?php $__currentLoopData = $subscriptionVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="well">
                                    <?php echo $__env->make('video.partials._video_result', [
                                        'video' => $video
                                    ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
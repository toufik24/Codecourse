<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Videos</div>

                    <div class="panel-body">
                        <?php if($videos->count()): ?>
                            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="well">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="/videos/<?php echo e($video->uid); ?>">
                                                <img src="<?php echo e($video->getThumbnail()); ?>" alt="<?php echo e($video->title); ?> thumbnail" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <a href="/videos/<?php echo e($video->uid); ?>"><?php echo e($video->title); ?></a>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="muted">
                                                        <?php if(!$video->isProcessed()): ?>
                                                            Processing (<?php echo e($video->processedPercentage() ? $video->processedPercentage() . '%' : 'Starting up'); ?>)
                                                        <?php else: ?>
                                                            <span><?php echo e($video->created_at->toDateTimeString()); ?></span>
                                                        <?php endif; ?>
                                                    </p>
                                                    
                                                    <form action="/videos/<?php echo e($video->uid); ?>" method="post">
                                                        <a href="/videos/<?php echo e($video->uid); ?>/edit" class="btn btn-default">Edit</a>

                                                        <button type="submit" class="btn btn-default">Delete</button>

                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('DELETE')); ?>

                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p><?php echo e(ucfirst($video->visibility)); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            <?php echo e($videos->links()); ?>

                        <?php else: ?>
                            <p>You have no videos.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
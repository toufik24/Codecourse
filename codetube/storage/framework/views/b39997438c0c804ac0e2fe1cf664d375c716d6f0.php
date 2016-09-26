<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <?php if($video->isPrivate() && Auth::check() && $video->ownedByUser(Auth::user())): ?>
                    <div class="alert alert-info">
                        Your video is currently private. Only you can see it.
                    </div>
                <?php endif; ?>

                <?php if($video->isProcessed() && $video->canBeAccessed(Auth::user())): ?>
                    <video-player video-uid="<?php echo e($video->uid); ?>" video-url="<?php echo e($video->getStreamUrl()); ?>" thumbnail-url="<?php echo e($video->getThumbnail()); ?>"></video-player>
                <?php endif; ?>

                <?php if(!$video->isProcessed()): ?>
                    <div class="video-placeholder">
                        <div class="video-placeholder__header">
                            The video is processing. Come back a bit later.
                        </div>
                    </div>
                <?php elseif(!$video->canBeAccessed(Auth::user())): ?>
                    <div class="video-placeholder">
                        <div class="video-placeholder__header">
                            This video is private.
                        </div>
                    </div>
                <?php endif; ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4><?php echo e($video->title); ?></h4>
                        
                        <div class="pull-right">
                            <div class="video__views">
                                <?php echo e($video->viewCount()); ?> <?php echo e(str_plural('view', $video->viewCount())); ?>

                            </div>
                            
                            <?php if($video->votesAllowed()): ?>
                                <video-voting video-uid="<?php echo e($video->uid); ?>"></video-voting>
                            <?php endif; ?>
                        </div>

                        <div class="media">
                            <div class="media-left">
                                <a href="/channel/<?php echo e($video->channel->slug); ?>">
                                    <img src="<?php echo e($video->channel->getImage()); ?>" alt="<?php echo e($video->channel->name); ?> image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="/channel/<?php echo e($video->channel->slug); ?>" class="media-heading"><?php echo e($video->channel->name); ?></a>
                                <subscribe-button channel-slug="<?php echo e($video->channel->slug); ?>"></subscribe-button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if($video->description): ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php echo nl2br(e($video->description)); ?>

                        </div>
                    </div>
                <?php endif; ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php if($video->commentsAllowed()): ?>
                            <video-comments video-uid="<?php echo e($video->uid); ?>"></video-comments>
                        <?php else: ?>
                            <p>Comments are disabled for this video.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?php echo e($user->username); ?></h3>

                <?php if(Auth::user()->isNot($user)): ?>
                    <?php if(Auth::user()->isFollowing($user)): ?>
                        <a href="<?php echo e(route('user.unfollow', $user)); ?>">Unfollow</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('user.follow', $user)); ?>">Follow</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
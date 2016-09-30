<?php if($user->social->count() > 1): ?>
    <p>You have the following social accounts linked with us:</p>
    <ul>
        <?php $__currentLoopData = $user->social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li>
                <?php echo e(config("social.services.{$social->service}.name")); ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
<?php endif; ?>

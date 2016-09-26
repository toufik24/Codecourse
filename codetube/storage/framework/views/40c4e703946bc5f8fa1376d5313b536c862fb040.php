<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Channel settings</div>

                    <div class="panel-body">
                        <form action="/channel/<?php echo e($channel->slug); ?>/edit" method="post" enctype="multipart/form-data">
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name') ? old('name') : $channel->name); ?>">

                                <?php if($errors->has('name')): ?>
                                    <div class="help-block">
                                        <?php echo e($errors->first('name')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                                <label for="slug">Unique URL</label>

                                <div class="input-group">
                                    <div class="input-group-addon"><?php echo e(config('app.url')); ?>/channel/</div>
                                    <input type="text" class="form-control" id="slug" name="slug" value="<?php echo e(old('slug') ? old('slug') : $channel->slug); ?>">
                                </div>

                                <?php if($errors->has('slug')): ?>
                                    <div class="help-block">
                                        <?php echo e($errors->first('slug')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"><?php echo e(old('description') ? old('description') : $channel->description); ?></textarea>

                                <?php if($errors->has('description')): ?>
                                    <div class="help-block">
                                        <?php echo e($errors->first('description')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="image">Channel image</label>
                                <input type="file" name="image" id="image">
                            </div>

                            <button class="btn btn-default" type="submit">Update</button>

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit video "<?php echo e($video->title); ?>"</div>

                    <div class="panel-body">
                        <form action="/videos/<?php echo e($video->uid); ?>" method="post">

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title') ? old('title') : $video->title); ?>">

                                <?php if($errors->has('title')): ?>
                                    <div class="help-block">
                                        <?php echo e($errors->first('title')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"><?php echo e(old('description') ? old('description') : $video->description); ?></textarea>

                                <?php if($errors->has('description')): ?>
                                    <div class="help-block">
                                        <?php echo e($errors->first('description')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('visibility') ? ' has-error' : ''); ?>">
                                <label for="visibility">Visibility</label>
                                <select name="visibility" id="visibility" class="form-control">
                                    <?php $__currentLoopData = ['public', 'unlisted', 'private']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visibility): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($visibility); ?>"<?php echo e($video->visibility == $visibility ? ' selected="selected"' : ''); ?>><?php echo e(ucfirst($visibility)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>

                                <?php if($errors->has('visibility')): ?>
                                    <div class="help-block">
                                        <?php echo e($errors->first('visibility')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="allow_votes">
                                    <input type="checkbox" name="allow_votes" id="allow_votes"<?php echo e($video->votesAllowed() ? ' checked="checked"' : ''); ?>> Allow votes
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="allow_comments">
                                    <input type="checkbox" name="allow_comments" id="allow_comments"<?php echo e($video->commentsAllowed() ? ' checked="checked"' : ''); ?>> Allow comments
                                </label>
                            </div>

                            <button type="submit" class="btn btn-default">Update</button>

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
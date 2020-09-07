<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <?php if(session('success')): ?> 
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

        <!-- if a post is deleted -->
        <?php if(session('danger')): ?> 
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session('danger')); ?>

                </div>
            <?php endif; ?>


        <form action="<?php echo e(route('publication.create')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card gedf-card">
                  <div class="card-header">
                      Create a new post
                  </div>
                  <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="publications" role="tabpanel" aria-labelledby="publications-tab">
                            <div class="form-group">
                              <label for="title">Title :</label>
                              <input type="text" name="title" placeholder="Publication Title" class="form-control" value="<?php echo e(old('title')); ?>">
                              <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                              <label for="message">Body :</label>
                              <textarea name="body" class="form-control" id="message" rows="3" placeholder="What are you thinking?"><?php echo e(old('body')); ?></textarea>
                              <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                          </div>
                      </div>
                      <div class="btn-toolbar justify-content-between">
                          <div class="btn-group">
                              <button type="submit" class="btn btn-primary">share</button>
                          </div>
                      </div>
                  </div>
                </div>
            </form>


        <h1 class="my-4">Publications</h1>
 
            <?php $__empty_1 = true; $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo e($publication->title); ?></h2>
                        <p class="card-text"><?php echo e($publication->body); ?></p>
                        
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?php echo e($publication->created_at); ?> by <?php echo e($publication->user->email); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-danger">No Posts for now.</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\essaie\resources\views/home.blade.php ENDPATH**/ ?>
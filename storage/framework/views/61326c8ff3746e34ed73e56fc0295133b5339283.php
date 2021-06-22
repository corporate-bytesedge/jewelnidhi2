<div class="panel panel-default"> <div class="panel-heading"> <?php echo app('translator')->getFromJson('View Banners'); ?> </div> <div class="panel-body"> <form id="delete-form" action="delete/banners" method="post" class="form-inline"> <div class="row"> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Banner::class)): ?> <?php echo e(csrf_field()); ?> <div class="col-md-4"> <div class="text-muted"> <label for="checkboxArray"><?php echo app('translator')->getFromJson('Bulk Options'); ?> <i class="fa fa-cog" aria-hidden="true"></i></label> </div> <input type="hidden" name="_method" value="DELETE"> <div class="form-group"> <select id="checkboxArray" name="checkboxArray" class="form-control"> <option value=""><?php echo app('translator')->getFromJson('Delete'); ?></option> </select> </div> <div class="form-group"> <input id="delete_all" name="" class="btn fa btn-warning" value="&#xf1d8;" onclick=" if(confirm('<?php echo e(__('Are you sure you want to delete selected banners?')); ?>')) { $('#delete_all').attr('name', 'delete_all'); event.preventDefault(); $('#delete-form').submit(); } else { event.preventDefault(); } " > </div> </div> <?php endif; ?> <div class="advanced-search col-md-<?php echo e(Auth::user()->can('delete', App\Banner::class) ? '8' : '8 col-md-offset-4'); ?>"> </div> </div> <div class="table-responsive"> <table class="display table table-striped table-bordered table-hover" id="banners-table"> <thead> <tr> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Banner::class)): ?> <th><input type="checkbox" id="options"></th> <?php endif; ?> <th><?php echo app('translator')->getFromJson('Image'); ?></th> <th><?php echo app('translator')->getFromJson('Title'); ?></th> <th><?php echo app('translator')->getFromJson('Status'); ?></th> <th><?php echo app('translator')->getFromJson('Created'); ?></th> <?php if((Auth::user()->can('update', App\Banner::class)) || (Auth::user()->can('delete', App\Banner::class))): ?> <th><?php echo app('translator')->getFromJson('Action'); ?></th> <?php endif; ?> </tr> </thead> <tbody> <?php if($banners): ?> <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <tr> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Banner::class)): ?> <td><input class="checkboxes" type="checkbox" name="checkboxArray[]" value="<?php echo e($banner->id); ?>"></td> <?php endif; ?> <td> <?php if($banner->photo): ?> <?php
                                            $image_url = \App\Helpers\Helper::check_image_avatar($banner->photo->name, 50);
                                        ?> <img src="<?php echo e($image_url); ?>" height="50px" alt="<?php echo e($banner->title); ?>" /> <?php else: ?> <img src="https://via.placeholder.com/50x50?text=No+Image" height="50px" alt="<?php echo e($banner->title); ?>" /> <?php endif; ?> </td> <td><?php echo e($banner->title); ?></td> <td><?php echo e($banner->is_active ? __('Active') : __('Inactive')); ?></td> <td><?php echo e($banner->created_at); ?></td> <?php if((Auth::user()->can('update', App\Banner::class)) || (Auth::user()->can('delete', App\Banner::class))): ?> <td> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', App\Banner::class)): ?> <a class="btn btn-primary btn-sm" href="<?php echo e(route('manage.banners.edit', $banner->id)); ?>"> <i class="fa fa-pencil"></i> </a> <?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Banner::class)): ?> <input type="hidden" id="delete_single" name=""> <a class="btn btn-danger btn-sm" href="" onclick=" if(confirm('Are you sure you want to delete this?')) { $('#delete_single').attr('name', 'delete_single').val(<?php echo e($banner->id); ?>); event.preventDefault(); $('#delete-form').submit(); } else { event.preventDefault(); } " > <i class="fa fa-trash-o"></i> </a> <?php endif; ?> </td> <?php endif; ?> </tr> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> </tbody> </table> </div> </form> </div> </div>
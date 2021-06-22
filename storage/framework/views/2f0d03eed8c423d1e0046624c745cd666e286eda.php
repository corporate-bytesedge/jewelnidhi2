 <div class="panel panel-default"> <div class="panel-body"> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Order::class)): ?> <form id="delete-form" action="delete/orders" method="post" class="form-inline"> <?php echo e(csrf_field()); ?> <?php endif; ?> <div class="bulk-options"> <label for="checkboxArray"><?php echo app('translator')->getFromJson('Bulk Options'); ?> <i class="fa fa-cog" aria-hidden="true"></i></label> <div class="delete-option"> <?php if(Auth::user()->can('delete', App\Product::class) || isset($vendor)): ?> <div class=""> <input type="hidden" name="_method" value="DELETE"> <button type="button" id="delete_all" name="delete_all" class="btn btn-warning" onclick=" if(confirm('<?php echo app('translator')->getFromJson('Are you sure you want to delete selected orders?'); ?>')) { $('#delete_all').attr('name', 'delete_all'); event.preventDefault(); $('#delete-form').submit(); } else { event.preventDefault(); } ">Delete</button> </div> <?php endif; ?> </div> </div> <div class="search-section"> <label for="search"><?php echo app('translator')->getFromJson('Search'); ?></label> <?php if(!\Auth::user()->isApprovedVendor()): ?> <div class="form-group"> <select class="form-control" id="Vendors"> <option value=""><?php echo app('translator')->getFromJson('Select vendor'); ?></option> <?php if(count($vendor) > 0): ?> <?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> </select> </div> <?php endif; ?> <div class="form-group"> <select class="form-control" id="orderStatus"> <option value=""><?php echo app('translator')->getFromJson('Select status'); ?></option> <option value="0">Pending</option> <option value="1">Refunded</option> <option value="2">Cancelled</option> <option value="3">Delivered</option> </select> </div> <div class="form-group"> <input class="form-control" type="text" id="search-by-column" placeholder="<?php echo app('translator')->getFromJson('Search by Order No'); ?>"> </div> <a href="javascript:void(0);" class="btn btn-primary btn-sm Search"><span class="advanced-search-toggle" style="color:#fff;"><?php echo app('translator')->getFromJson('Search'); ?></span></a> </div> <div class="table-responsive"> <table class="display table table-striped table-bordered table-hover" id="orders-table"> <thead> <tr> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Order::class)): ?> <th><input type="checkbox" id="options"></th> <?php endif; ?> <th>Order No</th> <th>Order Date</th> <th>Customer Name</th> <th>Payment Status</th> <th>Order Status</th> <th>Total</th> <th>Invoice</th> <th>Action</th> </tr> </thead> <tbody></tbody> <tfoot> <tr> <th colspan="6" >Total:</th> <th></th> </tr> </tfoot> </table> </div> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', App\Order::class)): ?> </form> <?php endif; ?> </div> </div>
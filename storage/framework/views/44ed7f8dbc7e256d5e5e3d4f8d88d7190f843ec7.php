 <div class="panel panel-default"> <?php if(Session::has('product_updated')): ?> <p class="alert <?php echo e(Session::get('alert-class', 'alert-success')); ?>"><?php echo e(Session::get('product_updated')); ?></p> <?php endif; ?> <div class="panel-body"> <form id="approved-form" action="approve/approved_products" method="post" class="form-inline"> <div class="bulk-options"> <label for="checkboxArray"><?php echo app('translator')->getFromJson('Bulk Options'); ?> <i class="fa fa-cog" aria-hidden="true"></i></label> <div class="delete-option"> <?php if(Auth::user()->can('delete', App\Product::class) || isset($vendor)): ?> <?php echo e(csrf_field()); ?> <div class=""> <button type="button" id="approve_all" name="" class="btn btn-warning" onclick=" if(confirm('<?php echo app('translator')->getFromJson('Are you sure you want to approved selected products?'); ?>')) { $('#approve_all').attr('name', 'delete_all'); event.preventDefault(); $('#approved-form').submit(); } else { event.preventDefault(); } ">Approved </button> </div> <?php endif; ?> </div> </div> <div class="table-responsive"> <table class="display table table-striped table-bordered table-hover" id="products-table"> <thead> <tr> <?php if(Auth::user()->can('delete', App\Product::class) ): ?> <th><input type="checkbox" id="options"></th> <?php endif; ?> <th><?php echo app('translator')->getFromJson('Vendor'); ?></th> <th><?php echo app('translator')->getFromJson('Category'); ?></th> <th><?php echo app('translator')->getFromJson('Style'); ?></th> <th><?php echo app('translator')->getFromJson('Photo'); ?></th> <th><?php echo app('translator')->getFromJson('Name'); ?></th> <th><?php echo app('translator')->getFromJson('Price'); ?></th> <th><?php echo app('translator')->getFromJson('Status'); ?></th> <th><?php echo app('translator')->getFromJson('Approved'); ?></th> <th><?php echo app('translator')->getFromJson('Action'); ?></th> </tr> </thead> <tbody> </tbody> </table> </div> </form> </div> </div> <div id="ex1" class="modal" style="max-width:800px;"> <div id="GroupMsg"></div> <form role="form" name="groupform" id="groupform" > <?php echo Form::hidden('product_id', null, ['class'=>'form-control','id'=>'product_id']); ?> <?php echo Form::hidden('group_by', null, ['class'=>'form-control','id'=>'group_by']); ?> <div class="card-body"> <div class="form-group"> <?php echo e(Form::checkbox('size', '10', false,['id'=>'sizeGroup','class'=>'Group'])); ?> <label for="size">Size</label> <?php echo e(Form::checkbox('purity', '9', false,['id'=>'purityGroup','class'=>'Group'])); ?> <label for="purity">Purity</label> <div class="row"> <div class="col-sm-12 col-md-12"> <div id="sizeGroupHtml"> <table class="table table-bordered"> <thead> <tr> <th colspan="5"> <center>Product Detail</center> </th> </tr> <tr> <th>#</th> <th>Product</th> <th>Purity</th> <th>Size</th> <th>Default</th> </tr> </thead> <tbody id="GroupValue"> </tbody> </table> </div> </div> </div> </div> <div class="card-footer"> <button type="button" id="saveGroup" class="btn btn-primary">Submit</button> </div> </form> </div>
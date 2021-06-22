<div class="row"> <div class="col-xs-12 col-sm-10 col-md-8"> <?php if(session()->has('vendor_created')): ?> <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> <strong><?php echo e(session('vendor_created')); ?></strong> </div> <?php endif; ?> <?php if(session()->has('vendor_not_created')): ?> <div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> <strong><?php echo e(session('vendor_not_created')); ?></strong> </div> <?php endif; ?> <?php echo $__env->make('includes.form_errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo Form::open(['method'=>'post', 'action'=>'ManageVendorsController@store', 'onsubmit'=>'submit_button.disabled = true; submit_button.value = "' . __('Please Wait...') . '"; return true;']); ?> <br> <div id="existing_form"> <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>"> <?php echo Form::label('name', __('Name:')); ?> <em style="color:red;">*</em> <?php echo Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>__('Enter name'), 'required']); ?> </div> <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>"> <?php echo Form::label('email', __('Email:')); ?> <em style="color:red;">*</em> <?php echo Form::email('email', old('email'), ['class'=>'form-control', 'placeholder'=>__('Enter email')]); ?> </div> <div class="form-group"> <?php echo Form::label('verified', __('Email Status:')); ?> <?php echo Form::select('verified', [true=>__('verified'), false=>__('unverified')], null, ['class'=>'form-control selectpicker', 'data-style'=>'btn-default']); ?> </div> <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>"> <?php echo Form::label('password', __('Password:')); ?> <em style="color:red;">*</em> <?php echo Form::password('password', ['class'=>'form-control', 'placeholder'=>__('Enter password'), 'required']); ?> </div> <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>"> <?php echo Form::label('password_confirmation', __('Confirm Password:')); ?> <em style="color:red;">*</em> <?php echo Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>__('Enter confirm password'), 'required']); ?> </div> </div> <hr> <h4><?php echo app('translator')->getFromJson('Vendor Details'); ?></h4> <br> <div class="form-group<?php echo e($errors->has('shop_name') ? ' has-error' : ''); ?>"> <?php echo Form::label('shop_name', __('Shop Name:')); ?> <em style="color:red;">*</em> <?php echo Form::text('shop_name', old('shop_name'), ['class'=>'form-control', 'placeholder'=>__('Enter shop name'), 'required']); ?> </div> <div class="form-group<?php echo e($errors->has('company_name') ? ' has-error' : ''); ?>"> <?php echo Form::label('company_name', __('Company Name:')); ?> <em style="color:red;">*</em> <?php echo Form::text('company_name', old('company_name'), ['class'=>'form-control', 'placeholder'=>__('Enter company name'), 'required']); ?> </div> <div class="form-group<?php echo e($errors->has('phone_number') ? ' has-error' : ''); ?>"> <?php echo Form::label('phone_number', __('Phone:')); ?> <em style="color:red;">*</em> <?php echo Form::text('phone_number', old('phone_number'), ['class'=>'form-control phone_number','id'=>'phone_number', 'maxlength'=>"10", 'placeholder'=>__('Enter phone number')]); ?> </div> <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>"> <?php echo Form::label('description', __('Description:')); ?> <?php echo Form::textarea('description', old('description'), ['class'=>'form-control', 'placeholder'=>__('Enter description'), 'rows'=>'6']); ?> </div> <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>"> <?php echo Form::label('address', __('Address:')); ?> <?php echo Form::text('address', old('address'), ['class'=>'form-control', 'placeholder'=>__('Enter address')]); ?> </div> <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>"> <?php echo Form::label('city', __('City:')); ?> <?php echo Form::text('city', old('city'), ['class'=>'form-control', 'placeholder'=>__('Enter city')]); ?> </div> <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>"> <?php echo Form::label('state', __('State:')); ?> <?php echo Form::text('state', old('state'), ['class'=>'form-control', 'placeholder'=>__('Enter state')]); ?> </div> <div class="form-group"> <?php echo Form::label('status', __('Status:')); ?> <?php echo Form::select('status', [0=>__('inactive'), 1=>__('active')], 1, ['class'=>'form-control selectpicker', 'data-style'=>'btn-default']); ?> </div> <div class="form-group"> <?php echo Form::submit(__('Add Vendor'), ['class'=>'btn btn-primary btn-block', 'name'=>'submit_button']); ?> </div> <?php echo Form::close(); ?> </div> </div>
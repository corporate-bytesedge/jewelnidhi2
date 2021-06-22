<div class="row">
	<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
		<?php echo Form::open(['method'=>'post', 'action'=>'SendVerificationSMS@verifyOtp', 'id'=>'verify-otp-form']); ?>

		<div class="form-group">
		    <?php echo Form::text('code', null, ['class'=>'form-control', 'placeholder'=>'Enter verification code sent to your phone', 'required']); ?>

		</div>
		    <?php echo Form::submit('Verify', ['class'=>'btn btn-sm pull-right btn-primary', 'name'=>'submit_button', 'id'=>'verify-otp-btn']); ?>

		    <div class="clearfix"></div>
		<?php echo e(Form::close()); ?>

        <div class="verification-feedback-alert">
            <br>
            <div class="alert alert-info" role="alert">
                <span class="verification-feedback"></span>
            </div>
        </div>
	</div>
</div>

<script>
        var verifyOtpBtn = $('#verify-otp-btn');
        var verificationFeedback = $('.verification-feedback');
        var verificationFeedbackAlert = $('.verification-feedback-alert');
        verificationFeedbackAlert.hide();
        $(document).on('submit', '#verify-otp-form', function(e) {

            e.preventDefault();
            var data = $(this).serialize();
            var url = $(this).attr('action');

            verifyOtpBtn.attr("disabled", "disabled");

            $.post(url, data, function(receivedData) {
                if(!receivedData.error) {
                    if(receivedData.verified) {
                        verificationFeedback.html('<?php echo app('translator')->getFromJson('Verified successfully.'); ?>');
                        $('#verify-otp-form').remove();
                        $('.verify-phone-block').remove();
                        window.location = "<?php echo e(route('front.settings.profile')); ?>";
                    } else {
                        if(receivedData.redirect) {
                            window.location.reload();
                        }
                        verificationFeedback.html('<?php echo app('translator')->getFromJson('Incorrect verification code. Please try again.'); ?>');
                    }
                    verificationFeedbackAlert.show();
                } else {
                    verificationFeedbackAlert.show();
                    verificationFeedback.html('<?php echo app('translator')->getFromJson('Something went wrong.'); ?>');
                }

                verifyOtpBtn.removeAttr("disabled");
            });

        });
</script>
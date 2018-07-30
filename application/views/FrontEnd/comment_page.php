<div class="banner" style="margin-left: 15px;">
  <div class="container">
    <div class="row m-0">
      <div class="col-md-3"></div>
      <div class="col-md-9 p-0" style="">

		<div class="row" style="margin-top: 10px;">
          <div class="col-xs-12">
            <div class="heading-part heading-bg mb-30">
              <h2 class="heading m-0">Write your comment</h2>
            </div>
          </div>
        </div>

		<div class="row" style="">
          <div class="col-xs-12" style="margin-top: -20px;">
           	<div class="main-form">
		        <div class="row">
		          <form id="contactform" action="<?php echo base_url(); ?>postComment" method="POST" name="contactform" enctype="multipart/form-data">
		            <div class="col-xs-8 mb-30">
		              <textarea required="required" placeholder="Write your Comment here" rows="3" cols="30" name="comment"></textarea>
		              <span style="font-size: 12px; color: red;"><?php echo form_error('comment'); ?></span>
		            </div>
		            <div class="col-xs-8" style="margin-top: -15px;">
		                <button type="submit" style="float: right;" name="submit" class="btn-color">COMMENT</button>
		            </div>
		          </form>

		          <div class="col-xs-12" style="margin-top: 10px;">
		               <?php foreach($fatchComment as $comment): ?>
	               			<div style="color: #000; border-bottom:1px solid #ccc;">
	               				<div style="margin-top: 15px;">
	               					<b style="color: #DA2A62;"><?php echo $comment->u_name; ?></b> &nbsp;&nbsp;
	               					<b style="color: #DA2A62;">( <?php echo $comment->date; ?> )</b>
	               				</div>
	               				<div style="margin-bottom: 15px;"> 
	               					<?php echo $comment->comment; ?>
	               				</div>
	               			</div>
		               	<?php endforeach;   ?>
		          </div>


		        </div>
		      </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
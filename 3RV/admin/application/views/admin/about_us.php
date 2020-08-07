<!-- main header end -->
<?php $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php $this->load->view('include/sidebar');?>
<!-- main sidebar end -->

<?php if(isset($rsdata))
{
	foreach($rsdata->result() as $data)
	{
	  $pk=$data->pk;
	  $cms_title=$data->cms_title;
	  $cms_desc=$data->cms_desc;
	  $is_active=$data->is_active;
	}
}else
{
	  $pk="";
	  $cms_title="";
	  $cms_desc="";
	  $is_active="";

}?>

<div id="page_content">
	<div id="page_heading">
	<h1>About Us</h1>
	</div>
  <div id="page_content_inner">
    <!--<h3 class="heading_b uk-margin-bottom">Add CMS </h3>-->
	           
    <div class="md-card">
		<div class="md-card-content">
		<div class="uk-grid" data-uk-grid-margin >
		
				<div class="uk-width-medium-1-1">
					<div  id="message_div">
					
					</div>
        			<form method="post" id="cms"  name="cms"  action="">
					<input type="hidden" name="pk" id="pk" value="<?php echo $pk;?>" />
					
					<div class="uk-form-row">
					<label>About Us<span class="req">*</span></label> <br />
     				<textarea contenteditable="true" id="wysiwyg_ckeditor"  class="md-input"  cols="30"  rows="20"  name="message"><?php echo $cms_desc;?></textarea>
					</div>
			
					<div class="uk-form-row" >
<!--					<a  id="submit_cms" class="md-btn md-btn-primary" >Submit</a>
-->					<button type="button" id="submit_cms" class="md-btn md-btn-primary">Submit</button>
					</div>
					</form>
				</div>  
		  </div><!--uk-grid--->
       </div><!--mdcardcontente--->
   </div>
</div>
</div>
 <?php $this->load->view('include/footer');?><!-- page specific plugins -->
 <script>
 $(function(){
 $('#wysiwyg_ckeditor').ckeditor({
  allowedContent: {
			$1: {
					
					attributes: true,
					styles: true,
					classes: true,
			  }
		}
 });
 
 });
 		
 		$('#submit_cms').click(function(){
		var message=$("#wysiwyg_ckeditor").val();
		
			if(message=="")
			{
			 $("#message_error").text('');	
			 $("#cke_wysiwyg_ckeditor").after('<span class="uk-text-danger" id="message_error">Please enter About us </span>');	
			}else
			{
			 $("#message_error").text('');	
			}
			if(message!="" )
			{
			   var str = $("form").serialize();
				$.ajax({
					   	url:'<?php echo base_url();?>index.php/cms/save_cms',
						type: 'POST',
						cache:false,
						async: false,
						crossDomain: true,
						data:str,
						dataType: 'json',
					    success: function(data){
					     var data_html='';
						 if(data.success==1)
						 {
						  data_html+='<div class="uk-alert uk-alert-success" data-uk-alert=""><a href="#" class="uk-alert-close uk-close"></a>About Us saved sucessfully.</div>';
					 
						 
						 }else if(data.error==1)
						 {
						  data_html+='<div class="uk-alert uk-alert-danger" data-uk-alert=""><a href="#" class="uk-alert-close uk-close"></a>Error while saving data!!!!</div>';
						 
						 }
					   
					   $('#message_div').html(data_html);
					    
					   }
					    
				 });
					
			
			}
		});

		
var title_available = false;
function check_if_title_exists(username,pk) {
		$.ajax({
					   	url:'<?php echo base_url();?>index.php/cms/check_title_already_exist',
						type: 'POST',
						cache:false,
						async: false,
						crossDomain: true,
						data:{cms_title:username,pk:pk},
						dataType: 'json',
					    success: function(data){
					 				title_available = data;
					    }
					    });
					return title_available;
}

 </script>
     
<!--propert detail code start here-->
<?php echo $header; ?>
	<div class="breadmain">
		<div class="container">
			<ul class="breadcrumb">
				<?php foreach ($breadcrumbs as $breadcrumb) { ?>
				<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } ?>
			</ul>
			<h3><?php echo $heading_title; ?></h3>
		</div>
	</div>
<div class="listing">
	<div class="listing-map">
		<!--Map iframe starts here-->
			<div class="map" id="map" style="width: 100%; height: 500px;">
					</div>
		<!--Map iframe end here-->
	</div>
	<div class="container">
	  <?php if ($error_warning) { ?>
	  <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?></div>
	  <?php } ?>
	  <div class="row"><?php echo $column_left; ?>
		<?php if ($column_left && $column_footer5) { ?>
		<?php $class = 'col-sm-6'; ?>
		<?php } elseif ($column_left || $column_footer5) { ?>
		<?php $class = 'col-sm-8'; ?>
		<?php } else { ?>
		<?php $class = 'col-sm-12'; ?>
		<?php } ?>
		<div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
			<div class="thumb">
				    <div id="property-banner" class="property-banner">	
					<img src="<?php echo $image; ?>" alt="<?php echo $name;?>" title="<?php echo $name;?>" class="img-responsive"/>
					</div>
				
					<!--additional image code start here-->
				<div id="additional" class="owl-carousel">
					<?php if(!empty($propertyimagesbanners)){ ?>
						<?php foreach ($propertyimagesbanners as $propertyimagesbanner){?>
							<div class="item">
								<img src="<?php echo $propertyimagesbanner['imagesbanner'];?>" alt="<?php echo $propertyimagesbanner['title']?>" title="<?php echo  $propertyimagesbanner['title']?>" class="img-responsive"/>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
					<!--additional image code start here-->
				</div>
				
				<div class="listing-caption">
					<h4><a href="javascript:void(0)"><?php echo $name;?></a></h4>
					<div class="price">
						<span class="text"><?php echo $propertydetails_price;?>:</span>
						<?php echo $price;?>
					</div>
					<div class="sqft">
						<span class="text"> <?php echo $propertydetails_sqft;?>: <span class="sqno"><?php echo $area?></span> </span>
						<ul class="list-inline">
							<li><span class="bedrooms"></span> <?php echo $bedrooms;?></li>
							<li><span class="bathrooms"></span> <?php echo $bathrooms; ?></li>
						</ul>
					</div>
				</div>
				<?php if (!empty($featuress)) { ?> 
				<div class="listing-caption">
					<h3><?php echo $propertydetails_amenities;?></h3>
					<ul class="list-inline feat"> 
						<?php if (!empty($featuress)) { ?>  	
							<?php foreach($featuress as $feature) {?>
								<li><img src="<?php echo $feature['features'] ?>" alt="<?php echo $feature['name'] ?>" title="<?php echo $feature['name'] ?>" class="img-responsive"/> <?php echo $feature['name'];?></li>
							<?php } ?>	
						<?php } ?>	
					</ul>
				</div>
			<?php } ?>
			
			<?php if (!empty($nearest)) { ?> 
				<div class="listing-caption">
					<h3><?php echo $propertydetails_nearestplace;?></h3>
					<ul class="list-inline tags">
						<?php if (!empty($nearest)) { ?>  
							<?php foreach($nearest as $near) {?>
								<li><img src="<?php echo $near['nearplace'] ?>" alt="<?php echo $near['name'] ?>" title="<?php echo $near['name'] ?>" class="img-responsive"/></li>
							<?php }  ?>
						<?php }?>
					</ul>
				</div>
				<?php } ?>
				<div class="listing-caption">
					<h3><?php echo $propertydetails_description;?></h3>
					<p><?php echo $description;?></p>
				</div>
		
		  <?php echo $content_bottom; ?></div>
			<div class="col-sm-4 hidden-xs">
				<!--agent code start here-->
				<?php if(!empty($propertycontactagent)){?>
				<div class="ouragents">
					<h2><?php echo $propertydetails_contact; ?></h2>
					<div class="row">
						<div class="ouragent_detail">
							<div class="col-sm-12 col-xs-12 boxs">
								<div class="agentprofile">
									<?php if(isset($propertycontactagent)) { ?>
									<?php foreach ($propertycontactagent as $agent) { ?>
										<div class="image">
											<a href="<?php echo $agent['href'];?>"><img src="<?php echo $agent['agentimage'];?>" alt="Alena due" title="Alena due" class="img-responsive"></a>
										</div>
									<?php if(!empty($agent)==$agent['facebook'].$agent['twitter'].$agent['googleplus'].$agent['pinterest'].$agent['instagram']){?>
										<ul class="list-inline socialicon">
											<?php if($agent['facebook']){?>
											<li class="fb"><a href="<?php echo $agent['facebook']?>" target="new"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
											<?php } ?>
											<?php if($agent['twitter']){?>
											<li class="twitter"><a href="<?php echo $agent['twitter'];?>" target="new" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
											<?php }?>
											<?php if($agent['googleplus']){?>
											<li class="google"><a href="<?php echo $agent['googleplus'];?>" target="new" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i> </a></li>
											<?php } ?>
											<?php if($agent['pinterest']){?>
											<li class="pinterest"><a href="<?php echo $agent['pinterest'];?>" target="new" class="pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i> </a></li>
											<?php }?>
											<?php if($agent['instagram']){?>
											<li class="instagram"><a href="<?php echo $agent['instagram'];?>" target="new" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
											<?php } ?>
										</ul>
									<?php } ?>
										<div class="deatil">
											<div class="name"><?php echo $agent['agentname'];?></div>
											<div class="property"><div class="property"><?php echo $agent['propertyagent']?> <?php echo $propertydetails_property;?></div></div>
										</div>
									</div>
							<?php } ?>
							<?php } ?>
								<div class="contactnow" data-toggle="modal" data-target="#contactnow">
									<?php echo $propertydetails_contactnow; ?>
								</div>
								<!--modal code start here-->
								<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="contactnow">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<span class="close1"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></span>
											<div  class="boxmodal">
												<form class="form" method="post"  id="formproperty">
												
													<fieldset>
														<h4><?php echo $popupmessage_sendmsg; ?></h4>
														<div class="form-group required">
														<input type="text" name="nameagent" id="name" class="form-control" placeholder="<?php echo $entry_name; ?>">
														<div id="val-c"></div>
														</div>
													<input type="hidden" name="property_id" value="<?php echo $property_id;?>" id="property_id">
													<input type="hidden" name="property_agent_id" value="<?php echo $property_agent_id;?>" id="property_id">
														<div class="form-group required">
															<input type="text" name="emailagent" value="" class="form-control" placeholder="<?php echo $entry_email; ?>" id="emailagent">
														<div id="val-e"></div>
														</div>
														<div class="form-group required">
															<textarea name="description" rows="10" id="description"  class="form-control" placeholder="<?php echo $entry_msg; ?>"></textarea>
														<div id="val-d"></div>
														</div>
														<div class="buttons">
															<div class="pull-right">
																<button class="btn btn-primary" rel="<?php echo $property_agent_id;?>"  value="" type="button" id="enquerybutton"><?php echo $button_submit; ?></button>
															</div>
														</div>
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!--modal code end here-->
								<div id="msgs"></div>
							</div>
						</div>
					</div>
					<!--agent code end here-->
				</div>
			<?php } ?>
          <?php echo $column_footer5; ?>
			</div>
		</div>
	</div>
</div>
<script>
	$('#enquerybutton').click(function(){
		var property_agent_id = $(this).attr('rel');
		var c = $("#name").val();
		var e = $("#emailagent").val();
		var d = $("#description").val();
		if(c.length<2){
			$("#val-c").html("Name must be of 3 characters");
			$("#val-c").css("color", "red");
		}
		if(e.length<3){
			$("#val-e").html("E-Mail Address does not appear to be valid!");
			$("#val-e").css("color", "red");
		}
		if(d.length<10){
			$("#val-d").html("Name must be of 10 characters");
			$("#val-d").css("color", "red");
		}
		
		else{
			$.ajax({
				url: 'index.php?route=property/property_detail/Sendenquery&property_agent_id='+property_agent_id,
				type: 'post',
				data: $('input[name=\'nameagent\'],input[name=\'emailagent\'],input[name=\'property_id\'],textarea[name=\'description\']'),
				dataType: 'json',
				beforeSend: function() {
				},
				success: function(json) {
					if (json['success']) {
					$('#msgs').html("<div class='alert alert-success'>"+json['success']+"</div>");
						$("#val-c").html("");
						$("#val-d").html("");
						$("#val-e").html("");
						$("#description").val('');
						$("#emailagent").val('');
						$("#name").val('');
						$(".close").trigger("click");
					}
				}
			});
		}
	});

</script>
<script type="text/javascript">
$('#additional').owlCarousel({
	items : 5,
    itemsDesktop : [1199, 5],
    itemsDesktopSmall : [979, 3],
    itemsTablet : [768, 2],	
    itemsMobile : [479, 1],
	autoPlay: false,
	navigation: true,
	navigationText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>','<i class="fa fa-caret-right" aria-hidden="true"></i>'],
	pagination: false
});
</script>

<script>
      function initMap() {
        var myLatLng = {lat: <?php echo $latitude?>, lng: <?php echo $longitude?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: '<?php echo $name?> : <?php echo $local_area?> <?php echo $pincode?>  <?php echo $zone?> <?php echo $country?>'
        });
      }
	
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $mapkey;?>callback=initMap">
    </script>
<script type="text/JavaScript">
jQuery(document).ready(function() {
	jQuery(".owl-item .item img").click(function(){
		jQuery('.property-banner  img').attr('src',jQuery(this).attr('src'));
	});
	var imgSwap = [];
	 jQuery(".owl-item .item img").each(function(){
		imgUrl = this.src.replace();
		imgSwap.push(imgUrl);
	});
	jQuery(imgSwap).preload();
});
jQuery.fn.preload = function() {
    this.each(function(){
        jQuery('<img/>')[0].src = this;
    });
}
</script>	 

<?php echo $footer; ?>
<!--propert detail code end here-->




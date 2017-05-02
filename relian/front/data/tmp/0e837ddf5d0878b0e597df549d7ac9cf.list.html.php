<?php $this->display('inc/header.html', array (
)); ?>
<div class="container" id="container">
	<!--banner 开始-->
	<?php $this->display('inc/slide.html', array (
)); ?>
	<!--banner 结束-->
	<!--课程开始-->
	<div class="content">
		<div class="weui-navbar">
			<div class="weui-navbar__item"  onclick="$('.share_area').show().addClass('fadeIn');">
				<span><?php echo isset($this->_vars->area_title)?$this->_vars->area_title:'深圳全城' ; ?></span>
				<img class="unfold" src="<?php echo base_url() ; ?>static/image/unfold.png" />
			</div>
			<div class="weui-navbar__item" onclick="$('.share_course_item').show().addClass('fadeIn');">
				<span id="s_course">全部课程</span>
				<img class="unfold" src="<?php echo base_url() ; ?>static/image/unfold.png" />
			</div>
		</div>
		
		<div id="leftTabBox" class="tabBox">
				<div class="hd">
					<ul>
						<?php foreach($this->_vars->store as $this->_vars->key=>$this->_vars->val ) {  ?>
						<li <?php if($this->_vars->key == 0 ) {  ?>class="on"<?php } ?>><a href="#"><?php echo $this->_vars->val['name'] ; ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="bd">
						<?php foreach($this->_vars->store as $this->_vars->val ) {  ?>
						<?php if(! empty($this->_vars->coach[$this->_vars->val['id']]) ) {  ?>
						<ul>
							<?php foreach($this->_vars->coach[$this->_vars->val['id']] as $this->_vars->v ) {  ?>
							<li class="t" course-id="<?php echo $this->_vars->v['course_id'] ; ?>">
								<div class="pic"><img src="<?php echo $this->_vars->v['pic_persion'] ; ?>" /></div>
								<a class="yy" href="<?php echo base_url() ; ?>order/date/<?php echo $this->_vars->v['admin_id'] ; ?>">预约</a>
								<div class="con" _url="<?php echo base_url() ; ?>course/detail/<?php echo $this->_vars->v['admin_id'] ; ?>">
									<div class="tit">
									 	<?php echo $this->_vars->v['coach_name'] ; ?>
									 </div>
									<div class="ncon">
										<div>
											<?php foreach($this->_vars->v['course_tag'] as $this->_vars->value ) {  ?>
											<span><?php echo $this->_vars->value ; ?></span>
											<?php } ?>
										</div>
										<div>￥<?php echo $this->_vars->v['price'] ; ?>元/次 </div>
									</div>
								</div>
							</li>
							<?php } ?>
						</ul>
						<?php } else { ?>
						<ul>
						</ul>
						<?php } ?>
						<?php } ?>
				</div>
			</div>
 	</div>
	<!--课程结束-->
</div>
<div class="page-bd-15">
	<div class="weui-share share_area" onclick="$(this).fadeOut();$(this).removeClass('fadeOut')">
		<div id="course-area">
				<?php foreach($this->_vars->area as $this->_vars->key=>$this->_vars->value ) {  ?>
				<div class="item_title">
					<span><?php echo $this->_vars->value['name'] ; ?>市</span>
					<hr />
				</div>
				<div>
					<span class="course_item" key="<?php echo $this->_vars->key ; ?>"><?php echo $this->_vars->value['name'] ; ?>全城</span>
					<?php foreach($this->_vars->value['child'] as $this->_vars->k => $this->_vars->v ) {  ?>
				<?php if($this->_vars->k%3==2 ) {  ?><div><?php } ?>
					<span class="course_item" key="<?php echo $this->_vars->v['id'] ; ?>"><?php echo $this->_vars->v['name'] ; ?></span>
				<?php if($this->_vars->k%3==1 ) {  ?></div><?php } ?>
					<?php } ?>
				<?php } ?>
		</div>	
	</div>		
</div>
<div class="page-bd-15">
	<div class="weui-share share_course_item" onclick="$(this).fadeOut();$(this).removeClass('fadeOut')">
		<div id="course-item">
			<div class="item_title">
				<span>深圳全城-本周热门课程</span>
				<hr />
			</div>
			<div>
				<span class="course_item" key='0'>全部课程</span>
			<?php foreach($this->_vars->course as $this->_vars->key=>$this->_vars->value ) {  ?>
			<?php if($this->_vars->key%3==2 ) {  ?><div><?php } ?>
				<span class="course_item" key="<?php echo $this->_vars->value['id'] ; ?>"><?php echo $this->_vars->value['name'] ; ?></span>
			<?php if($this->_vars->key%3==1 ) {  ?></div><?php } ?>
			<?php } ?>
		</div>		
	</div> 
</div>
<?php $this->display('inc/footer.html', array (
)); ?>

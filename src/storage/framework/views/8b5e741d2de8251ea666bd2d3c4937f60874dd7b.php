<?php $__env->startSection('content'); ?>
<div ng-controller="foodController">
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font primary-color">รายการอาหาร</h2>
					<p>เมนูเด็ด เห็ดหอมอบซีอิ๊ว , สุกี้ยูนนาน , ขาหมูยูนาน</p>
				</div>
			</div>
			<div class="row">


			<?php foreach($data['menu'] as $menu): ?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo e($menu->image); ?>" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo e($menu->image); ?>" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?php echo e($menu->name); ?></h2>
							<p class="desc-menu"><?php echo e($menu->description); ?></p>
							<p><span class="price cursive-font"><?php echo e($menu->price); ?> บาท</span></p>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
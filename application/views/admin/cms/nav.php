<h1>Content Management</h1>
<div class="bar">
    <div class="text">Navigation Manager</div>
    <div class="cr"></div>
</div>
<div class="box"><br />
    <div class="row-title">
    	<div class="menu-name">Menu name</div>
        <div class="menu-func">Update</div>
    </div>
    <?php foreach($top as $menu) { ?>
    <div class="row-item">
    	<div class="menu-name"><?=$menu['name']?></div>
        <div class="menu-func"><a href="<?=base_url()?>admin/cms/navigation/update/<?=$menu['id']?>"><img src="<?=base_url()?>img/admin/view.png" /></a></div>
    </div>
    <?php } ?>
</div>

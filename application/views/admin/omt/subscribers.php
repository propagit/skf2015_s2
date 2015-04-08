<script>
function exportcsv() {
	window.location = '<?=base_url()?>admin/omt/exportsubscribers';
}
function vipcsv() {
	window.location = '<?=base_url()?>admin/omt/exportvip';
}
</script>
<h1>Online Marketing Tool</h1>
<div class="bar">
    <div class="text">Subscribers</div>
    <div class="cr"></div>
</div>

<div class="box">
	<input type="button" class="button rounded" value="Export to CSV" onclick="exportcsv()" />
</div>
<hr />
<div class="box bgw">
	<h3>VIP pack</h3>
    <p><input type="button" class="button rounded" value="Export to CSV" onclick="vipcsv()" />
</div>
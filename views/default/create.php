<div class="row">
    <?php echo $this->prepend; ?>
</div>
<fieldset class="col-md-12">
    <legend><?php echo $this->pageHeaders['create']; ?></legend>
<?php YedRender::boosterForm($this, $model); ?>
</fieldset>
<div class="row">
    <?php echo $this->append; ?>
</div>
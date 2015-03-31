 <html>
<?php echo $this->element('head'); ?>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>

    </div>
</div>
<!-- end page-wrapper -->
<?php echo $this->element('footer'); ?>

</body>
</html>
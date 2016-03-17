<?php
    if(!isset($lola) or $lola != 'js'){
        $lola = '../js';
    }
?>

<script src="<?php echo $lola  ?>/jquery-1.10.2.min.js"></script>
<script src="<?php echo $lola  ?>/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo $lola  ?>/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.ui.touch-punch.js"></script>
<script src="<?php echo $lola  ?>/modernizr.js"></script>
<script src="<?php echo $lola  ?>/bootstrap.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.cookie.js"></script>
<script src='<?php echo $lola  ?>/fullcalendar.min.js'></script>
<script src='<?php echo $lola  ?>/jquery.dataTables.min.js'></script>
<script src="<?php echo $lola  ?>/excanvas.js"></script>
<script src="<?php echo $lola  ?>/jquery.flot.js"></script>
<script src="<?php echo $lola  ?>/jquery.flot.pie.js"></script>
<script src="<?php echo $lola  ?>/jquery.flot.stack.js"></script>
<script src="<?php echo $lola  ?>/jquery.flot.resize.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.flot.time.js"></script>

<script src="<?php echo $lola  ?>/jquery.chosen.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.uniform.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.cleditor.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.noty.js"></script>
<script src="<?php echo $lola  ?>/jquery.elfinder.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.raty.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.iphone.toggle.js"></script>
<script src="<?php echo $lola  ?>/jquery.uploadify-3.1.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.gritter.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.imagesloaded.js"></script>
<script src="<?php echo $lola  ?>/jquery.masonry.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.knob.modified.js"></script>
<script src="<?php echo $lola  ?>/jquery.sparkline.min.js"></script>
<script src="<?php echo $lola  ?>/counter.min.js"></script>
<script src="<?php echo $lola  ?>/raphael.2.1.0.min.js"></script>
<script src="<?php echo $lola  ?>/justgage.1.0.1.min.js"></script>
<script src="<?php echo $lola  ?>/jquery.autosize.min.js"></script>
<script src="<?php echo $lola  ?>/retina.js"></script>
<script src="<?php echo $lola  ?>/jquery.placeholder.min.js"></script>
<script src="<?php echo $lola  ?>/wizard.min.js"></script>
<script src="<?php echo $lola  ?>/core.min.js"></script>
<script src="<?php echo $lola  ?>/charts.min.js"></script>
<script src="<?php echo $lola  ?>/custom.min.js"></script>

<?php
    if($lola == 'js'){
        echo "<script src='".$lola."/handler.js'></script>";
        echo "<script src='".$lola."/otro.js'></script>";
    }
?>

</body>
</html>
 <footer>Memory used : <?php echo $memory_used; ?></footer>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
 <script src="<?php echo $this->config['base_url']; ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="<?php echo $this->config['base_url']; ?>assets/js/jquery.form.js" type="text/javascript"></script>
 <?php if(isset($js_files) && is_array($js_files)){
 	foreach($js_files as $js_file){  
 		echo '<script src="'.$this->config['base_url'].'assets/js/'.$js_file.'.js" type="text/javascript"></script>';
 	}
 } 
 ?>
 <script src="<?php echo $this->config['base_url']; ?>assets/js/app.js" type="text/javascript"></script>
</body>
</html>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/timeline/style.css">

<!-- Content Start -->
<div class="main-content">
	<div class="main-content-inner">

         <!-- partial:index.partial.html -->
        <section class="intro">
          <div class="container">
            <h1>Vertical Timeline &darr;</h1>
          </div>
        </section>

        <section class="timeline">
          <ul>
            <?php
			 foreach($timelines as $each){
			?>
            <li>
              <div>
                <time><?php echo $each['created_at']?></time> 
				<h3><?php echo $each['subject']?></h3>  
				<?php echo $each['description']?>
              </div>
            </li>
            <?php
			 }
			?>
            
          </ul>
        </section>
        <!-- partial -->
          <script  src="<?php echo base_url(); ?>public/timeline/script.js"></script>
        
	</div>

</div>
<!-- Content End -->


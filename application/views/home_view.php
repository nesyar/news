
    <div class="content_area">
      
  
          <?php
          foreach ($news as $n ) {
            echo'
            <div class="main_content floatleft">
            <div class="left_coloum floatleft">
            <div class="single_left_coloum_wrapper">
            <div class="single_left_coloum floatleft"> 
            <img src="'.base_url().'uploads/' .$n->image.'" width="150" height="150" />
              <h3>'.$n->title.'</h3>
            
              <a class="readmore" href="'.base_url().'home/detail/'.$n->id.'">read more</a> </div>
             </div>
  </div>
          </div>
';
          }
          ?>
            
        
    
    
    </div>
    
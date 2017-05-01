<? $this->load->view('components/page_head.php'); ?>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 logo">
	<a href="/"><img  src="<? echo config_item('sitedescription'); ?>" /></a>
				
                </div>
                <nav class="col-sm-8">
                    <ul>
<li><a class="btn btn-success" href="/">Главная</a></li>
<?php foreach($pages as $page): ?>
         <li><a class="btn btn-success" href="/page/<? echo $page['id']; ?>"><? echo $page['title']; ?></a></li>
<? endforeach; ?>

					
<li><a class="btn btn-currency" href="javascript:;" onclick="price_rub();">RUB</a></li><li><a style="border-left:0" class="btn btn-currency" href="javascript:;" onclick="price_dlr();">USD</a></li></ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="container">
             <? $this->load->view($subview); ?>
    </div>	

        
        <div class="row foot">
            <div class="col-lg-12">
                <span class="footcopy"></span>
            </div>
        </div>

    <div class="footer_main">
        <div class="container footer_sub_div">
            <p class="text-muted footer_p" style="text-shadow: 1px 1px 0 orange,
               1px -1px 0 orange,
               -1px 1px 0 orange,
              -1px -1px 0 orange;
  color: white;
  transition: all 1s;
  }
  
        </div>
    </div>

<? $this->load->view('components/page_foot.php'); ?>
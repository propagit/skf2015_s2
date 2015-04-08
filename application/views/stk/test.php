<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/stk.css">

<!--<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery.easing.1.3.js"></script>
<div id="filter-container">
       <div class="white-heading" style="font-size:22px;color:#fff">AUSTRALIA'S TOP 100 SHORT FILMS</div>
       <div id="filter-menu">
       
       <!--
       <table style="color:#40c8f4" width="100%" cellpadding="10" cellspacing="0">
        <tr style="background:#585eab;height:20px;text-align:center">
         <td width="113">TUESDAY 22 MAY</td>
         <td style="background:#211D70;" width="3">&nbsp;</td>
         <td width="113">WEDNESDAY 23 MAY</td>
         <td style="background:#211D70;" width="3">&nbsp;</td>
         <td width="113">THURSDAY 24 MAY</td>
         <td style="background:#211D70;" width="3">&nbsp;</td>
         <td width="113">FRIDAY 25 MAY</td>
        <td style="background:#211D70;" width="3">&nbsp;</td>
         <td width="113">SATURDAY 26 MAY</td>
         <td style="background:#211D70;" width="3">&nbsp;</td>
         <td width="113">SUNDAY 27 MAY</td>
        </tr>
       </table>
       -->
       </div>
       <div style="clear:both"></div>
       <div id="filter-menu2" style="margin-top:3px">
      
       <!--
       <table style="color:#40c8f4" width="100%" cellpadding="10" cellspacing="0">
        <tr style="background:#585eab;height:20px;text-align:center;">
         <td width="85">DRAMA</td>
         <td style="background:#211D70;" width="2">&nbsp;</td>
         <td width="85">COMEDY</td>
         <td style="background:#211D70;" width="2">&nbsp;</td>
         <td width="85">THRILLER</td>
         <td style="background:#211D70;" width="2">&nbsp;</td>
         <td width="85">HORROR</td>
        <td style="background:#211D70;" width="2">&nbsp;</td>
         <td width="85">ANIMATION</td>
         <td style="background:#211D70;" width="2">&nbsp;</td>
         <td width="85">DOCUMENTARY</td>
         <td style="background:#211D70;" width="2">&nbsp;</td>
         <td width="85">SCIENCE FICTION</td>
         <td style="background:#211D70;" width="2">&nbsp;</td>
         <td width="85">CHILDRENS</td>
        </tr>
       </table>
       -->
       </div>
        <div style="clear:both"></div>
       <div id="film-container" style="margin-top:10px">

         <ul id="films-all">
           <? foreach($top_films as $f)
		   {
			   $film_sessions = $this->film_model->get_sessions($f['id']);
			   $film_genre = $this->film_model->get_film_genres($f['id']);
			   ?>
               <li data-tags="<? echo $film_genre[0]['name'].',';for($i=0;$i<count($film_sessions);$i++) { echo date('l d M',strtotime($film_sessions[$i]['time'])); if($i>(count($film_sessions)-1)) { echo ',';}}?>"><img src="<?=base_url()?>uploads/films/thumbnails/<?=$f['large_image']?>" width="66px" height="50px" title="" alt="" /></li>
           <?
           }
           ?>
           
         </ul>
       </div>
     </div>
   
     <script src="<?=base_url()?>js/script.js" type="text/javascript"></script>
     <script src="<?=base_url()?>js/jquery.quicksand.js" type="text/javascript"></script>
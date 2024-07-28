<?php  
$post_id = 3238; /* Homepage ID */
$row7_title_section = get_field('row7_title_section', $post_id);
$row7_btn = get_field('row7_cta_button', $post_id);
$titlediv = get_field('row7_title_section', $post_id);
$small_title = ( isset($titlediv['small_title']) && $titlediv['small_title'] ) ? $titlediv['small_title'] : '';
$large_title = ( isset($titlediv['large_title']) && $titlediv['large_title'] ) ? $titlediv['large_title'] : '';
$row7_column_content = get_field('row7_column_content', $post_id);

$btnTitle7 = (isset($row7_btn['title']) && $row7_btn['title']) ? $row7_btn['title'] : '';
$btnLink7 = (isset($row7_btn['url']) && $row7_btn['url']) ? $row7_btn['url'] : '';
$btnTarget7 = (isset($row7_btn['target']) && $row7_btn['target']) ? $row7_btn['target'] : '_self';

if( ($small_title || $large_title) ||  $row7_column_content ) { ?>
<div class="section row7_column_content">
  <div class="inner">

    <?php if ($small_title) { ?>
    <div class="headerTitle" data-aos="flip-up">
      <?php if ($small_title) { ?>
      <div class="small-title"><?php echo $small_title ?></div>
      <?php } ?>

      <?php if ($large_title) { ?>
      <div class="large-title"><?php echo $large_title ?></div>
      <?php } ?>
    </div>
    <?php } ?>

    <?php if ($row7_column_content) { ?>
    <div class="container">
      <div class="blocks-repeatable">
        <?php $x=1; 
        $count = count($row7_column_content);
        foreach ($row7_column_content as $v) { 
        $details = $v['details'];
        $clickthrough = $v['clickthrough'];
        $r7_btnTitle = (isset($clickthrough['title']) && $clickthrough['title']) ? $clickthrough['title'] : '';
        $r7_btnLink = (isset($clickthrough['url']) && $clickthrough['url']) ? $clickthrough['url'] : '';
        $r7_btnTarget = (isset($clickthrough['target']) && $clickthrough['target']) ? $clickthrough['target'] : '_self';
        $effect = 'fade-up';
        if($x==1) {
          $effect = 'fade-right';
        }
        else if($x==$count) {
          $effect = 'fade-left';
        }
        ?>
        <div class="infobox" data-aos="<?php echo $effect ?>">
          <?php if ($r7_btnLink) { ?>
           <a href="<?php echo $r7_btnLink ?>" class="inner" target="<?php echo $r7_btnTarget ?>"><?php echo $details ?></a> 
          <?php } else { ?>
            <div class="nolink inner"><?php echo $details ?></div>
          <?php } ?> 
        </div>
        <?php $x++; } ?>
      </div>

      <?php if ($btnTitle7 && $btnLink7) { ?>
      <div class="buttondiv"><a href="<?php echo $btnLink7 ?>" target="<?php echo $btnTarget7 ?>" class="button button-default wide"><?php echo $btnTitle7 ?></a></div>
      <?php } ?>
    </div>
    <?php } ?> 
  </div>
</div>
<?php } ?> 
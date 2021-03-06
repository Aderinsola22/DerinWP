<?php
/**
 * The template part for displaying post 
 *
 * @package Creative One Page
 * @subpackage creative-one-page
 * @since creative-one-page 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;
  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<div class="page-box p-3 my-3">
  <?php if(get_theme_mod('creative_one_page_blog_post_description_option') != 'Full Content'){ ?>
    <div class="box-img">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
    </div>
  <?php }?>
  <div class="new-text text-center">
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <div class="metabox">
      <?php if( get_theme_mod( 'creative_one_page_date_hide',true) != '') { ?>
        <span class="entry-date me-2"><i class="fa fa-calendar me-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('creative_one_page_metabox_separator_blog_post') ); ?>
      <?php } ?>
      <?php if( get_theme_mod( 'creative_one_page_author_hide',true) != '') { ?>
        <span class="entry-author me-2"><i class="fa fa-user me-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('creative_one_page_metabox_separator_blog_post') ); ?>
      <?php } ?>
      <?php if( get_theme_mod( 'creative_one_page_comment_hide',true) != '') { ?>
        <span class="entry-comments me-2"><i class="fas fa-comments me-2"></i><?php comments_number( __('0 Comments','creative-one-page'), __('0 Comments','creative-one-page'), __('% Comments','creative-one-page') ); ?></span>
      <?php } ?>
    </div>
    <?php if(get_theme_mod('creative_one_page_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content"><?php the_content();?></div>
    <?php }
    if(get_theme_mod('creative_one_page_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p class="my-3 mx-0 text-center"><?php $excerpt = get_the_excerpt(); echo esc_html( creative_one_page_string_limit_words( $excerpt, esc_attr(get_theme_mod('creative_one_page_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('creative_one_page_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('creative_one_page_button_text','READ MORE') != ''){ ?>
      <div class="read-more-btn my-3 mx-0">
        <a href="<?php the_permalink(); ?>" class="py-3 px-4"><?php echo esc_html(get_theme_mod('creative_one_page_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('creative_one_page_button_text','READ MORE'));?></span></a>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</div>
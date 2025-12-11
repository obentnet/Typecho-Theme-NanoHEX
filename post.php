<?php
/**
 * post.php
 * 
 * @author UEGEE
 * 
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

<div class="post-header">
    <div class="post-header-title"><?php $this->title() ?></div>
    <div class="post-header-infomation"><div class="post-header-time"><?php $this->date(); ?></div>
    <div class="post-header-class"><?php $this->category(','); ?></div>
</div>


</div>

<div class="post-main">
    <div class="article-main">
        <?php $this->content(); ?>
    </div>
</div>

<div class="comments">
    <?php $this->need('comments.php');?>
</div>
<?php
$this->need('includes/footer.php');
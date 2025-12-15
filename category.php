<?php
/**
 * 分类页面
 * 
 * @author uegee
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

<div class="class-info flex-1 max-w-5xl mx-auto w-full px-6 py-12 pb-32">
    <h1 style="font-size:2vh;">
    <?php $this->archiveTitle(array(
          'category'  =>  _t('分类 %s 下的文章')), '', ''); ?>
    </h1>
      
    <?php $this->widget('Widget_Archive@index', 'pageSize=6&type=category', 'mid=1')->to($new); ?>
    <?php while ($new->next()): ?>
        <article class="post-card" style="margin-top:2vh;">
            <div class="post-card-infomation">
                <a href="<?php $new->permalink(); ?>"><?php $new->title(); ?></a>
            </div>
        </article>
    <?php endwhile; ?>
</div>


<?php $this->need('includes/footer.php'); ?>
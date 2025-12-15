<?php
/**
 * 标签云页面
 * 
 * @author UEGEE (优化设计)
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>
<style>
    /* 标签云页面整体样式 */
.main-content {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
    text-align: center;
}

.page-title {
    font-size: 2.5em;
    margin-bottom: 10px;
    color: white;
}

.page-description {
    color: #666;
    margin-bottom: 40px;
}

/* 标签云容器 */
.tag-cloud {
    line-height: 2.5em; /* 控制行距，避免重叠 */
    text-align: center;
}

/* 标签链接基础样式 */
.tag-cloud a {
    display: inline-block;
    margin: 8px 12px;
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 20px;
    transition: all 0.3s ease;
    font-weight: bold;
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

/* 根据 split() 分级设置字体大小（1最小，30最大） */
.tag-cloud a.tag-size-1 { font-size: 0.9em; }
.tag-cloud a.tag-size-5 { font-size: 1.2em; }
.tag-cloud a.tag-size-10 { font-size: 1.5em; }
.tag-cloud a.tag-size-20 { font-size: 1.8em; }
.tag-cloud a.tag-size-30 { font-size: 2.2em; }

/* Hover 交互效果 */
.tag-cloud a:hover {
    transform: translateY(-5px) scale(1.1);
    box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    background: #f0f0f0;
}

/* 响应式调整 */
@media (max-width: 768px) {
    .tag-cloud a {
        margin: 6px 8px;
        padding: 4px 10px;
    }
    .tag-cloud a.tag-size-30 { font-size: 1.8em; }
}
</style>
<div class="main-content">
    <h1 class="page-title">标签云</h1>
    <p class="page-description">浏览所有标签（包括暂无文章的标签），热门标签显示更大</p>
    
    <div class="tag-cloud">
        <?php 
        // 移除 ignoreZeroCount=1 参数，即显示所有标签（包括0文章的）
        // 按文章数降序排列，限制200个（可根据需要调整 limit 值）
        $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&desc=1&limit=200')->to($tags); 
        ?>
        <?php if ($tags->have()): ?>
            <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>" 
                   class="tag-size-<?php $tags->split(1, 5, 10, 20, 30); ?>" 
                   style="color: rgb(<?php echo(mt_rand(50, 200)); ?>, <?php echo(mt_rand(50, 200)); ?>, <?php echo(mt_rand(50, 200)); ?>);"
                   title="<?php $tags->count(); ?> 篇文章">
                    <?php $tags->name(); ?> (<?php $tags->count(); ?>)
                </a>
            <?php endwhile; ?>
        <?php else: ?>
            <p>暂无标签</p>
        <?php endif; ?>
    </div>
</div>

<?php $this->need('includes/footer.php'); ?>
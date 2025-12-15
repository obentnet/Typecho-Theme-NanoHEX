<?php
/**
 * 链接页
 *
 * @package custom
 * @author  uegee
 * @version 1.0
 * @link    https://uegee.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

<style>
    /* 整体容器 */
    .post-link-container {
        margin: 0 auto;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background: #141414;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;
    }

    /* 头部区域 - 背景渐变从右往左 */
    .post-link-header {
        text-align: center;
        padding: 80px 20px 60px;
        width: 100%;
        background: 
            linear-gradient(to left, rgba(255,255,255,0.9), rgba(255,255,255,0.4)), /* 左侧更透明 */
            url('https://cdn.uegee.com/head.jpg') right center / cover no-repeat fixed;
        color: #333;
        position: relative;
    }
    .post-link-header h1 {
        margin: 0 0 20px;
        font-size: 36px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .post-link-header p {
        margin: 10px 0;
        font-size: 18px;
        max-width: 800px;
        text-shadow: 0 1px 5px rgba(0,0,0,0.1);
    }

    /* 卡片网格容器 */
    .post-link-cards-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1200px;
        padding: 20px;
        width: 100%;
    }

    /* 单张卡片 */
    .post-link-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    .post-link-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    /* 卡片图标区 - 使用图片并圆形裁剪 */
    .post-link-card-icon {
        padding: 20px;
        text-align: center;
        background: #7a7a7a;
    }
    .post-link-card-icon img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    /* 卡片内容区 */
    .post-link-card-content {
        padding: 20px;
        text-align: center;
        flex-grow: 1;
    }
    .post-link-card-content h3 {
        margin: 0 0 10px;
        font-size: 20px;
    }
    .post-link-card-content p {
        margin: 0 0 20px;
        font-size: 14px;
        color: #666;
    }

    /* 卡片链接按钮 */
    .post-link-card a {
        display: block;
        padding: 14px;
        background: #141414;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 0 0 12px 12px;
        transition: background 0.3s;
    }
    .post-link-card a:hover {
        background: #838383;
    }
</style>

<div class="post-link-container">

    <div class="post-link-cards-container">
        <?php 
echo Links_Plugin::output('<div class="post-link-card"><div class="post-link-card-icon"><img src="{image}" alt="站点图标"></div><div class="post-link-card-content"><h3>{name}</h3><p>{description}</p></div><a href="{url}" target="_blank">访问站点</a></div>','','','','HTML'); ?>
    </div>

    <div class="post-main">
        <div class="article-main">
            <?php $this->content(); ?>
        </div>
    </div>
<div class="comments">
    <?php $this->need('comments.php');?>
</div>

<?php $this->need('includes/footer.php'); ?>




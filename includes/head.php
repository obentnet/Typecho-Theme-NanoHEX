<?php
/**
 * head.php
 * @author uegee
 */
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php $this->archiveTitle(array(
          'category'  =>  _t('分类 %s 下的文章'),
          'search'    =>  _t('包含关键字 %s 的文章'),
          'tag'       =>  _t('标签 %s 下的文章'),
          'author'    =>  _t('%s 发布的文章')
      ), '', ' - '); ?><?php $this->options->title(); ?></title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php $this->options->themeUrl('static/style.css?v=22'); ?>">
<link rel="shortcut icon" href="<?php $this->options->site_favicon() ?>" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="<?php $this->options->site_favicon() ?>">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js"></script>
<meta name="theme-color" content="#333333">
<?php $this->header(); ?>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#FFFFFF',
            secondary: '#333333',
            accent: '#666666',
          }
        }
      }
    }
  </script>
<style>
  .bg-black{
    --tw-bg-opacity： 1;
    background-color: <?php $this->options->background_color() ?> !important;
  }
</style>
</head>

<body class="bg-black text-white" id="main">
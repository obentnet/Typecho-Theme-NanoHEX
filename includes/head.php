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
<meta name="description" content="狱杰的小页,UEG.EE">
<meta name="keywords" content="狱杰,狱杰的小页,uegee">
<meta name="author" content="狱杰UEGEE">
<link rel="apple-touch-icon" sizes="180x180" href="https://cdn.uegee.com/head.jpg">
<meta name="theme-color" content="#333333">
<meta property="og:type" content="website">
<meta property="og:title" content="狱杰的小页">
<meta property="og:description" content="Hi!这是我的小页">
<meta property="og:url" content="https://ueg.ee/">
<meta property="og:image" content="https://cdn.uegee.com/head.jpg">
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
</head>

<body class="bg-black text-white">
<?php
/**
 * Typecho NanoHEX 主题
 * 
 * @package Typecho NanoHEX Theme
 * @author UEGEE
 * @version 1.0.0
 * @link http://uegee.com/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
?>

  <section id="home" class="min-h-screen flex flex-col items-center justify-center px-4 md:px-8 relative">
    <div class="container mx-auto max-w-5xl flex flex flex-col md:flex-row items-center justify-between relative z-10">
      <div
        class="flex flex-col items-center md:items-start mb-10 md:mb-0 opacity-0 -translate-x-12 transition-all duration-1000 ease-out"
        id="left-content">
        <div class="text-center md:text-left mb-8">
          <h1 class="text-[clamp(3rem,8vw,5rem)] font-bold tracking-tighter leading-none"><?php $this->options->index_word() ?></h1>
          <p class="text-accent text-lg md:text-xl mt-2 tracking-widest"><?php $this->options->index_des() ?></p>
        </div>

<div class="flex flex-wrap justify-center md:block gap-3 md:gap-4 mb-8">

    <?php if ($this->options->custom_buttons): 
        $lines = array_filter(array_map('trim', explode("\n", $this->options->custom_buttons)));
        foreach ($lines as $btn):
            list($url, $text, $icon) = array_pad(array_map('trim', explode('|', $btn)), 3, '');
            if (!$url || !$text) continue;
    ?>
        <a href="<?php echo $url; ?>" target="_blank"
           class="btnhonver bg-secondary text-white px-6 py-3 rounded-md inline-block text-center">
            <?php if ($icon): ?><i class="<?php echo $icon; ?> mr-2"></i><?php endif; ?>
            <?php echo $text; ?>
        </a>
    <?php 
        endforeach;
    endif; ?>
</div>

        <!-- <div class="post text-center md:text-left text-sm">
          <code>?blog</code> <code>?bilibili</code> <code>?github</code> <code>?friend</code> <code>?qq</code><br>
          <code>rss</code> <code>steam</code> <code>donate</code>
        </div> -->
      </div>

      <div class="relative opacity-0 translate-x-12 transition-all duration-1000 ease-out" id="right-avatar">
        <div class="w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-4 border-white/20 avatar-pulse">
          <img src="<?php $this->options->index_headpic() ?>" alt="headpic" class="w-full h-full object-cover">
        </div>
        <div class="absolute -top-4 -left-4 w-20 h-20 border-t-2 border-l-2 border-white/30 rounded-tl-full"></div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 border-b-2 border-r-2 border-white/30 rounded-br-full"></div>
      </div>
    </div>

    <div class="absolute inset-0 z-0 pointer-events-none">
      <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/5 rounded-full blur-3xl float-animation-1"></div>
      <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-white/5 rounded-full blur-3xl float-animation-2"></div>
    </div>
  </section>


<section id="posts" class="min-h-screen flex flex-col bg-black">
<?php
$this->need('includes/header.php');
?>

<!-- 文章列表 -->
    <div class="flex-1 max-w-5xl mx-auto w-full px-6 py-12 pb-32">
      <div class="grid gap-10 md:grid-cols-2 lg:gap-14">

        <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
        <article class="post-card">
            <div class="post-card-infomation">
                <time class="text-accent text-sm block mb-4"><?php $this->date(); ?></time>
                <p style="font-size:12.5px;margin-left:0.5em;color:rgb(102 102 102 / var(--tw-text-opacity, 1));"><?php $this->category(','); ?></p>
            </div>
          <h3 class="text-2xl md:text-3xl font-bold mb-5 leading-tight">
            <a href="<?php $this->permalink() ?>" class="post-link"><?php $this->title() ?></a>
          </h3>
          <p class="text-gray-300 leading-relaxed"><?php $this->excerpt(50, '...'); ?></p>
        </article>
        
        <?php endwhile; ?>
        <?php else: ?>暂无文章<?php endif; ?>

      </div>
    </div>
  </section>

  <script>
    document.documentElement.style.scrollBehavior = 'smooth';

    document.addEventListener('DOMContentLoaded', () => {
      const left = document.getElementById('left-content');
      const right = document.getElementById('right-avatar');
      setTimeout(() => {
        left.style.opacity = '1';
        left.style.transform = 'translateX(0)';
        right.style.opacity = '1';
        right.style.transform = 'translateX(0)';
      }, 150);
    });
  </script>
<?php
$this->need('includes/footer.php');
?>
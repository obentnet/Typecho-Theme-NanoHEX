
<div class="sticky top-0 z-50 bg-black/80 backdrop-blur-xl border-b border-white/10 py-6">
  <div class="max-w-5xl mx-auto px-6 flex items-center justify-between">
    <h3 class="text-2xl md:text-3xl font-bold tracking-tight"><?php $this->options->title() ?></h3>
    <nav class="flex items-center gap-6 md:gap-10 text-sm">
        <a href="<?php $this->options->siteUrl(); ?>"
           class="<?php echo $this->is('index') ? 'text-white' : 'text-gray-400 hover:text-white'; ?> transition">
            <i class="fa fa-home mr-2"></i>首页
        </a>
        <?php $this->widget('Widget_Contents_Page_List')
             ->to($pages); ?>
        <?php while($pages->next()): ?>
            <a href="<?php $pages->permalink(); ?>"
               class="<?php echo $this->is('page', $pages->slug) ? 'text-white' : 'text-gray-400 hover:text-white;'; ?> transition">
                <?php $pages->title(); ?>
            </a>
        <?php endwhile; ?>
        <?php if ($this->user->hasLogin()): ?>
        <a href="/admin" class="text-gray-400 hover:text-white transition">后台</a>
        <?php endif; ?>
    </nav>
  </div>
</div>
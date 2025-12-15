
  <footer class="mt-auto w-full bg-black/60 backdrop-blur-md border-t border-white/10">
    <div class="max-w-5xl mx-auto px-6 py-10 text-center text-sm text-gray-500">
      <p>
        &copy; <?php echo date('Y'); ?> <span class="text-white font-medium"><?php $this->options->title() ?></span> · 
        <span class="text-accent"><?php $this->options->index_des() ?></span>
      </p>
      <p class="mt-3">
        Powered by 
        <a href="https://typecho.org" target="_blank" class="text-gray-400 hover:text-white transition">Typecho</a> 
        · Theme 
        <a href="https://github.com/obentnet/nanohex" target="_blank" class="text-gray-400 hover:text-white transition">NanoHEX</a>
      </p>
      <p class="mt-4 text-xs opacity-70">
        <a href="https://beian.miit.gov.cn/"><?php $this->options->index_icp() ?></a>
      </p>
    </div>

    <script>
      $(function() {
          $(document).pjax('a[target!=_blank][rel!=nofollow]', '#main', { // '#main'替换为你主题的内容容器ID
              fragment: '#main',
              timeout: 8000
          });
        
          $(document).on('pjax:complete', function() {
              // 这里重新初始化需要刷新的功能，如代码高亮、懒加载、评论等
              // 示例：if (typeof hljs !== 'undefined') hljs.initHighlighting();
              // 滚动到顶部
              window.scrollTo(0, 0);
          });
      });
    </script>

    <?php $this->footer(); ?>
    
  </footer>
</body>

</html>
<?php
function themeConfig($form) {

    // 首页大屏文字
    $index_word = new Typecho_Widget_Helper_Form_Element_Text(
        'index_word', NULL, 'Hi!',
        _t('首页大屏文字'),
        _t('显示在首页大屏幕区域的主要标题文字')
    );
    $form->addInput($index_word);

    // 首页大屏描述
    $index_des = new Typecho_Widget_Helper_Form_Element_Text(
        'index_des', NULL, 'just so so...',
        _t('首页大屏描述'),
        _t('显示在首页大屏幕下方的描述文字')
    );
    $form->addInput($index_des);

    // 首页大屏头像
    $index_headpic = new Typecho_Widget_Helper_Form_Element_Text(
        'index_headpic', NULL, 'https://cdn.uegee.com/head.jpg',
        _t('首页大屏头像'),
        _t('填写图片完整 URL，支持 PNG/JPG/WEBP/GIF')
    );
    $form->addInput($index_headpic);


    // ====================== 可无限添加按钮（推荐写法：用 Textarea） ======================
    $defaultButtons = "https://steamcommunity.com/id/do0rtea/|STEAM|fa fa-steam\nhttps://github.com/username|GitHub|fa fa-github\nhttps://twitter.com/username|Twitter|fa fa-twitter";

    $custom_buttons = new Typecho_Widget_Helper_Form_Element_Textarea(
        'custom_buttons',
        NULL,
        $defaultButtons,
        _t('首页按钮组（每行一个）'),
        _t('
        <strong>每行一个按钮，格式：链接|按钮文字|Font Awesome 图标类名</strong><br>
        示例：<br>
        https://steamcommunity.com/id/do0rtea/|STEAM|fa fa-steam<br>
        https://github.com/用户名|GitHub|fa fa-github<br>
        https://space.bilibili.com/123456|Bilibili|fa fa-bilibili<br>
        <a href="https://fontawesome.com/v4/icons/" target="_blank">点此查看所有图标类名</a>
        ')
    );
    $form->addInput($custom_buttons);
    ?>

    <!-- 美化 Textarea 为可增删的输入框（完美解决兼容性问题） -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var textarea = document.querySelector('textarea[name="custom_buttons"]');
        if (!textarea) return;

        var container = textarea.parentNode.parentNode;
        var wrapper = document.createElement('div');
        wrapper.className = 'typecho-button-builder';
        wrapper.innerHTML = `
        <div style="margin-bottom:10px;">
            <label class="typecho-label">首页按钮组（每行一个）</label>
        </div>
        <div id="button-list" style="margin-bottom:10px;"></div>
        <button type="button" class="btn btn-s" id="add-button">新增一个按钮</button>
        <p class="description">
            每行格式：<code>链接|按钮文字|图标类名</code>　　图标参考：
            <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome 4.7</a>
        </p>
        `;

        container.parentNode.insertBefore(wrapper, container);
        container.style.display = 'none';

        var list = wrapper.querySelector('#button-list');
        var addBtn = wrapper.querySelector('#add-button');

        function render() {
            list.innerHTML = '';
            var lines = textarea.value.trim().split('\n').filter(Boolean);
            if (lines.length === 0 || (lines.length === 1 && lines[0] === 'https://steamcommunity.com/id/do0rtea/|STEAM|fa fa-steam')) {
                lines = "<?php echo $defaultButtons; ?>".split('\n');
            }

            lines.forEach(function(line) {
                var parts = line.split('|');
                var href = parts[0] || '';
                var text = parts[1] || '';
                var icon = parts[2] || '';

                var div = document.createElement('div');
                div.style.cssText = 'margin:8px 0;padding:12px;border:1px solid #ddd;border-radius:6px;background:#fcfcfc;display:flex;gap:8px;flex-wrap:wrap;align-items:center;';
                div.innerHTML = `
                    <input type="url" placeholder="链接" value="${href}" style="flex:2;min-width:220px;">
                    <input type="text" placeholder="按钮文字" value="${text}" style="flex:1;min-width:100px;">
                    <input type="text" placeholder="图标类名 如 fa fa-qq" value="${icon}" style="flex:1;min-width:180px;">
                    <button type="button" class="btn btn-ws" onclick="this.parentNode.remove();sync()">删除</button>
                `;
                list.appendChild(div);
            });
        }

        function sync() {
            var items = list.querySelectorAll('div');
            var result = [];
            items.forEach(function(item) {
                var inputs = item.querySelectorAll('input');
                var href = inputs[0].value.trim();
                var text = inputs[1].value.trim();
                var icon = inputs[2].value.trim();
                if (href && text) {
                    result.push(href + '|' + text + '|' + icon);
                }
            });
            textarea.value = result.join('\n');
        }

        addBtn.onclick = function() {
            var div = document.createElement('div');
            div.style.cssText = 'margin:8px 0;padding:12px;border:1px solid #ddd;border-radius:6px;background:#fcfcfc;display:flex;gap:8px;flex-wrap:wrap;align-items:center;';
            div.innerHTML = `
                <input type="url" placeholder="链接" style="flex:2;min-width:220px;">
                <input type="text" placeholder="按钮文字" style="flex:1;min-width:100px;">
                <input type="text" placeholder="图标类名 如 fa fa-steam" style="flex:1;min-width:180px;">
                <button type="button" class="btn btn-ws" onclick="this.parentNode.remove();sync()">删除</button>
            `;
            list.appendChild(div);
            sync();
        };

        list.addEventListener('input', sync);
        render();
    });
    </script>
    <?php
}
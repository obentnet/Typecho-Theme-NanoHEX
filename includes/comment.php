<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<section class="comments py-20 px-6 max-w-5xl mx-auto" id="comments">
    <?php $this->comments()->to($comments); ?>

    <?php if ($comments->have()): ?>
    <h2 class="text-3xl font-bold mb-12 text-center text-white">
        <?php $this->commentsNum(_t('暂无评论'), _t('1 条评论'), _t('%d 条评论')); ?>
    </h2>

    <div class="comment-list space-y-10">
        <?php
        function threadedComments($comments, $options) {
            $isAuthor = $comments->authorId && $comments->authorId == $comments->ownerId;
        ?>
        <div class="comment-body <?php if ($isAuthor) echo 'comment-by-author'; ?>" id="<?php $comments->theId(); ?>">
            <div class="comment-card bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:border-[#d8b9a4]/50 transition-all duration-500">
                <div class="flex items-start gap-5">
                    <div class="avatar relative flex-shrink-0">
                        <img src="<?php echo Typecho_Common::gravatarUrl($comments->mail, 80, 'G', 'mp', $comments->request->isSecure()); ?>"
                             alt="<?php $comments->author(false); ?>"
                             class="w-14 h-14 rounded-full ring-4 ring-[#d8b9a4]/30 ring-offset-4 ring-offset-transparent transition-all hover:ring-[#d8b9a4]/70">
                        <?php if ($isAuthor): ?>
                            <span class="absolute -top-1 -right-1 bg-gradient-to-r from-[#d8b9a4] to-[#e5d0c0] text-[#121212] text-xs font-bold px-2.5 py-1 rounded-full shadow-lg">博主</span>
                        <?php endif; ?>
                    </div>

                    <div class="comment-main flex-1 min-w-0">
                        <div class="comment-meta text-sm opacity-80 mb-3 flex flex-wrap items-center gap-x-3">
                            <span class="author font-bold text-[#d8b9a4]"><?php $comments->author(); ?></span>
                            <span class="text-gray-500">·</span>
                            <time class="text-gray-400"><?php $comments->date('Y-m-d H:i'); ?></time>
                            <?php if ($comments->parent): ?>
                                <span class="text-[#d8b9a4]/80">回复 @<?php $comments->parentComment()->author(); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="comment-content prose prose-invert max-w-none text-gray-200 leading-relaxed text-base">
                            <?php $comments->content(); ?>
                        </div>

                        <div class="comment-actions mt-5">
                            <a href="javascript:;" class="reply text-[#d8b9a4] hover:text-[#121212] hover:bg-[#d8b9a4] hover:px-4 hover:py-1.5 hover:rounded-xl text-sm font-medium transition-all duration-300"
                               data-commentid="<?php $comments->theId(); ?>"
                               data-commentparent="<?php $comments->parent ? $comments->parent() : $comments->theId(); ?>"
                               data-commentname="<?php $comments->author(); ?>">
                                回复
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($comments->children): ?>
                <div class="comment-children ml-10 mt-8 pl-6 border-l-2 border-[#d8b9a4]/20">
                    <?php $comments->threadedComments($options); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php } ?>

        <?php $comments->listComments(); ?>
    </div>

    <?php else: ?>
        <div class="text-center py-20 text-gray-500 text-xl">这里空空的～快来抢沙发吧！</div>
    <?php endif; ?>

    <!-- 评论表单 -->
    <?php if ($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond mt-20">
        <h3 class="text-2xl font-bold mb-10 text-center text-white">留下你的足迹</h3>

        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="space-y-7">
            <!-- 登录状态判断 -->
            <?php if ($this->user->hasLogin()): ?>
                <!-- 已登录用户（包括博主） -->
                <div class="text-center mb-8">
                    <p class="text-lg text-[#d8b9a4] font-medium">
                        已登录为 <strong><?php $this->user->screenName(); ?></strong>
                        <?php if ($this->user->uid == $this->authorId): ?>
                            <span class="ml-2 text-xs bg-[#d8b9a4] text-[#121212] px-3 py-1 rounded-full">博主</span>
                        <?php endif; ?>
                    </p>
                </div>

                <!-- 博主登录 → 完全隐藏三个输入框 -->
                <?php if ($this->user->uid == $this->authorId): ?>
                    <!-- 博主啥都不显示，直接写评论 -->

                <?php else: ?>
                    <!-- 普通登录用户 → 隐藏昵称和邮箱，只保留网站 -->
                    <div class="grid grid-cols-1 gap-5">
                        <input type="url" name="url" id="url" placeholder="网站（可选）"
                               class="comment-input" value="<?php $this->remember('url', true); ?>" />
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <!-- 未登录游客 → 显示全部三个输入框 -->
                <div class="grid md:grid-cols-3 gap-5">
                    <input type="text" name="author" id="author" placeholder="昵称（必填）" required
                           class="comment-input" value="<?php $this->remember('author',true); ?>" />

                    <input type="email" name="mail" id="mail" placeholder="邮箱（不会公开）" required
                           class="comment-input" value="<?php $this->remember('mail',true); ?>" />

                    <input type="url" name="url" id="url" placeholder="网站（可选）"
                           class="comment-input" value="<?php $this->remember('url',true); ?>" />
                </div>
            <?php endif; ?>

            <textarea name="text" id="textarea" rows="8" placeholder="支持 Markdown，理性发言，和谐讨论～" required
                      class="comment-input comment-textarea resize-none" style="width:100%"><?php $this->remember('text'); ?></textarea>

            <div class="flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="text-sm text-gray-400">
                    <?php if ($this->user->hasLogin()): ?>
                        正在以 <span class="text-[#d8b9a4] font-medium"><?php $this->user->screenName(); ?></span> 身份发言
                    <?php else: ?>
                        提交后会收到回复通知邮件
                    <?php endif; ?>
                </div>

                <button type="submit" class="submit-btn">发布评论</button>
            </div>

            <div id="comment-cancel" class="hidden text-right mt-6">
                <a href="javascript:;" class="text-gray-500 hover:text-[#d8b9a4] text-sm font-medium">取消回复</a>
            </div>
        </form>
    </div>
    <?php endif; ?>
</section>

<style>
/* 奶茶色专属输入框 */
.comment-input {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 1rem 1.4rem;
    color: white;
    font-size: 1.05rem;
    transition: all 0.4s ease;
}
.comment-input::placeholder {
    color: rgba(255, 255, 255, 0.4);
}
.comment-input:focus {
    outline: none;
    border-color: #d8b9a4;
    background: rgba(216, 185, 164, 0.08);
    box-shadow: 0 0 0 4px rgba(216, 185, 164, 0.2);
    transform: translateY(-1px);
}
.comment-textarea {
    line-height: 1.8;
}

/* 发布按钮 */
.submit-btn {
    background: linear-gradient(135deg, #d8b9a4, #e5d0c0);
    color: #121212;
    font-weight: bold;
    font-size: 1.1rem;
    padding: 0.9rem 2.8rem;
    border-radius: 999px;
    box-shadow: 0 10px 30px rgba(216, 185, 164, 0.4);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.submit-btn:hover {
    transform: translateY(-6px) scale(1.05);
    box-shadow: 0 20px 50px rgba(216, 185, 164, 0.5);
    background: linear-gradient(135deg, #e5d0c0, #d8b9a4);
}

.comment-card:hover {
    transform: translateY(-6px);
    border-color: #d8b9a4 !important;
    box-shadow: 0 20px 40px rgba(216,185,164,0.15);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const respond = document.getElementById('<?php $this->respondId(); ?>');
    const cancel = document.getElementById('comment-cancel');
    const form = document.getElementById('comment-form');
    const textarea = document.getElementById('textarea');

    document.querySelectorAll('.reply').forEach(btn => {
        btn.onclick = function () {
            const name = this.dataset.commentname;

            respond.appendChild(form);
            textarea.placeholder = `回复 @${name}：`;
            textarea.focus();

            let parentInput = document.querySelector('input[name="parent"]');
            if (!parentInput) {
                parentInput = document.createElement('input');
                parentInput.type = 'hidden';
                parentInput.name = 'parent';
                form.appendChild(parentInput);
            }
            parentInput.value = this.dataset.commentparent;

            cancel.classList.remove('hidden');
            respond.scrollIntoView({behavior: 'smooth', block: 'center'});
        };
    });

    if (cancel) {
        cancel.onclick = () => {
            textarea.placeholder = '支持 Markdown，理性发言，和谐讨论～';
            const p = document.querySelector('input[name="parent"]');
            if (p) p.value = '';
            cancel.classList.add('hidden');
            document.querySelector('.respond').appendChild(form);
        };
    }
});
</script>
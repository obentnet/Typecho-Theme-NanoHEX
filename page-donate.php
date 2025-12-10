<?php
/**
 * 赞助页
 *
 * @package custom
 * @author  uegee
 * @version 1.0
 * @link    https://uegee.com
 */


if (!defined('__TYPECHO_ROOT_DIR__')) exit;

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->title() ?> | <?php $this->options->title() ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/donate.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('static/font_obmcjw6k9vf/iconfont.css'); ?>">
</head>

<body class="theme-light">
    <button class="theme-toggle" id="themeToggle">🌙</button>

    <div class="container">
        <h1>Cup of tea?</h1>
        <p class="subtitle">Thank for you donation</p>

        <div class="qr-container">
            <div class="qr-code">
                <img src="<?php $this->options->donate_weixin() ?>" alt="微信支付二维码" class="qr-img" id="qrImage">
            </div>
        </div>

        <div class="payment-options">
            <button class="payment-btn active" data-payment="wechat"><span class="iconfont icon-weixin"></span>WeChat</button>
            <button class="payment-btn" data-payment="alipay"><span class="iconfont icon-zhifubaozhifu"></span>AliPay</button>
            <button class="payment-btn" data-payment="usdt"><span class="iconfont icon-USDT"></span>USDT(TORN)</button>
            <button class="payment-btn" data-payment="qq"><span class="iconfont icon-QQ"></span>QQ</button>
        </div>

        <div class="instructions">
            <h3>Donate List <span class="iconfont icon-zanzhu"></span></h3>
            <ol>
                <?php $this->content(); ?>
            </ol>
        </div>

        <div class="copy">Powered By <a href="https://typecho.org/" target="_blank">Typecho</a> · Theme <a href="https://github.com/obentnet/Typecho-Theme-NanoHEX" target="_blank">NanoHEX</a></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const themeToggle = document.getElementById('themeToggle');
            const body = document.body;
            const paymentButtons = document.querySelectorAll('.payment-btn');
            const qrImage = document.getElementById('qrImage');

            const paymentImages = {
                wechat: '<?php $this->options->donate_weixin() ?>',
                alipay: '<?php $this->options->donate_alipay() ?>',
                usdt: '<?php $this->options->donate_usdt() ?>',
                qq: '<?php $this->options->donate_qq() ?>'
            };

            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                body.className = 'theme-dark';
                themeToggle.textContent = '☀️';
            }

            themeToggle.addEventListener('click', function () {
                if (body.classList.contains('theme-light')) {
                    body.className = 'theme-dark';
                    themeToggle.textContent = '☀️';
                    localStorage.setItem('theme', 'dark');
                } else {
                    body.className = 'theme-light';
                    themeToggle.textContent = '🌙';
                    localStorage.setItem('theme', 'light');
                }
            });
            paymentButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const paymentType = this.getAttribute('data-payment');
                    paymentButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    qrImage.src = paymentImages[paymentType];
                    qrImage.alt = `${paymentType}支付二维码`;
                });
            });
        });
    </script>
</body>

</html>
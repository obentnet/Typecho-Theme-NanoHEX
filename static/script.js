console.log('hi~')
const queryString = window.location.search.slice(1);
if (queryString === 'blog') {
    window.location.href = 'https://uegee.com/';
} else if (queryString === 'bilibili') {
    window.location.href = 'https://space.bilibili.com/20980892';
} else if (queryString === 'github') {
    window.location.href = 'https://github.com/obentnet';
} else if (queryString === 'friend') {
    window.location.href = 'https://uegee.com/link';
} else if (queryString === 'qq') {
    window.location.href = 'https://qm.qq.com/q/ajwKekWaBO';
} else if (queryString === 'rss') {
    window.location.href = 'https://uegee.com/rss.xml';
} else if (queryString === 'steam') {
    window.location.href = 'https://steamcommunity.com/id/do0rtea/';
} else if (queryString === 'donate') {
    window.location.href = './donate.html'
}
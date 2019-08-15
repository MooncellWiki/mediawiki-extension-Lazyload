## Installation

To install the extension, place the entire `Lazyload` directory within your
MediaWiki `extensions` directory, then add the following line to your
`LocalSettings.php` file:

```php
wfLoadExtension( 'Lazyload' );
```

## Detail

* 在 [Chrome 75](https://chromestatus.com/feature/5645767347798016)及以上的浏览器中 属性
```html 
loading="lazy"
```
使图片在将要进入视野时开始加载，[由Chrome提供支持](https://addyosmani.com/blog/lazy-loading/)

* 在其他浏览器中 懒加载由[lazysizes.js](https://github.com/aFarkas/lazysizes)完成


## Installation

To install the extension, place the entire `Lazyload` directory within your
MediaWiki `extensions` directory, then add the following line to your
`LocalSettings.php` file:

```php
wfLoadExtension( 'Lazyload' );
```
如果需要图片渐入效果可以在Common.css加入
```css
.lazyload,
.lazyloading {
	opacity: 0;
}
.lazyloaded {
	opacity: 1;
	transition: opacity 300ms;
}
```
## Detail

* 懒加载由[lazysizes.js](https://github.com/aFarkas/lazysizes)完成


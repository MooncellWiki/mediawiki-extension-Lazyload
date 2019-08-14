$().ready(function(){
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll("img.lazyload");
        images.forEach(img => {
            img.src = img.dataset.src;
            if (img.dataset.srcset){
                img.srcset = img.dataset.srcset;
            } 
        });
    } else {
        // Dynamically import the LazySizes library
        let script = document.createElement("script");
        script.async = true;
        script.src =
            "https://s3.pstatp.com/cdn/expire-1-M/lazysizes/4.1.8/lazysizes.min.js";
        document.body.appendChild(script);
    }
});

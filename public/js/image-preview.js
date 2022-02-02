(function() {
    $.fn.imagePreview = function(option) {
        this.change(function(e) {
            if (option.width == undefined) {
                option.width = "200px";
            }
            if (option.height == undefined) {
                option.height = "140px";
            }
            if (option.margin == undefined) {
                option.margin = "0px";
            }
            var img = ``;
            var files = [...e.target.files];
            var that = this;
            files.forEach(function(file, index) {
                var src = URL.createObjectURL(file)
                var data = {
                    file: file
                }
                img += `<img src="${ src }" alt="${ file.name }" style="width:${ option.width };height:${ option.height };margin:${ option.margin };">`;
            })

            $(option.container).html(img)

        })
    }
})(jQuery)
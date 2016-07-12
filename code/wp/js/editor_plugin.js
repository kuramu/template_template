(function() {
        tinymce.create('tinymce.plugins.ShortcodeConv', {
            getInfo : function() {
                return {
                    longname : 'Template Image Directory short-code convert',
                    author : 'Tenderfeel',
                    authorurl : 'http://tenderfeel.xsrv.jp',
                    infourl : 'http://tenderfeel.xsrv.jp',
                    version : "1.0"
                    };
            },
            init : function(ed, url) {
                var t = this;

                ed.onBeforeSetContent.add(function(ed, o) {
                    o.content = t._do_code(o.content);
                });

                ed.onPostProcess.add(function(ed, o) {
                    if (o.get)
                        o.content = t._get_code(o.content);
                });
            },
                _do_code : function(co) {
                    //http://[wp-root]/wp-includes/js/tinymce/
                    return co.replace(/\[template_image_directory\]/g, function(a,b){
                            str = tinymce.baseURL.replace(/(.+?)wp-includes\/js\/tinymce/i,'$1wp-content/themes/original/images');
                        return str;
                    });
                },
                _get_code : function(co) {

                    str = tinymce.baseURL.replace(/(.+?)wp-includes\/js\/tinymce/i,'$1wp-content/themes/original/images');

                    reg = new RegExp('<img([^>]+)('+str+')([^>]+)>','g');

                    //a = RegExp全文 b～c = ()の中身
                    return co.replace(reg, function(a,b,c,d) {
                        if ( c != "")
                            return '<img'+b+'[template_image_directory]'+d+'>';

                        return a;
                    });
                }
            });
        tinymce.PluginManager.add('ShortcodeConv', tinymce.plugins.ShortcodeConv);
    })();


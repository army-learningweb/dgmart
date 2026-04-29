@props(['id'])

<script>
    tinymce.init({
        selector: '#{{ $id }}',
        min_height: 490,

        menubar: false, // Ẩn thanh File, Edit, View...
        promotion: false, // Ẩn nút Upgrade
        branding: false, // Ẩn chữ "Powered by Tiny"

        plugins: 'image link media table code wordcount',
        toolbar: 'undo redo | fontsize | bold italic underline | alignleft aligncenter alignright lineheight | image media table | code',
        path_absolute: "/",

        // filemanager
        file_picker_callback: function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document
                .getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = '/filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Trình quản lý ảnh',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    });
</script>

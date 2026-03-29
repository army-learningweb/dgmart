@props(['id'])

<div>
    <script src="https://cdn.tiny.cloud/1/99c8uy6qg2tkb92zk1z57p4evrix6u0q9mpgxced7w3w12ve/tinymce/7/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>
    <script>
        tinymce.init({
            selector: 'textarea#{{ $id }}',
            height: 300,
            
            menubar: false, // Ẩn thanh File, Edit, View...
            promotion: false, // Ẩn nút Upgrade
            branding: false, // Ẩn chữ "Powered by Tiny"

            plugins: 'image link media table code wordcount',
            toolbar: 'undo redo | fontsize | bold italic underline | alignleft aligncenter alignright lineheight | image media table | code',            path_absolute: "/",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                // Bỏ phần check meta.filetype, chỉ dùng URL cơ bản
                var cmsURL = '/laravel-filemanager?editor=' + meta.fieldname;

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
</div>

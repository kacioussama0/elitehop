<script src="https://cdn.tiny.cloud/1/ayznh1fmgj7oxm3q4j2qqfk3d49w3nzxgbpen5287a63zbpt/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('focusin', (e) => {
        if (e.target.closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root") !== null) {
            e.stopImmediatePropagation();
        }
    });
</script>
<script>
    tinymce.init({
        selector: 'textarea#{{$id}}', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        ],
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>

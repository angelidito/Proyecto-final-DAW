tinymce.init({
    selector: '.editable',
    plugins: [
        'advlist autolink link image lists charmap preview hr anchor',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking fullpage',
        'emoticons template paste help'
    ],
    toolbar: 'undo redo | ' +
        'styleselect | ' +
        'bold italic | ' +
        'forecolor backcolor |' +
        'emoticons |' +
        'outdent indent | ' +
        'bullist numlist | ' +
        'alignleft aligncenter alignright alignjustify |' +
        'link image | ' +
        'media  | ',
    menu: {
        favs: {
            title: 'Dev',
            items: 'code | wordcount searchreplace | emoticons'
        }
    },
    menubar: 'favs edit view insert format help',
    content_css: 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css,../assets/css/estructura.css',
    allow_script_urls: true,
});
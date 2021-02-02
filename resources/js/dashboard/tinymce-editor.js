// window.tinymce = require('tinymce');
window.tinymce = require('tinymce/tinymce.min.js');

$(function () {
    tinymce.init({
        selector: ".tinymce-editor",
        mode: "textareas",
        plugins: 'print preview ' +
            'importcss searchreplace autolink ' +
            'directionality visualblocks ' +
            'visualchars fullscreen image link media ' +
            'template codesample table charmap hr ' +
            'pagebreak nonbreaking ' +
            'anchor toc insertdatetime advlist lists ' +
            'wordcount imagetools textpattern ' +
            'noneditable help charmap ' +
            ' quickbars',
        mobile: {
            plugins: 'print preview powerpaste importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount textpattern noneditable help charmap quickbars'
        },
        menu: {
            tc: {
                title: 'TinyComments',
                items: 'addcomment showcomments deleteallconversations'
            }
        },
        menubar: 'file edit view insert format tools table tc help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor casechange removeformat | pagebreak | charmap | fullscreen  preview save print | insertfile image media template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
    });
});
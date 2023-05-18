const initTinyMCE = async (selector, options) => {
    const theme = localStorage.getItem('theme') || 'light';

    options = Object.assign({}, options, {
        selector,
        language: document.documentElement.lang,
        directionality: document.documentElement.dir,
        height: 300,
        menubar: false,
        branding: false,
        skin: theme === 'dark' ? 'oxide-dark' : 'oxide',
        content_css: theme === 'dark' ? 'dark' : 'default',
        plugins: 'advlist autolink code directionality link lists table',
        toolbar: 'undo redo | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify outdent indent ltr rtl | bullist numlist | table',
        toolbar_mode: 'wrap',
    });

    const [ instance ] = await tinyMCE.init(options);

    document.addEventListener('theme:changed', () => {
        instance?.destroy();
        initTinyMCE(selector, options);
    }, { once: true });
};

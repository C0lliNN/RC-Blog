import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

const language = navigator.language.split('-')[0];

ClassicEditor.create(document.querySelector('#editor'), {
  toolbar: [
    'heading',
    '|',
    'bold',
    'italic',
    'link',
    'bulletedList',
    'numberedList',
    '|',
    'blockQuote',
    'imageUpload',
    'imageStyle:full',
    'imageStyle:side',
    'insertTable',
    '|',
    'undo',
    'redo',
  ],
  language: 'pt',
  heading: {
    options: [
      {
        model: 'paragraph',
        title: language === 'pt' ? 'Parágrafo' : 'Paragraph',
        class: 'ck-heading_paragraph',
      },
      {
        model: 'heading1',
        view: 'h2',
        title: language === 'pt' ? 'Título 1' : 'Title 1',
        class: 'ck-heading_heading1',
      },
      {
        model: 'heading2',
        view: 'h3',
        title: language === 'pt' ? 'Título 2' : 'Title 2',
        class: 'ck-heading_heading2',
      },
      {
        model: 'heading3',
        view: 'h4',
        title: language === 'pt' ? 'Título 3' : 'Title 3',
        class: 'ck-heading_heading3',
      },
    ],
  },
}).catch((error) => {
  console.error(error);
});

const fileInput = document.querySelector('#file');

fileInput.onchange = () => {
  const files = fileInput.files;

  if (files.length) {
    fileInput.labels[0].innerHTML = fileInput.files[0].name;
  }
};

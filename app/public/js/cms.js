function submitChanges() {
    const form = document.getElementById('contentForm');
    const data = {};

    const url = new URL(window.location.href);
    const pathSegments = url.pathname.split('/');

    const queryParams = new URLSearchParams(url.search);
    let result;

    if (queryParams.has('id')) {
        result = queryParams.get('id');
    } else {
        result = pathSegments[pathSegments.length - 1];
    }
    
    data.page_identifier = result;
    
    form.querySelectorAll('.contenteditable, .contenteditable-no-editor').forEach((block) => {
        const contentblock_title = block.getAttribute('data-title');
        
        if (tinymce.get(block.id)) {
            const content = tinymce.get(block.id).getContent().trim();
            data[contentblock_title] = content;
        } else {
            const content = block.innerHTML.trim();
            data[contentblock_title] = content;
        }
    });


    fetch('/admincms/edit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
        
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });

    console.log('Data being sent:', data);
}
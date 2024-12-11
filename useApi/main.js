const BASE_URL = 'http://127.0.0.1:8000/api/v1/';

const getBlogs = async () => {
    const response = await fetch(BASE_URL + 'blogs');
    const data = await response.json();
    
    console.log(data);
    showDataInTable(data);
    return data;
}

const showDataInTable = (datas) => {
    const tBody = document.querySelector("#tBody");
    let tableRows = '';

    datas.data.forEach((data, index) => {
        const statusBadge = data.status === 1
            ? `<span class="badge bg-success">Active</span>`
            : `<span class="badge bg-danger">Passive</span>`;

        tableRows += `
            <tr>
                <td>${data.id}</td>
                <td>${data.category_id}</td>
                <td>${data.title?.az || 'No Title'}</td>
                <td>${statusBadge}</td>
                <td>
                    <a onClick="deleteBlogById(${data.id})" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        `;
    });

    tBody.innerHTML = tableRows;
}

getBlogs();

const deleteBlogById = (id) => {
    fetch(BASE_URL + `blog/${id}`, {
        method: 'DELETE',
    })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            getBlogs();
            alert('Blog post deleted successfully!');
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('There was an error deleting the blog post.');
        });
}


document.querySelector('#getBlogs').addEventListener('click', () => {
    getBlogs();
});
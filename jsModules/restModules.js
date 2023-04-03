const getData = async (url, callback) => await fetch(url).then(data => data.json().then(data => {callback(data)}));


const deleteData = (obj, url) => (fetch(url, {
    method: 'DELETE',
    body: JSON.stringify(obj),
    headers: {
      'Content-Type': 'application/json'
    }
  }).then(data => data.json())) 

const postData = (obj, url) => (fetch(url, {
    method: 'PUT',
    body: JSON.stringify(obj),
    headers: {
      'Content-Type': 'application/json'
    }
}).then(data => data.json()));
const postData = (obj, url) => (fetch(url, {
    method: 'PUT',
    body: JSON.stringify(obj),
    headers: {
      'Content-Type': 'application/json'
    }
  }).then(data => data.json()));
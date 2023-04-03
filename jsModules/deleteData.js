const deleteData = (obj, url) => (fetch(url, {
    method: 'DELETE',
    body: JSON.stringify(obj),
    headers: {
      'Content-Type': 'application/json'
    }
  }).then(data => data.json())) 
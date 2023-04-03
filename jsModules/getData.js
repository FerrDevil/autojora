const getData = async (url, callback) => await fetch(url).then(data => data.json().then(data => {callback(data)}));




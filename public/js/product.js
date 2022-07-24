const product = async () => {
    const response = await fetch('http://nixproject.ua/api/product', {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    });

    const content = await response.json();
    console.log(content);

    let list = document.getElementById("products");

    for (let key in content) {
        list.innerHTML += `
            <div class="card">
                <img src="../images/${content[key].title}.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">${content[key].title}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. ${content[key].description}</p>
                    <div>
                        <p class="count">count: ${content[key].count} </p>
                        <a href="#" class="btn btn-primary">purchase < ${content[key].price} USD ></a>
                    </div>
                </div>
            </div>
        `
        console.log(content[key])
    }

};

product();
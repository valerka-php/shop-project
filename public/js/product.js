const products = async () => {
    const typeName = window.location.search.split('=')
    const response = await fetch(`http://nixproject.ua/application/product/?type=${typeName[1]}`, {
        method: 'GET',
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    });

    const content = await response.json();
    await getProducts(content);

};

function getProducts(content){
    let list = document.getElementById("products");
    for (let key in content) {
        list.innerHTML += `
            <div class="card">
                <img src="../images/${content[key].image}.jpg" class="card-img-top" alt="image not found">
                <div class="card-body">
                    <h5 class="card-title">${content[key].title}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. ${content[key].description}</p>
                    <div>
                        <p class="count">count: ${content[key].count} </p>
                        <a href="#" class="btn btn-primary" data-id="${content[key].id}">purchase < ${content[key].price} USD ></a>
                    </div>
                </div>
            </div>
        `
        // console.log(content[key])
    }
}

products();
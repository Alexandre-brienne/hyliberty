const div = document.querySelector('.container');

card = document.createElement('div');

console.log(div);

window.onload = () => {

    
    fetch('http://hyliberty.local/api.php',{
        method:'POST',
        headers: {'content-type': 'application/json'},
        body: JSON.stringify({
            "id":1
        })

    })
    .then((reponse) => {
        return reponse.json();
    })
    .then((data) => {
     console.log(data);
        for (item of data) {
           
            div.innerHTML += 
            `
            <div class="card">
            <h4>${item.prenom}</h4>
            <h6>${item.nom}</h6>
            <h6>${item.gps}</h6>
            <p>${item.telephone}</p>
            <div class="carburant">
                <progress value="${item.hydrogene_1}" max="100">Bar 1</progress><br>
                <progress value="${item.hydrogene_1}" max="100">Bar 2</progress>
            </div>
        </div>
            `
            ;
        }
    })
    .catch((error) => {
        console.log(error);
    })


}
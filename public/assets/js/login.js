window.addEventListener("DOMContentLoaded", function() {
    let $form = document.querySelector("#signin");
    let $msg = document.querySelector(".msg");

    $form.addEventListener("submit", function(e) {
        e.preventDefault();

        let datos = new FormData($form);
        let datosParse = new URLSearchParams(datos);

        fetch(`${plz.rest_url}/login`,{
                method: "POST",
                body: datosParse
            })
            .then(res => res.json())
            .then(json=>{
                console.log(json)
                if (json !== false) {
                    $msg.innerHTML = json
                } else {
                    $msg.innerHTML = '<strong>Se ha loggeado correctamente </strong>'
                    window.location.href = `${plz.home_url}`
                }
            })
            .catch(err => {
                console.log(`error: ${err}`);
            });
    });
});

//Done
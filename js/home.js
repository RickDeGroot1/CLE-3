window.addEventListener("load", init);

const url = 'http://localhost/CLE-3/index.php'
function init(){
 getSubmitData(url, dataSuccesHandler)
}

function getSubmitData(url, succesfunction) {
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .then(successFunction)
        .catch(errorHandler);
}

function dataSuccessHandler(data) {
    for (const )
}

function errorHandler(error) {
    console.error(error);
}



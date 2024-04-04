window.addEventListener('load', init)

let stationPhp = 'includes/getStations.php'

function init() {
    startEndButtons()
}

function fetchInfo(link, successCallback) {
    fetch(link)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json()
        })
        .then(successCallback)
        .catch(ajaxRequestErrorHandler)
}

function startEndButtons() {
    let stationButtons = document.getElementsByClassName('stationCommentButton')
    for (let startStation of stationButtons) {
        startStation.innerHTML = 'Laat comments zien'
        startStation.classList.add('startStationButton')
        startStation.addEventListener("click", (event) => {
            let buttonId = event.target.id
            fetchInfo(stationPhp, (data) => createModal(data, buttonId))
        });
    }
}

function createModal(data, buttonId) {
    let comments = data['comments']
    let stations = data['stations']

    let dialog = document.createElement('dialog')
    dialog.addEventListener('click', closeModal)
    dialog.classList.add('modal')
    dialog.id = 'dialog'

    let stationCommentsBox = document.createElement('section')
    stationCommentsBox.classList.add('stationCommenBox')

    let stationName = document.createElement('h3')
    let stationData = stations[buttonId-1]
    if (stationData) {
        stationName.innerHTML = stationData['station']
        comments.forEach(commentData => {
            if (commentData.station_id === buttonId && commentData.comment != null) {
                let stationComment = document.createElement('li')
                stationComment.classList.add('stationComments')
                stationComment.id = 'stationComments'
                stationComment.innerHTML = `Om: ${commentData.datetime} - ${commentData.comment}`
                stationCommentsBox.appendChild(stationComment)
            }
        });
        if (stationCommentsBox.childNodes.length === 0) {
            let noComments = document.createElement('li')
            noComments.innerHTML = 'Er zijn op het moment geen comments voor dit station!'
            stationCommentsBox.appendChild(noComments)
        }
    } else {
        stationName.innerHTML = "Geen valide station, selecteer een valide station";
    }

    dialog.appendChild(stationName)
    dialog.appendChild(stationCommentsBox)

    document.body.appendChild(dialog)

    dialog.showModal()
}

function ajaxRequestErrorHandler(data) {
    console.error(data)
}

function closeModal() {
    let dialog = document.getElementById('dialog')
    dialog.close()
    dialog.remove()
}
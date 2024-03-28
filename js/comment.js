window.addEventListener('load', function() {
    //vind dropdown menu
    var dropdown = document.getElementById('dropdown');
    dropdown.addEventListener('change', getLiftsAndEscalators);
});

function getLiftsAndEscalators() {
    // de geselecteerde waarde van het dropdown menu
    var stationId = this.value;

    // Controleer of er een station is geselecteerd
    if (stationId !== '') {
        fetch('get_lifts_and_escalators.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'stationId=' + encodeURIComponent(stationId)
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }
                return response.json();
            })
            .then(data => {
                displayRadios(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}


function displayRadios(data) {

    var liftLabel = document.createElement('label');
    liftLabel.textContent = 'Lift:';
    liftRadios.appendChild(liftLabel);
    // Maak radiobuttons voor elke lift in de ontvangen data
    for (var i = 1; i <= data.lifts; i++) {
        var radio = document.createElement('input');
        radio.type = 'radio';
        radio.id = 'lift' + i;
        radio.name = 'lift';
        radio.value = i;
        var label = document.createElement('label');
        //voor gebruiksvriendelijkheid, koppelt label met radiobuttons
        label.htmlFor = 'lift' + i;
        label.innerHTML = 'Lift ' + i;

        liftRadios.appendChild(radio);
        liftRadios.appendChild(label);
        liftRadios.appendChild(document.createElement('br'));
    }

    var escalatorLabel = document.createElement('label');
    escalatorLabel.textContent = 'Roltrappen:';
    escalatorRadios.appendChild(escalatorLabel);

    // Maak radiobuttons voor elke roltrap in de ontvangen data
    for (var j = 1; j <= data.escalators; j++) {
        var radio = document.createElement('input');
        radio.type = 'radio';
        radio.id = 'escalator' + j;
        radio.name = 'escalator';
        radio.value = j;
        var label = document.createElement('label');
        //voor gebruiksvriendelijkheid, koppelt label met radiobuttons
        label.htmlFor = 'escalator' + j;
        label.innerHTML = 'Escalator ' + j;

        escalatorRadios.appendChild(radio);
        escalatorRadios.appendChild(label);
        escalatorRadios.appendChild(document.createElement('br'));
    }
}
